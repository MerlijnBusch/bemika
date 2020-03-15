@extends('layouts.main')

@section('title', 'dashboard patient tasks')

@section('content')

    <h1>dashboard patient tasks</h1>

    {{ Form::model($patient, ['route' => ['dashboard.patient.tasks.third.post', $patient->id], 'method' => 'post']) }}

    {{ Form::date('date', null, ['class' => 'form-field']) }}

    {{ Form::submit('Choose', ['name' => 'submit', 'class' => 'button']) }}
    {{ Form::close() }}
@stop



