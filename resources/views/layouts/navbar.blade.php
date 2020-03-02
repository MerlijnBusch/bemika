<nav class="layouts-nav">
    <a href="{{route('dashboard')}}" class="layouts-nav-app-name">
        {{env('APP_NAME')}}
    </>

    <div class="layouts-nav-icon-container">
        <a href="{{route('user.profile')}}" class="layouts-nav-user">
            {{trans('labels.welcome')}}, {{Auth::user()->name}}
            <i class="material-icons">person</i>
        </a>
        <a href="#"><i class="material-icons layouts-nav-icon">camera_roll</i></a>
        <a href="#"><i class="layouts-nav-icon">?</i></a>
        <a href="#"><i class="material-icons layouts-nav-icon">print</i></a>
    </div>
</nav>
