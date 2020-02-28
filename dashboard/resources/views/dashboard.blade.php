@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <div id="app">
        <example-component :data="{{$data}}"></example-component>
    </div>

@stop


