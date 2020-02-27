<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="offline_popup" style="display: none">
        <h1>your offline</h1>
    </div>

    <div id="app">
        <example-component></example-component>
    </div>

    @guest
        epaewwaea
    @endguest
    <script src="/js/app.js"></script>
    <script>
        setInterval(() => {
            if(!navigator.onLine) document.getElementById('offline_popup').style.display = 'block';
            else document.getElementById('offline_popup').style.display = 'none';
        }, 2500) //every 2500 sec check if user has internet connection
    </script>
</body>
</html>
