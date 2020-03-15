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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <label for="name" class="">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="button">
                                    {{ __('Register') }}
                                </button>
                    </form>
</div>
@endsection
