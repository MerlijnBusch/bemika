@extends('layouts.app')

@section('content')
<div class="layouts-app-navigation-main-inner-blok">
    <div class="layouts-app-navigation-main-inner-blok-nav" >
    <div class="{{(Route::currentRouteName() == 'login') ? 'layouts-app-navigation-item layouts-app-navigation-item-active' : 'layouts-app-navigation-item' }}">
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

                            @endif
        @if (Route::has('password.request'))
        <div class="{{(Route::currentRouteName() == 'password.request') ? 'layouts-app-navigation-item layouts-app-navigation-item-active' : 'layouts-app-navigation-item' }}">
            <div class="layouts-app-navigation-link-container">

            <a class="{{(Route::currentRouteName() == 'password.request') ? 'layouts-app-navigation-link layouts-app-navigation-link-active' : 'layouts-app-navigation-link' }}" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            </div>
            <span class="{{(Route::currentRouteName() == 'password.request') ? 'layouts-app-navigation-item-span' : '' }}"></span>
        </div>
        @endif
    </div>
    <h2>Subscribe to Robin Assistant</h2>
    <p>Assistent software for people with special needs with the help of their caretakers in the performance of daily activities.</p>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="email" class="">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-field" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="password" class="">Password</label>
        <input id="password" type="password" class="form-field" name="password" required autocomplete="current-password">

        @error('password')
            <span class="" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

        <label class="" for="remember">
            {{ __('Remember Me') }}
        </label>


        <button type="submit" class="button">
            {{ __('Login') }}
        </button>

    </form>
</div>
@endsection
