<div id="offline_popup" class="notify-offline-container">
    <div class="notify-offline-text-container">
        <h1>{{trans('labels.offline')}}</h1>
    </div>
</div>

<script>
    setInterval(() => {
        if(!navigator.onLine) document.getElementById('offline_popup').style.display = 'flex';
        else document.getElementById('offline_popup').style.display = 'none';
    }, 2500) //every 2500 sec check if user has internet connection
</script>
