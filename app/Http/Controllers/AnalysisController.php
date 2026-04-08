<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    # Envia e retorna resposta da ia
    private function sendIa($imageFile){
        #Aqui vai fazer a requisição pra IA
        return [
            'resultado' => 'Melanoma',
            'hitability' => 0.85,
        ];
    }

    #Salva a imagem como base64 para exibição imediata tanto para usuario logado e não logado
    private function saveBase64Image($imageFile)
    {
        $base64Image = base64_encode(file_get_contents($imageFile));
        $mime = $imageFile->getMimeType();
        return "data:$mime;base64,$base64Image";
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'imagem' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        
        $imageFile = $request->file('imagem');

        $result = $this->sendIa($imageFile);

        $result['image_path'] = $this->saveBase64Image($imageFile);

        if (Auth::check()) {
            Diagnostic::create([
                'user_id' => Auth::id(),
                'result' => $result['resultado'],
                'hitability' => $result['hitability'],
                'image_path' => $imageFile->store('', 's3'),
            ]);
        }
        

        return view('diagnostics.result', compact('result'));
    }
}
