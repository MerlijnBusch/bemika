@extends('layouts.app')

@section('content')
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

        @if (Route::has('password.request'))
            <a class="button" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </form>
@endsection
