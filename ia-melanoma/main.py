import io
import numpy as np
from fastapi import FastAPI, File, UploadFile, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from PIL import Image
import tensorflow as tf
from tensorflow.keras.applications.mobilenet_v2 import preprocess_input

app = FastAPI(
    title="Melanoma AI API",
    description="Microsserviço de análise de imagens para detecção de melanoma",
    version="1.0.0"
)

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_methods=["POST", "GET"],
    allow_headers=["*"],
)

CLASS_NAMES = ["AK", "BCC", "BKL", "DF", "MEL", "NV", "SCC", "VASC"]
HIGH_RISK   = {"MEL", "BCC", "SCC", "AK"}
MEDIUM_RISK = {"BKL", "VASC"}

MODEL_WEIGHTS = "models/modelo_treinado_v3.keras"
IMG_SIZE      = (180, 180)


def build_model():
    """
    Reconstrói a arquitetura exata usada no treinamento:
    Augmentation → Lambda(preprocess_input) → MobileNetV2 → GAP → Dense(128) → Dropout → Dense(8)
    """
    # Camadas de augmentação (mesmas do notebook)
    data_augmentation = tf.keras.Sequential([
        tf.keras.layers.RandomFlip("horizontal_and_vertical"),
        tf.keras.layers.RandomRotation(0.2),
        tf.keras.layers.RandomZoom(0.2),
    ])

    base_model = tf.keras.applications.MobileNetV2(
        input_shape=(180, 180, 3),
        include_top=False,
        weights=None  # pesos virão do arquivo .keras
    )

    model = tf.keras.Sequential([
        tf.keras.Input(shape=(180, 180, 3)),
        data_augmentation,
        tf.keras.layers.Lambda(preprocess_input),
        base_model,
        tf.keras.layers.GlobalAveragePooling2D(),
        tf.keras.layers.Dense(128, activation="relu"),
        tf.keras.layers.Dropout(0.3),
        tf.keras.layers.Dense(8, activation="softmax"),
    ])

    model.compile(
        optimizer="adam",
        loss="sparse_categorical_crossentropy",
        metrics=["accuracy"]
    )
    return model


model = None
try:
    print("Construindo arquitetura do modelo...")
    model = build_model()
    print("Carregando pesos...")
    model.load_weights(MODEL_WEIGHTS)
    print(f"✅ Modelo pronto! Output shape: {model.output_shape}")
except Exception as e:
    print(f"❌ Erro ao carregar modelo: {e}")
    model = None


def preprocess_image(image_bytes: bytes) -> np.ndarray:
    img = Image.open(io.BytesIO(image_bytes)).convert("RGB")
    img = img.resize(IMG_SIZE)
    img_array = np.array(img, dtype=np.float32)
    return np.expand_dims(img_array, axis=0)


def interpret_result(class_name: str) -> dict:
    descriptions = {
        "MEL":  "Melanoma",
        "BCC":  "Carcinoma Basocelular",
        "SCC":  "Carcinoma Espinocelular",
        "AK":   "Ceratose Actínica",
        "BKL":  "Ceratose Benigna",
        "DF":   "Dermatofibroma",
        "NV":   "Nevo Melanocítico (pinta comum)",
        "VASC": "Lesão Vascular",
    }
    if class_name in HIGH_RISK:
        nivel = "Alto"
        recomendacao = "Procure um dermatologista com urgência para avaliação presencial."
    elif class_name in MEDIUM_RISK:
        nivel = "Moderado"
        recomendacao = "Recomenda-se avaliação dermatológica em breve."
    else:
        nivel = "Baixo"
        recomendacao = "Mantenha acompanhamento dermatológico regular."
    return {
        "resultado":    descriptions.get(class_name, class_name),
        "classe":       class_name,
        "nivel_risco":  nivel,
        "recomendacao": recomendacao,
    }


@app.get("/health")
def health():
    return {
        "status":          "ok",
        "modelo_carregado": model is not None,
        "modelo":          MODEL_WEIGHTS,
        "classes":         CLASS_NAMES,
    }


@app.post("/analisar")
async def analisar(imagem: UploadFile = File(...)):
    if model is None:
        raise HTTPException(status_code=503, detail="Modelo de IA não está disponível.")

    allowed_types = {"image/jpeg", "image/png", "image/jpg"}
    if imagem.content_type not in allowed_types:
        raise HTTPException(status_code=422, detail=f"Tipo inválido: {imagem.content_type}. Use JPEG ou PNG.")

    try:
        image_bytes = await imagem.read()
        img_array   = preprocess_image(image_bytes)
        predictions = model.predict(img_array)[0]  # shape: (8,)

        class_idx   = int(np.argmax(predictions))
        class_name  = CLASS_NAMES[class_idx]
        probability = float(predictions[class_idx])

        interpretation = interpret_result(class_name)

        top3_idx = np.argsort(predictions)[::-1][:3]
        top3 = [
            {"classe": CLASS_NAMES[i], "probabilidade": round(float(predictions[i]), 4)}
            for i in top3_idx
        ]

        return {
            "resultado":    interpretation["resultado"],
            "classe":       interpretation["classe"],
            "hitability":   round(probability, 4),
            "nivel_risco":  interpretation["nivel_risco"],
            "recomendacao": interpretation["recomendacao"],
            "top3_classes": top3,
        }

    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Erro ao processar imagem: {str(e)}")