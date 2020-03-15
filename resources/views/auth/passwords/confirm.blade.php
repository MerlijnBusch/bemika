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
    <h2>{{__('Confirm Password') }} Robin Assistant</h2>
                   <p> {{ __('Please confirm your password before continuing.') }}</p>

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                            <label for="password" class="">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <button type="submit" class="button">
                                    {{ __('Confirm Password') }}
                                </button>

                    </form>
                </div>
@endsection
