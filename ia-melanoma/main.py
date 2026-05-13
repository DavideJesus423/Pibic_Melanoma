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

CLASS_NAMES   = ["AK", "BCC", "BKL", "DF", "MEL", "NV", "SCC", "VASC"]
MODEL_WEIGHTS = "models/modelo_treinado_v3.keras"
IMG_SIZE      = (180, 180)


def build_model():
    data_augmentation = tf.keras.Sequential([
        tf.keras.layers.RandomFlip("horizontal_and_vertical"),
        tf.keras.layers.RandomRotation(0.2),
        tf.keras.layers.RandomZoom(0.2),
    ])
    base_model = tf.keras.applications.MobileNetV2(
        input_shape=(180, 180, 3),
        include_top=False,
        weights=None
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
    model.compile(optimizer="adam", loss="sparse_categorical_crossentropy", metrics=["accuracy"])
    return model


model = None
try:
    model = build_model()
    model.load_weights(MODEL_WEIGHTS)
    print(f"✅ Modelo pronto!")
except Exception as e:
    print(f"❌ Erro ao carregar modelo: {e}")
    model = None


def preprocess_image(image_bytes: bytes) -> np.ndarray:
    img = Image.open(io.BytesIO(image_bytes)).convert("RGB")
    img = img.resize(IMG_SIZE)
    return np.expand_dims(np.array(img, dtype=np.float32), axis=0)


@app.get("/health")
def health():
    return {"status": "ok", "modelo_carregado": model is not None}


@app.post("/analisar")
async def analisar(imagem: UploadFile = File(...)):
    if model is None:
        raise HTTPException(status_code=503, detail="Modelo de IA não está disponível.")

    if imagem.content_type not in {"image/jpeg", "image/png", "image/jpg"}:
        raise HTTPException(status_code=422, detail="Use JPEG ou PNG.")

    try:
        predictions = model.predict(preprocess_image(await imagem.read()))[0]
        class_name  = CLASS_NAMES[int(np.argmax(predictions))]
        probability = float(predictions[int(np.argmax(predictions))])
        is_melanoma = class_name == "MEL"

        return {
            "resultado":    "Melanoma detectado" if is_melanoma else "Não aparenta ser melanoma",
            "melanoma":     is_melanoma,
            "hitability":   round(probability, 4),
            "nivel_risco":  "Alto" if is_melanoma else "Baixo",
            "recomendacao": "Procure um dermatologista com urgência." if is_melanoma else "Mantenha acompanhamento dermatológico regular.",
        }
    except Exception as e:
        raise HTTPException(status_code=500, detail=f"Erro ao processar imagem: {str(e)}")