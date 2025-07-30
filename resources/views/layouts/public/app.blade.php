<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'E-Tempahan') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:100,200,300,400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #ffffff !important;
        }
        .navbar {
            background-color: #285689;
        }

        footer {
            background-color: #285689;
            color: #ffffff;
        }

        .nav-link .active {
            font-weight: bold !important;
            color: #ffffff;
        }

        .theme-color {
             background: linear-gradient(180deg, #0a131d, #285689, #2a75cb);
        }

        .text-theme{
            color: #285689;
        }

        .button-theme{
            background-color: #285689;
            color: #fff;
            width: 300px;
            height: 40px;
        }

        /* Hover state of the button */
        .button-theme:hover {
        background-color: #4188d8; /* Darker background on hover */
        }

    </style>
    <!-- Styles -->
    @stack('css')
    
</head>
<body class="d-flex flex-column min-vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="d-flex flex-row bd-highlight">
                         <div class="p-2 bd-highlight">
                            <img class="me-3" src="{{asset('img/logo/img-logo.png')}}" alt="" width="36" height="30">
                         </div>
           
                        <div class="p-2 bd-highlight">Kementerian Komunikasi</div>

                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">{{ __('Pengenalan') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Manual') }}</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Daftar Pengguna') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('Bantuan') }}</a>
                        </li> --}}
                        <li class="nav-item ms-3 mt-1">
                            {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a> --}}
                            <a class="btn btn-sm btn-light text-theme" href="{{ route('register') }}" role="button">{{ __('Daftar') }}</a>
                        </li>
                        <!-- Authentication Links -->
                        {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>

        @include('layouts.public.footer')

    @stack('js')

</body>
</html>
