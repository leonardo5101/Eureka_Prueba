<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Eureka Prueba') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('./assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700') }}" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('./assets/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
  <link href="{{ asset('./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="{{ asset('./assets/css/argon.css?v=1.0.0') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Eureka Prueba') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    @auth
                    <ul class="navbar-nav mr-auto">

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/home') }}">
              <i class="ni ni-tv-2 text-primary"></i> Home
            </a>
          </li>
<li class="nav-item">
            <a class="nav-link" href=" {{ route('atenciones') }}">
              <i class="ni ni-tv-2 text-primary"></i> Atencion
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/medicos') }}">
              <i class="ni ni-planet text-blue"></i> Medicos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/especialidades') }}">
              <i class="ni ni-pin-3 text-orange"></i> Especialidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/pacientes') }}">
              <i class="ni ni-pin-3 text-orange"></i> Pacientes
            </a>
          </li>
          @else
          <br>
          
         
        
        </ul>
        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    
  <script src="{{ asset('./assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

  <script src="{{ asset('./assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('./assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>

  <script src="{{ asset('./assets/js/argon.js?v=1.0.0') }}"></script>
</body>

</html>
