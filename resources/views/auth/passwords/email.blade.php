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

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

    
                                <button type="submit" class="button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                    </form>
                </div>
@endsection
