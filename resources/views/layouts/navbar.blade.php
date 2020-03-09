<nav class="layouts-nav">
    <a href="{{route('dashboard')}}" class="layouts-nav-app-name">
        {{env('APP_NAME')}}
    </a>

    <div class="layouts-nav-icon-container">
        <form method="post" action="{{ route('user.setLanguage') }}">
            @method('POST')
            @csrf
            <label>{{trans('labels.set_language')}}</label>
            {{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => '']) }}
            {{ Form::submit('Save', ['name' => 'submit'], ['class' => '']) }}
        </form>
        <a href="{{route('user.profile')}}" class="layouts-nav-user">
            {{trans('labels.welcome')}}, {{Auth::user()->name}}
            <i class="material-icons">person</i>
        </a>
        <a href="#"><i class="material-icons layouts-nav-icon">camera_roll</i></a>
        <a href="#"><i class="layouts-nav-icon">?</i></a>
        <a class="dropdown-item" href="{{ route('logout') }}" title="{{trans('labels.logout')}}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons layouts-nav-icon">subdirectory_arrow_right</i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
