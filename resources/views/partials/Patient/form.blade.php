@extends('layouts.main')

@section('title', $type . ' Patient')

@section('content')

    <h1>{{$type}} blade patient</h1>

    @if(isset($patient))
        {{ Form::model($patient, ['route' => ['patient.update', $patient->id], 'method' => 'patch']) }}
    @else
        {{ Form::open(['route' => 'patient.store']) }}
    @endif

    {{ Form::text('name', old('name', $patient->name ?? ''), ['class' => 'form-field', 'placeholder' => trans('labels.placeholder_name')]) }}
    {{ Form::select('gender', Config::get('gender'), old('gender', $patient->gender ?? ''), ['class' => 'form-field',]) }}
    {{ Form::select('lang', Config::get('languages'), old('lang', $patient->lang ?? ''), ['class' => 'form-field', 'placeholder' => trans('labels.placeholder_birthday')]) }}
    {{ Form::date('birthday', old('birthday', $patient->birthday ?? ''), ['class' => 'form-field', 'placeholder' => trans('labels.')]) }}
    <input type="color" name="color_code" class="" value="{{ old('color_code', $patient->color_code ?? '') }}"/>
    {{ Form::submit('Save', ['name' => 'submit', 'class' => 'button']) }}
    {{ Form::close() }}
@stop
