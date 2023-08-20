<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>
<style>
    
</style>
<body class="antialiased">
    
        
            
                <div class="background-image">
                    <div class="logo">
                        <a href=""><img src="{{URL('images/logo.png')}}"></a>
                    </div>
                <div class="nav-wrapper">
                <nav>
                    <ul>
                    @guest
                        <li><a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Se Connecter') }}</a></li>
                        @if (Route::has('register'))
                            <li><a class="no-underline hover:underline" href="{{ route('home.index') }}">{{ __('S\'inscrire') }}</a></li>
                        @endif
                    @else
                        {{-- <li><a>{{ Auth::user()->name }}</a></li> --}}
                        <li><a href="{{route('home.info')}}"">{{ __('Profil') }}</a></li>

                        <li><a href="{{ route('logout') }}"
                           class="no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Se déconnecter') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home.about')}}">About</a></li>
                    <li><a href="{{route('home.contact')}}">Contact</a></li>
                    {{-- <li><a href="{{route('data.create')}}">Inscription</a></li> --}}
                </nav>
                </div>
                </div>
        
                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

                @yield('content')
                </div>
    
</body>
</html>
