@extends('master_layout')

@section('title')
    Tssks
@endsection

@section('content')

    @foreach($tasks as $task)
        <li>{{ $task->id }}. {{ $task->name }} : {{ $task->description }}</li>
    @endforeach

    <br>
    <h3>The first task ID is: {{ $first_task }}</h3>
    <h3>The last task ID is: {{ $last_task }}</h3>
    <br>
    <h3>Current URL: {{ $current_url }}</h3>
@endsection
