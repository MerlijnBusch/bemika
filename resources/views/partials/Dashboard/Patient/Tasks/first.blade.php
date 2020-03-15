@extends('layouts.main')

@section('title', 'dashboard patient tasks')

@section('content')



    @foreach($activities as $activity)

        {{$activity->title}}<br>
        {{$activity->description}}<br>

        {{ Form::model($patient, ['route' => ['dashboard.patient.tasks.first.post', $patient->id], 'method' => 'post']) }}
        {{ Form::hidden('activity_id', $activity->id) }}
        {{ Form::submit('Choose', ['name' => 'submit', 'class' => 'button']) }}
        {{ Form::close() }}
        <br>

    @endforeach

@stop



