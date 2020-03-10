@extends('layouts.main')

@section('title', $type . ' Activity')

@section('content')

    <h1>{{$type}} blade patient</h1>

    @if(isset($activity))
        {{ Form::model($activity, ['route' => ['activity.update', $activity->id], 'method' => 'patch']) }}
    @else
        {{ Form::open(['route' => 'activity.store']) }}
    @endif
    {{ Form::text('title', old('title', $activity->title ?? ''), ['class' => '', 'placeholder' => 'title']) }}
    {{ Form::textarea('description', old('description', $activity->description ?? ''), ['class' => '', 'placeholder' => 'description']) }}
    {{ Form::file('image', old('image', $activity->image ?? ''), ['class' => '']) }}
    {{ Form::submit('Save', ['name' => 'submit', 'class' => '']) }}
    {{ Form::close() }}
@stop


