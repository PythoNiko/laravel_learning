@extends('master_layout')

@section('title')
    Create Tasks
@endsection

@section('content')

    <h2>Create Task</h2>

    <form method="POST" action="/tasks">
        {{ csrf_field() }}

        <div>
            <input type="text" name="title" placeholder="Task Name">
        </div>

        <div>
            <textarea name="description" placeholder="Project Description"></textarea>
        </div>

        <div>
            <button type="submit">Create Project</button>
        </div>
    </form>

@endsection
