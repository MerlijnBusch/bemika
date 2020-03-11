@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')


        <calendar :data="{{$data}}"></calendar>


@stop


