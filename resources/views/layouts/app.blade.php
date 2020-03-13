<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <style type="text/css">
        @font-face {
            font-family: gilroy;
            src: url('{{ public_path('Fonts/Gilroy-Light.otf') }}');
        }
    </style>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class='layouts-app'>
        <nav class="layouts-app-navigation">
            <div class="layouts-app-navigation-container">
                        @guest
                            <!-- <div class="{{(Route::currentRouteName() == 'login') ? 'layouts-app-navigation-item layouts-app-navigation-item-active' : 'layouts-app-navigation-item' }}">
                                <div class="layouts-app-navigation-link-container">
                                    <a class="{{(Route::currentRouteName() == 'login') ? 'layouts-app-navigation-link layouts-app-navigation-link-active' : 'layouts-app-navigation-link' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                                <span class="{{(Route::currentRouteName() == 'login') ? 'layouts-app-navigation-item-span' : '' }}"></span>
                            </div>
                            @if (Route::has('register'))
                                <div class="{{(Route::currentRouteName() == 'register') ? 'layouts-app-navigation-item layouts-app-navigation-item-active' : 'layouts-app-navigation-item' }}">
                                    <div class="layouts-app-navigation-link-container">
                                        <a class="{{(Route::currentRouteName() == 'register') ? 'layouts-app-navigation-link layouts-app-navigation-link-active' : 'layouts-app-navigation-link' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </div>
                                    <span class="{{(Route::currentRouteName() == 'register') ? 'layouts-app-navigation-item-span' : '' }}"></span>
                                </div>

                            @endif -->
                            <img src="{{url('/logo-images/robinlogo.png')}}" alt="Logo Robin Assistant" class="layouts-app-nav-logo">
                        @endguest
            </div>
        </nav>


        <main class="layouts-app-navigation-main">
            <div class="layouts-app-navigation-main-inner">
                <img src="/logo-images/inlogImage.jpg" alt="" srcset="">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
