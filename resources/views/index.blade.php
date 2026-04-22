@extends('layout.main')
@section('title', 'Home')

@section('content')

<!--Inicio-->
    <!--Hero section-->
    <main class="educacao-page">
        <section class="hero-section">
            <div class="container">
                <div class="hero-content text-center">
                    <span style="display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.1); padding: 0.5rem 1rem; border-radius: 50px; font-size: 0.875rem; margin-bottom: 1.5rem;">
                        <i class="bi bi-heart-pulse"></i> Prevenção e Conscientização
                    </span>
                    <h1>Entenda o <span class="text-gradient">Melanoma</span></h1>
                    <p style="display: inline-flex;">O melanoma é o tipo mais grave de câncer de pele, mas quando detectado precocemente, tem alta taxa de cura. Conheça os sinais de alerta e proteja sua saúde.</p>
                </div>
            </div>
        </section>


        <!-- ABCDE Section -->
        <section class="abcde-section">
            <div class="container">
                <div class="section-title">
                    <h2>Regra ABCDE</h2>
                    <p>Aprenda a identificar lesões suspeitas observando cinco características principais. Esta técnica é usada por dermatologistas em todo o mundo.</p>
                </div>

                <div class="abcde-grid">
                    <div class="abcde-card" style="animation: fadeIn 0.6s ease-out 0.1s both;">
                        <div class="abcde-letter">A</div>
                        <h3>Assimetria</h3>
                        <p>Se você dividir a lesão ao meio, as duas metades não coincidem. Lesões benignas tendem a ser simétricas, enquanto melanomas frequentemente são assimétricos.</p>
                    </div>

                    <div class="abcde-card" style="animation: fadeIn 0.6s ease-out 0.2s both;">
                        <div class="abcde-letter" style="background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);">B</div>
                        <h3>Bordas</h3>
                        <p>As bordas do melanoma tendem a ser irregulares, com entalhes, ondulações ou bordas desbotadas. Lesões benignas geralmente têm bordas suaves e bem definidas.</p>
                    </div>

                    <div class="abcde-card" style="animation: fadeIn 0.6s ease-out 0.3s both;">
                        <div class="abcde-letter" style="background: linear-gradient(135deg, #db2777 0%, #be185d 100%);">C</div>
                        <h3>Cor</h3>
                        <p>A presença de várias cores ou tons diferentes é um sinal de alerta. Melanomas podem apresentar tons de marrom, preto, vermelho, branco ou azul em uma única lesão.</p>
                    </div>

                    <div class="abcde-card" style="animation: fadeIn 0.6s ease-out 0.4s both;">
                        <div class="abcde-letter" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">D</div>
                        <h3>Diâmetro</h3>
                        <p>Melanomas geralmente são maiores que 6mm no diagnóstico (tamanho de uma borracha de lápis), mas podem ser menores quando detectados precocemente.</p>
                    </div>

                    <div class="abcde-card" style="animation: fadeIn 0.6s ease-out 0.5s both;">
                        <div class="abcde-letter" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);">E</div>
                        <h3>Evolução</h3>
                        <p>Qualquer mudança no tamanho, formato, cor ou textura da lesão ao longo do tempo é um sinal importante. Lesões que coçam, sangram ou formam crostas também merecem atenção.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="stats-row">
                    <div class="stat-item">
                        <div class="stat-number-large">90%</div>
                        <p>de chance de cura quando detectado precocemente</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number-large">15k+</div>
                        <p>novos casos por ano no Brasil</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number-large">6mm</div>
                        <p>é o tamanho médio de detecção</p>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number-large">1º</div>
                        <p>lugar entre os cânceres de pele mais graves</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Prevention Section -->
        <section class="prevention-section">
            <div class="container">
                <div class="section-title">
                    <h2>Prevenção</h2>
                    <p>Adote hábitos simples que podem fazer grande diferença na saúde da sua pele.</p>
                </div>

                <div class="prevention-grid">
                    <div class="prevention-card">
                        <div class="prevention-image">
                            <i class="bi bi-sun"></i>
                        </div>
                        <div class="prevention-content">
                            <h3>Proteção Solar</h3>
                            <p>Use protetor solar FPS 30 ou superior todos os dias, mesmo em dias nublados. Reaplique a cada 2 horas.</p>
                        </div>
                    </div>

                    <div class="prevention-card">
                        <div class="prevention-image" style="background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);">
                            <i class="bi bi-search"></i>
                        </div>
                        <div class="prevention-content">
                            <h3>Autocontrole</h3>
                            <p>Examine sua pele mensalmente. Use um espelho para verificar áreas difíceis de alcançar.</p>
                        </div>
                    </div>

                    <div class="prevention-card">
                        <div class="prevention-image" style="background: linear-gradient(135deg, #059669 0%, #047857 100%);">
                            <i class="bi bi-hospital"></i>
                        </div>
                        <div class="prevention-content">
                            <h3>Consultas Regulares</h3>
                            <p>Agende consultas anuais com um dermatologista, especialmente se você tem histórico familiar.</p>
                        </div>
                    </div>

                    <div class="prevention-card">
                        <div class="prevention-image" style="background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);">
                            <i class="bi bi-x-octagon"></i>
                        </div>
                        <div class="prevention-content">
                            <h3>Evite o Bronzeamento</h3>
                            <p>Não use camas de bronzeamento. Uma única sessão aumenta o risco de melanoma em 20%.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section Questions -->
        <section style="padding: 4rem 0; background: var(--gray-50);">
            <div class="container" style="max-width: 800px;">
                <div class="text-center mb-5">
                    <h2 style="font-size: 2rem; margin-bottom: 1rem;">Perguntas Frequentes</h2>
                    <p style="color: var(--gray-500);">Respostas para as dúvidas mais comuns sobre melanoma</p>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 1rem; margin-bottom: 0.75rem;"><i class="bi bi-question-circle" style="color: var(--primary); margin-right: 0.5rem;"></i>O que é melanoma?</h4>
                            <p style="color: var(--gray-500); font-size: 0.9375rem; margin: 0;">Melanoma é um tipo de câncer de pele que se desenvolve nos melanócitos, células que produzem a melanina (pigmento que dá cor à pele). É o tipo mais grave de câncer de pele porque pode se espalhar para outras partes do corpo se não for tratado cedo.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 1rem; margin-bottom: 0.75rem;"><i class="bi bi-question-circle" style="color: var(--primary); margin-right: 0.5rem;"></i>Quem tem maior risco de desenvolver melanoma?</h4>
                            <p style="color: var(--gray-500); font-size: 0.9375rem; margin: 0;">Pessoas com pele clara, cabelos loiros ou ruivos, olhos claros, histórico familiar de melanoma, muitas sardas ou pintas, queimaduras solares na infância, ou uso de camas de bronzeamento têm maior risco.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 1rem; margin-bottom: 0.75rem;"><i class="bi bi-question-circle" style="color: var(--primary); margin-right: 0.5rem;"></i>Com que frequência devo fazer exames de pele?</h4>
                            <p style="color: var(--gray-500); font-size: 0.9375rem; margin: 0;">Recomenda-se uma consulta anual com dermatologista para pessoas de risco normal. Se você tem fatores de risco elevados, pode ser necessário consultar a cada 6 meses. O autocontrole mensal em casa também é essencial.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 style="font-size: 1rem; margin-bottom: 0.75rem;"><i class="bi bi-question-circle" style="color: var(--primary); margin-right: 0.5rem;"></i>O sistema de IA substitui o dermatologista?</h4>
                            <p style="color: var(--gray-500); font-size: 0.9375rem; margin: 0;">Não. Nossa IA é uma ferramenta de apoio para auxiliar na triagem e identificação precoce de lesões suspeitas. Apenas um médico pode fazer o diagnóstico definitivo e indicar o tratamento adequado.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--Footer-->
        <section style="padding: 4rem 0; background: var(--gradient-dark); color: white; text-align: center;">
            <div class="container">
                <h2 style="color: white; font-size: 2rem; margin-bottom: 1rem;">Fique atento à sua pele</h2>
                <p style="opacity: 0.8; max-width: 600px; margin: 0 auto 2rem;">Se você notou alguma alteração em suas pintas ou manchas na pele, não espere. Faça uma análise agora ou procure um dermatologista.</p>
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <a href="#" class="btn btn-primary" style="background: white; color: var(--primary);">
                        <i class="bi bi-camera"></i> Fazer Análise
                    </a>
                </div>
            </div>
        </section>
    </main>
<!--Fim-->

@endsection