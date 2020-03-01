@extends('layouts.main')

@section('title', 'Create Patient')

@section('content')

    <h1>Create blade patient</h1>

    <form method="post" action="{{ route('patient.store') }}">
        @method('POST')
        @csrf
        <input type="text" name="name" value="{{ old('name') }}" />
        <input type="color" name="color_code" value="{{ old('color_code') }}" />
        <button type="submit">submit</button>
    </form>
@stop


