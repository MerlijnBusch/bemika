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
    <h2>Reset password for Robin Assistant</h2>
    <p>Assistent software for people with special needs with the help of their caretakers in the performance of daily activities.</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-field @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-field" name="password_confirmation" required autocomplete="new-password">
                                <button type="submit" class="button">
                                    {{ __('Reset Password') }}
                                </button>
                    </form>
                </div>
@endsection
