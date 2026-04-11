@extends('layout.main')
@section('title', 'Home')

@section('content')
    <main>
        <!--Início-->
        <section id="home" class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto text-center">
                        <span class="badge-medical">
                            <i class="bi bi-mortarboard me-2"></i>Projeto PIBIC - Iniciação Científica
                        </span>
                        <h1>Identificação de Melanoma com Inteligência Artificial</h1>
                        <p class="lead">Sistema baseado em machine learning para auxiliar na detectação de lesões suspeitas de Melanoma</p>
                        <div class="d-flex gap-3 justify-content-center">
                            <a class="btn btn-light btn-lg px-4" href="#detector"><i class="bi bi-camera me-2"></i>Analisar
                            </a>
                            <a href="#melanoma" class="btn btn-outline-light btn-lg px-4"> <i class="bi bi-info-circle me-2"></i>Entender Melanoma
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="sobre" class="py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="bi bi-cpu"></i>
                            <h3>Machine learning</h3>
                            <p>Redes neurais convolucionais treinadas com diversas imagens dermatoscópicas para reconhecer padrões característicos de melanoma</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="bi bi-clock-history"></i>
                            <h3>Diagnóstico Precoce</h3>
                            <p>O melanoma detectado em estágio inicial tem 90% de chance de cura. Nossa ferramenta auxilia na identificação rápida de lesões suspeitas</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-card">
                            <i class="bi bi-graph-up"></i>
                            <h3>Alguma coisa: talvez a precisão da IA</h3>
                            <p>Nosso modelo alcançou tal resultado de precisão e tals</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Informções do melanoma-->

        <section id="melanoma" class="py-5 bg-light">
            <div class="container py-5">
                <div class="melanoma-section">
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center mb-5">
                            <h2 class="display-6 fw-bold mb-3">O que é Melanoma?</h2>
                            <p class="text-secondary">O melanoma é o tipo mais grave de câncer de pele, originado nos melanócitos (células produtoras de melanina). A detecção precoce é fundamental para o sucesso do tratamento.</p>
                        </div>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-3 col-6">
                            <div class="stat-card">
                                <div class="stat-number">sla%</div>
                                <div class="stat-label">Cura se detectado cedo</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-card">
                                <div class="stat-number">slak+</div>
                                <div class="stat-label">Mortes/ano no Brasil</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-card">
                                <div class="stat-number">8k+</div>
                                <div class="stat-label">Caso novos por ano no Brasil</div>
                            </div>
                        </div>
                        <div class="col-md-3 col-6">
                            <div class="stat-card">
                                <div class="stat-number">4mm</div>
                                <div class="stat-label">Tamanho crítico</div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h4 fw-semibold mb-4">Regra ABCDE para identificação</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="abcde-item">
                                <div class="abcde-letter">A</div>
                                <div class="abcde-content">
                                    <h4>Assimetria</h4>
                                    <p>Metade da lesão não corresponde à outra metade</p>
                                </div>
                            </div>
                            <div class="abcde-item">
                                <div class="abcde-letter">B</div>
                                <div class="abcde-content">
                                    <h4>Bordas</h4>
                                    <p>Bordas irregulares, onduladas ou mal definidas</p>
                                </div>
                            </div>
                            <div class="abcde-item">
                                <div class="abcde-letter">C</div>
                                <div class="abcde-content">
                                    <h4>Cor</h4>
                                    <p>Variação de cores (preto, marrom, vermelho, branco ou azul)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="abcde-item">
                                <div class="abcde-letter">D</div>
                                <div class="abcde-content">
                                    <h4>Diâmetro</h4>
                                    <p>Maior que 6mm (tamanho de uma borracha de lápis)</p>
                                </div>
                            </div>
                            <div class="abcde-item">
                                <div class="abcde-letter">E</div>
                                <div class="abcde-content">
                                    <h4>Evolução</h4>
                                    <p>Mudança em tamanho, forma ou cor ao longo do tempo</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Detector-->
        <section id="detector" class="py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center mb-5">
                        <h2 class="display-6 fw-bold mb-3">Detector de Melanoma</h2>
                        <p class="text-secondary">Envie uma foto da lesão para que nosso modelo de IA realize a análise</p>
                    </div>
                </div>


                <div class="detector-card">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">


                            <form action="" method="POST" enctype="multipart/form-data">
                                @CSRF
                                <div class="upload-area mb-3">
                                    <div class="upload-placeholder">
                                        <div class="upload-icon-wrap">
                                            <i class="bi bi-cloud-arrow-up"></i>
                                        </div>
                                        <p class="upload-title">Selecione uma imagem</p>                                      
                                        <input type="file" name="imagem" id="fileInput" accept="image/*" class="form-control mt-2" hidden>
                                        <label for="fileInput" class="btn-upload mt-2">
                                            <i class="bi bi-folder2-open me-2"></i>Escolher arquivo
                                        </label>
                                        <p class="upload-hint mt-2">JPG, PNG ou WEBP</p>
                                    </div>
                                </div>

                                <button class="btn-analyze" type="submit">
                                    <i class="bi bi-cpu me-2"></i>Analisar imagem
                                </button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    @endsection