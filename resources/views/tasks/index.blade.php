@extends('master_layout')

@section('title')
    Tssks
@endsection

@section('content')

    @foreach($tasks as $task)
        <li>{{ $task->id }}. {{ $task->name }} : {{ $task->description }}</li>
    @endforeach

@endsection
