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
    @yield('css')
</head>
<body>


<div id="offline_popup" style="display: none">
    <h1>your offline</h1>
</div>

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

@yield('js')
<script src="/js/app.js"></script>
<script>
    setInterval(() => {
        if(!navigator.onLine) document.getElementById('offline_popup').style.display = 'block';
        else document.getElementById('offline_popup').style.display = 'none';
    }, 2500) //every 2500 sec check if user has internet connection
</script>
</body>
</html>

