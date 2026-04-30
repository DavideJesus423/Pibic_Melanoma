@extends('layout.main')
@section('title', 'Upload')

@section('content')
<div class="page-content">
    <main class="upload-page">
        <div class="container">
            <div class="upload-section">
                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Análise</h1>
                    <p style="color: var(--gray-500);">Envie uma imagem da lesão para análise com nossa IA</p>
                </div>

                <!-- Upload Card -->
                <div class="card">
                    <form action="{{ route('analyze') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                        <!-- Upload Area -->
                            <div class="upload-area" id="uploadArea">
                                <div class="upload-icon animate-float">
                                    <i class="bi bi-cloud-arrow-up"></i>
                                </div>

                                <p class="upload-title">Selecione sua imagem aqui</p>
                                <p class="upload-subtitle">Clique no botão abaixo</p>

                                <label for="imageInput" class="btn btn-primary" style="cursor: pointer;">
                                    <i class="bi bi-folder2-open"></i>
                                    Selecionar arquivo
                                </label>

                                <p class="upload-hint">JPG, PNG ou WEBP até 10MB</p>

                                <input type="file" name="image" class="file-input" accept="image/jpeg,image/png,image/webp" id="imageInput" style="display: none;">
                            </div>


                            <!-- Button -->
                            <div style="margin-top: 2rem;">
                                <button type="submit" class="btn btn-primary btn-lg w-full btn-analyze" disabled style="opacity: 0.45; cursor: not-allowed;">
                                    <i class="bi bi-cpu"></i>
                                    Iniciar Análise
                                </button>
                            </div>

                        <!-- Dicas -->
                        <div class="card mt-4">
                            <div class="card-body">
                                <div style="display: flex; align-items: start; gap: 1rem;">
                                    <i class="bi bi-info-circle" style="font-size: 1.5rem; color: var(--primary);"></i>

                                    <div>
                                        <h4 style="font-size: 1rem; margin-bottom: 0.5rem;">Dicas para melhores resultados</h4>

                                        <ul style="color: var(--gray-500); font-size: 0.875rem; padding-left: 1.25rem; margin: 0;">
                                            <li>Use boa iluminação (luz natural preferencialmente)</li>
                                            <li>Mantenha a câmera estável e focada na lesão</li>
                                            <li>Inclua uma régua ou moeda para referência de escala</li>
                                            <li>Capture múltiplos ângulos se possível</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </main>
</div>
@endsection