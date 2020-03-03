<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} @yield('title')</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div id="app">

    @include('layouts.partials.error')

    @include('layouts.navbar')

    <div class="layouts-main-container">
        <div class="layouts-main-container-sidebar">
            @include('layouts.sidebar')
        </div>

        <main class="layouts-main-container-content">
            @yield('content')
        </main>
    </div>


    @include('layouts.footer')
</div>
@yield('js')
<script async src="{{mix('js/app.js')}}"></script>
</body>
</html>

