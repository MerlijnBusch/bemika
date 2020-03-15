@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')


        <calendar-component :data="{{$data}}"></calendar-component>


@stop


