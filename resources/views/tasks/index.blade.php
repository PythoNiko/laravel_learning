@extends('master_layout')

@section('title')
    | Tasks
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-style-none">
                    @foreach($tasks as $task)
                        <li>{{ $task->id }}. {{ $task->name }} : {{ $task->description }}</li>
                    @endforeach
                </ul>
                <p><a href="{{route('tasks.create')}}" class="btn btn-large btn-primary">Create Task</a></p>
            </div>
        </div>
        <div class="row">
            <div>
                <p>The first task ID is: {{ $first_task }}</p>
                <p>The last task ID is: {{ $last_task }}</p>
                <p>Current URL: {{ $current_url }}</p>
                <p>Plucked example: {{ $plucked_tasks }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, eaque excepturi ipsum labore nostrum obcaecati porro praesentium quia reiciendis voluptate. Consequatur distinctio ex fuga laudantium nam quisquam repellat similique voluptatum!
            </div>
            <div class="col-md-6">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam amet dicta minima mollitia necessitatibus, nesciunt quaerat, reprehenderit sapiente ullam veritatis voluptatibus. Est eveniet necessitatibus qui quisquam sed temporibus vel.
            </div>
        </div>
    </div>
@endsection
