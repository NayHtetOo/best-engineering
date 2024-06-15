<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user())
                            <!-- Work Type -->
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('worktype.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Work Type</span>
                                </a>
                            </li> --}}

                            <li class="nav-item dropdown">
                                <a id="typesDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Types
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="typesDropdown">
                                    <a class="nav-link" href="{{ route('worktype.index') }}">
                                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                        {{-- <span class="menu-title mm">User Registration</span> --}}
                                        <span class="menu-title">Work Type</span>
                                    </a>

                                    <!-- Land Type -->
                                    <a class="nav-link" href="{{ route('landtype.index') }}">
                                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                        <span class="menu-title">Land Type</span>
                                    </a>

                                    <!-- Thickness Type -->
                                    <a class="nav-link" href="{{ route('thicknesstype.index') }}">
                                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                        <span class="menu-title">Thickness Type</span>
                                    </a>

                                    <!-- Ratio Type -->
                                    <a class="nav-link" href="{{ route('ratiotype.index') }}">
                                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                        <span class="menu-title">Ratio Type</span>
                                    </a>

                                    <!-- Mixed Type -->
                                    <a class="nav-link" href="{{ route('mixedtype.index') }}">
                                        <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                        <span class="menu-title">Mixed Type</span>
                                    </a>

                                </div>
                            </li>

                            <!-- Brickwork Type -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('brickwork.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Brickwork</span>
                                </a>
                            </li>

                            <!-- Concretingwork Type -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('concretingwork.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Concreting Work</span>
                                </a>
                            </li>

                            <!-- Site -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Sites</span>
                                </a>
                            </li>

                            <!-- Earthwork Head -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('earthworkhead.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Earthwork Head</span>
                                </a>
                            </li>

                            <!-- Brickwork Head -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('brickworkhead.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Brickwork Head</span>
                                </a>
                            </li>

                            <!-- Concretingwork Head -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('concretingworkhead.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Concretingwork Head</span>
                                </a>
                            </li>

                            <!-- Cementconcretingwork Head -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cementconcretingwork.index') }}">
                                    <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
                                    <span class="menu-title">Cement Concreting Work Head</span>
                                </a>
                            </li>

                        @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
