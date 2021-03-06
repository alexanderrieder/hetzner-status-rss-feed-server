<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>My Hetzner Backend</title>
    
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark navbar-hetzner">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                My Hetzner Backend
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @auth
                        <li>
                            <a class="nav-link" href="{{ route('messages.index') }}"><i class="fal fa-fw fa-envelope"></i> {{ __('Messages') }}
                            </a></li>
                        <li>
                            <a class="nav-link" href="{{ route('feature_flags.index') }}">
                                <i class="fas fa-fw fa-flag"></i> {{ __('Feature Flags') }}
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('devices.index') }}">
                                <i class="fal fa-fw fa-mobile"></i> {{ __('Devices') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="staticsDropDown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fal fa-chart-line"></i> Statistiken <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="staticsDropDown">
                                <a class="dropdown-item" href="{{ route('statics.dashboard') }}">
                                    <i class="fal fa-tachometer"></i> Dashboard
                                </a>
                                <a class="dropdown-item" href="{{ route('statics.tracing_cache') }}">
                                    <i class="fal fa-badge fa-fw"></i>{{ __('Tracing Cache') }}
                                </a>
                            </div>
                        </li>
                    @endauth
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <!--<li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>-->
                    @else
                        <li class="nav-item dropdown">
                            <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fal fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
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
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script defer src="https://pro.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-d84LGg2pm9KhR4mCAs3N29GQ4OYNy+K+FBHX8WhimHpPm86c839++MDABegrZ3gn" crossorigin="anonymous"></script>
<!-- Scripts -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" defer></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('js')
</body>
</html>
