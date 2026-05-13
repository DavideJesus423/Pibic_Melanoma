<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    /**
     * URL do microsserviço FastAPI de IA.
     * Em produção, configure via variável de ambiente IA_SERVICE_URL no .env
     */
    private string $iaServiceUrl;

    public function __construct()
    {
        $this->iaServiceUrl = env('IA_SERVICE_URL', 'http://ia_service:8000');
    }

    /**
     * Envia a imagem para o microsserviço FastAPI e retorna o resultado.
     */
    private function sendIa($imageFile): array
    {
        $response = Http::timeout(60)
            ->attach(
                'imagem',
                file_get_contents($imageFile->getRealPath()),
                $imageFile->getClientOriginalName()
            )
            ->post("{$this->iaServiceUrl}/analisar");

        if ($response->failed()) {
            // Loga o erro e lança exceção amigável
            \Log::error('Erro no serviço de IA', [
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);

            throw new \RuntimeException(
                'O serviço de análise está temporariamente indisponível. Tente novamente em instantes.'
            );
        }

        return $response->json();
    }

    /**
     * Salva a imagem como base64 para exibição imediata,
     * tanto para usuário logado quanto não logado.
     */
    private function saveBase64Image($imageFile): string
    {
        $base64Image = base64_encode(file_get_contents($imageFile));
        $mime = $imageFile->getMimeType();
        return "data:$mime;base64,$base64Image";
    }

    /**
     * Recebe o upload, chama a IA e salva o diagnóstico (se autenticado).
     */
    public function analyze(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $imageFile = $request->file('imagem');

        try {
            $result = $this->sendIa($imageFile);
        } catch (\RuntimeException $e) {
            return back()
                ->withErrors(['imagem' => $e->getMessage()])
                ->withInput();
        }

        // Adiciona a imagem em base64 para exibição na view
        $result['image_path'] = $this->saveBase64Image($imageFile);

        // Salva no banco apenas se o usuário estiver autenticado
        if (Auth::check()) {
            Diagnostic::create([
                'user_id'   => Auth::id(),
                'result'    => $result['resultado'],
                'hitability'=> $result['hitability'],
                'image_path'=> $imageFile->store('', 's3'),
            ]);
        }

        return view('diagnostics.result', compact('result'));
    }
}
