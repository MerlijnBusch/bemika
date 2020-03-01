@extends('layouts.main')

@section('title', 'Create Activity')

@section('content')

    <h1>Create blade activity</h1>
    <form method="post" action="{{ route('activity.store') }}" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <input type="text" name="title" value="{{ old('title') }}" />
        <textarea name="description">{{ old('description') }}</textarea>
        <input type="file" name="image" value="{{ old('image') }}">
        <button type="submit">Submit</button>
    </form>
@stop


