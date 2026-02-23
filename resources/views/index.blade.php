<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Link do Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!--Link do Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!--Fonte do Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Noto+Sans+Chorasmian&family=Playwrite+CU+Guides&display=swap" rel="stylesheet">
    <!--Link do CSS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Melanoma</title>
</head>
<body>

    <!--Cabeçalho da página-->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="bi bi-shield-plus">MelanomAI</i> 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sobre">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Melanoma</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Detector</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!--Início-->
        <section id="home" class="hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 mx-auto text-center">
                        <span class="badge-medical">
                            <i class="bi bi-mortarboard me-2">Projeto PIBIC - Iniciação Científica</i>
                        </span>
                        <h1>Identificação de Melanoma com Inteligência Artificial</h1>
                        <p class="lead">Sistema baseado em machine learning para auxiliar na detectação de lesões suspeitas de Melanoma</p>
                        <div class="d-flex gap-3 justify-content-center">
                            <a class="btn btn-light btn-lg px-4" href="#"><i class="bi bi-camera me-2">Analisar</i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-lg px-4"> <i class="bi bi-info-circle me-2">Entender Melanoma</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="Sobre" class="py-5">
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

    </main>
</body>
</html>