<nav class="layouts-nav">
    <a href="{{route('dashboard')}}" class="layouts-nav-app-name">
        <img src="{{url('/logo-images/robinlogo.png')}}" alt="Logo Robin Assistant" class="layouts-nav-image-logo">
    </a>
    <div class="layouts-nav-set-language">
        <form method="post" action="{{ route('user.setLanguage') }}" class="layouts-nav-form-language" id="layouts-nav-form">
            @method('POST')
            @csrf
            <label>{{trans('labels.set_language')}}</label>
            {{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => 'form-field', 'id' => 'layouts-nav-select', 'onchange' => "document.getElementById('layout-nav-form').submit()"]) }}
            {{ Form::submit('Save', ['name' => 'submit', 'class' => 'button']) }}
        </form>
    </div>
    <div class="layouts-nav-icon-container">
        <a href="{{route('user.profile')}}" class="layouts-nav-user">
            <span class="layouts-nav-icon-name">{{trans('labels.welcome')}}, {{Auth::user()->name}}</span>
            <i class="material-icons layouts-nav-person-icon">person</i>
        </a>
        <a href="#"><i class="material-icons layouts-nav-icon">videocam</i></a>
        <a href="#"><i class="layouts-nav-icon layouts-nav-icon-question">?</i></a>
        <a class="dropdown-item" href="{{ route('logout') }}" title="{{trans('labels.logout')}}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons layouts-nav-icon">subdirectory_arrow_right</i>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</nav>
