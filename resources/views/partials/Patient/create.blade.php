@extends('layouts.main')

@section('title', 'Create Patient')

@section('content')

    <h1>Create blade patient</h1>

    <form method="post" action="{{ route('patient.store') }}">
        @method('POST')
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" />
        <label>Gender</label>
        {{Form::select('gender', Config::get('gender'), old('gender'), ['class' => ''])}}
        <label>Language</label>
        {{Form::select('lang', Config::get('languages'), null, ['class' => ''])}}
        <label>Birthday</label>
        <input type="date" name="birthday" value="{{ old('birthday') }}" />
        <label>Color code</label>
        <input type="color" name="color_code" value="{{ old('color_code') }}" />
        <button type="submit">submit</button>
    </form>
@stop
