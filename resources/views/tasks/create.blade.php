@extends('master_layout')

@section('geading')
    Create Tasks
@endsection

@section('content')

    <form method="POST" action="{{route('tasks.store')}}">
        {{ csrf_field() }}

        <div>
            <input type="text" name="title" placeholder="Task Name">
        </div>

        <div>
            <textarea name="description" placeholder="Project Description"></textarea>
        </div>

        <div>
            <button type="submit">Create New Task</button>
        </div>
    </form>

@endsection
