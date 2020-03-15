@extends('layouts.main')

@section('title', 'dashboard patient tasks')

@section('content')

    <h1>dashboard patient tasks</h1>

    {{ Form::model($patient, ['route' => ['dashboard.patient.tasks.second.post', $patient->id], 'method' => 'post']) }}

    @foreach($tasks as $task)
        {{$task->title}}<br>
        {{$task->description}}<br>
        {{ Form::checkbox('tasks['.$task->id.']', null, true, ['class' => 'form-field']) }}<hr>
    @endforeach

    {{ Form::submit('Choose', ['name' => 'submit', 'class' => 'button']) }}
    {{ Form::close() }}
@stop



