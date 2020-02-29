@extends('layouts.main')

@section('title', 'Create Activity')

@section('content')

    @include('partials.error')

    <h1>Create blade activity</h1>
    <form method="post" action="{{ route('activity.store') }}">
        @method('POST')
        @csrf
        <input type="text" name="title" value="{{ old('title') }}" />
    </form>
@stop


