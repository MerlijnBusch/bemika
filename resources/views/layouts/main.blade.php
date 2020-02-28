<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} @yield('title')</title>
    @yield('css')
</head>
<body>


<div id="offline_popup" style="display: none">
    <h1>your offline</h1>
</div>

<style>
    html, body{
        height: 100%;
        margin: 0
    }

    .main-container{
        display: flex;
        flex-direction: row;
        height: 100%;
    }

    .main-container-sidebar{
        width: 232px;
        background: red;
    }

    .main-container-content{
        flex: 1;
        background: yellow;
    }
</style>

@include('layouts.navbar')

<div class="main-container">
    <div class="main-container-sidebar">
        @include('layouts.sidebar')
    </div>

    <main class="main-container-content">
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

