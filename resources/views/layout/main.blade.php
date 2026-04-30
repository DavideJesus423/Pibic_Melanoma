<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!--Link do Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!--Fonte do Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!--Link do CSS-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @yield('head')
</head>
<body>

<!--Inicio-->
    <!-- Inicio Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="/" class="navbar-brand">
                <div class="navbar-brand-icon">
                    <i class="bi bi-shield-plus"></i>
                </div>
                <span>MelanomAI</span>
            </a>

            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="bi bi-list" style="font-size: 1.5rem;"></i>
            </button>

            <div class="navbar-collapse" style="display: flex; justify-content: center; align-items: center;">
                <ul class="navbar-nav">
                     <li><a href="/" class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}"><i class="bi bi-grid"></i>Melanoma</a></li>
                    <li><a href="{{ route('upload') }}" class="nav-link {{ request()->routeIs('upload') ? 'active' : '' }}"><i class="bi bi-cloud-upload"></i> Análise</a></li>
                    <li><a href="#" class="nav-link"><i class="bi bi-book"></i> Sobre Nós</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!--Fim Navbar-->
<!--Fim-->
    <script src="{{ asset('js/main.js') }}"></script>
    @yield ('content')
</body>
</html>