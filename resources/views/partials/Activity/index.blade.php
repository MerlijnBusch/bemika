@extends('layouts.main')

@section('title', 'Activity index')

@section('content')

    <h1>Index activity</h1>

    <table>
        <thead>
            <tr>
                <th class="activity-table-th-title">Title</th>
                <th class="activity-table-th-description">Description</th>
                <th class="activity-table-th-view ">View</th>
                <th class="activity-table-th-edit">Edit</th>
                <th class="activity-table-th-delete">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <th class="activity-table-th-title">{{$activity->title}}</th>
                    <th class="activity-table-th-description">{{$activity->description}}</th>
                    <th class="">View</th>
                    <th class="">Edit</th>
                    <th class="">Delete</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop


