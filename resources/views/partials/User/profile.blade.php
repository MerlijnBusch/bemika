@extends('layouts.main')

@section('title', Auth::user()->name . ' profile')

@section('content')

    <h1>user profile</h1>

    <form method="post" action="{{ route('user.setLanguage') }}">
        @method('POST')
        @csrf
        <label>Set language</label>
        <input type="text" name="lang" value="{{ old('lang') }}" />
        <button type="submit">Submit</button>
    </form>
@stop



