<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <meta name="description"
        content="Allenamento sicuro in gravidanza: Virginia Maternity Coach ti prepara all’incontro più bello e importante della tua vita.">
    <meta name="image" content="https://virginiamaternitycoach.it/uploads/images/gravidanza-fit_1.jpg">
    <!-- Schema.org for Google -->
    <meta itemprop="name" content="Virginia Maternity Coach">
    <meta itemprop="description"
        content="Allenamento sicuro in gravidanza: Virginia Maternity Coach ti prepara all’incontro più bello e importante della tua vita.">
    <meta itemprop="image" content="https://virginiamaternitycoach.it/uploads/images/gravidanza-fit_1.jpg">
    <!-- Open Graph general (Facebook, Pinterest & Google+) -->
    <meta name="og:title" content="Virginia Maternity Coach">
    <meta name="og:description"
        content="Allenamento sicuro in gravidanza: Virginia Maternity Coach ti prepara all’incontro più bello e importante della tua vita.">
    <meta name="og:image" content="https://virginiamaternitycoach.it/uploads/images/gravidanza-fit_1.jpg">
    <meta name="og:url" content="https://virginiamaternitycoach.it/">
    <meta name="og:site_name" content="Virginia Maternity Coach">
    <meta name="og:locale" content="it_IT">
    <meta name="og:type" content="website">

    {{-- Google Analytics --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JSKZ2XNVJE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-JSKZ2XNVJE');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,600;1,700&family=Raleway:wght@400;800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="{{ asset('/assets/frontend/css/styles.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/splide.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/frontend/css/custom-style.css') }}">
    @stack('css')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('/assets/backend/img/logo-black.png') }}" alt="Virgina Maternity Coach"
                        class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">Corsi</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                                </li>
                            @endif
                        @else

                            @if (Auth::user()->role_id == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                                </li>
                            @elseif(Auth::user()->role_id == 2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('member.dash') }}">I miei corsi</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                    document.getElementById('logout-form').submit();">
                                    <strong>{{ __('Logout') }}</strong>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @include('layouts.includes.footer')
    @include('cookies')
    <script src="{{ asset('/assets/frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
    <script src="{{ asset('/assets/frontend/js/splide.js') }}"></script>
    <script src="{{ asset('/assets/frontend/js/script.js') }}"></script>
    <script src="{{ asset('/assets/frontend/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/assets/frontend/js/cookiebar.js') }}"></script>
    <script src="https://kit.fontawesome.com/3a5e05c800.js" crossorigin="anonymous" defer></script>
    <script type="text/javascript">
        var image = document.getElementsByClassName('right-parallax');
        new simpleParallax(image, {
            orientation: 'right',
            scale: .5,
            overflow: true,
            delay: .6
        });
        var image = document.getElementsByClassName('left-parallax');
        new simpleParallax(image, {
            orientation: 'left',
            scale: .5,
            overflow: true,
            delay: .6
        });
    </script>
    @stack('js')
</body>

</html>
