@extends('master_layout')

@section('title')
    PythoNiko
@endsection

@section('content')
    <h1>My Laravel Project</h1>

    <ul>
        @foreach($tasks as $task)
            <li>{{$task}}</li>
        @endforeach
    </ul>

@endsection
