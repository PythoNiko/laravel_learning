@extends('master_layout')

@section('title')
    Tssks
@endsection

@section('content')

    @foreach($tasks as $task)
        <li>{{ $task->name }}</li>
    @endforeach

@endsection
