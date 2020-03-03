@extends('layouts.main')

@section('title', $type . ' Patient')

@section('content')

    <h1>{{$type}} blade patient</h1>

    @if(isset($patient))
        {{ Form::model($patient, ['route' => ['patient.update', $patient->id], 'method' => 'patch']) }}
    @else
        {{ Form::open(['route' => 'patient.store']) }}
    @endif

    <label>Name</label>
    {{ Form::text('name', old('name', $patient->name ?? ''), ['class' => '']) }}
    <label>Gender</label>
    {{ Form::select('gender', Config::get('gender'), old('gender', $patient->gender ?? ''), ['class' => '']) }}
    <label>Language</label>
    {{ Form::select('lang', Config::get('languages'), old('lang', $patient->lang ?? ''), ['class' => '']) }}
    <label>Birthday</label>
    {{ Form::date('birthday', old('birthday', $patient->birthday ?? ''), ['class' => '']) }}
    <label>Color code</label>
    <input type="color" name="color_code" value="{{ old('color_code', $patient->color_code ?? '') }}"/>
    {{ Form::submit('Save', ['name' => 'submit'], ['class' => '']) }}
    {{ Form::close() }}
@stop
