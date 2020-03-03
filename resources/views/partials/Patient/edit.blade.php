@extends('layouts.main')

@section('title', 'Edit Patient')

@section('content')

    <h1>Edit blade patient</h1>

    <form method="post" action="{{ route('patient.update', $patient->id) }}">
        @method('PATCH')
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $patient->name) }}" />
        <label>Gender</label>
        {{Form::select('gender', Config::get('gender'), $patient->gender, ['class' => ''])}}
        <label>Language</label>
        {{Form::select('lang', Config::get('languages'), $patient->value, ['class' => ''])}}
        <label>Birthday</label>
        <input type="date" name="birthday" value="{{ old('birthday'), $patient->birthday }}" />
        <label>Color code</label>
        <input type="color" name="color_code" value="{{ old('color_code', $patient->color_code) }}" />
        <button type="submit">submit</button>
    </form>
@stop
