<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '#kamzasurfovat') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'kamzasurfovat.cz') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            {{-- //destinace, o nas, agentury --}}
                            <li class="nav-item">
                                <a class="nav-link" href="/index">Homepage</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/reviews">Reviews</a>
                            </li>
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

        <main class="py-4 content">
                {{-- class="py-4" --}}
            @yield('content')
        </main>

        <footer class="page-footer font-small pt-4">
            <div class="container-fluid text-center text-md-left">
              <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                  <h5 class="text-uppercase">Footer Content</h5>
                  <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                      <li><a href="#!">Raz</a></li>
                      <li><a href="#!">Dva</a></li>
                      <li><a href="#!">Tri</a></li>
                      <li><a href="#!">Ctyri</a></li>
                    </ul>
                  </div>

                  <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
        
                    <ul class="list-unstyled">
                      <li><a href="#!">Pet</a></li>
                      <li><a href="#!">Sest</a></li>
                      <li><a href="#!">Sedm</a></li>
                      <li><a href="#!">Osm</a></li>
                    </ul>
                  </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
              <a href="#!"> kamzasurfovat.cz</a>
            </div>
          </footer>
    </div>
</body>
</html>
