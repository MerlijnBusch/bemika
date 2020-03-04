@extends('layouts.main')

@section('title', Auth::user()->name . ' profile')

@section('content')

    <h1>user profile</h1>

    <form method="post" action="{{ route('user.setLanguage') }}">
        @method('POST')
        @csrf
        <label>{{trans('label.set_language')}}</label>
        {{ Form::select('lang', Config::get('languages'), old('lang', $user->lang ?? ''), ['class' => '']) }}
        {{ Form::submit('Save', ['name' => 'submit'], ['class' => '']) }}
    </form>
@stop



