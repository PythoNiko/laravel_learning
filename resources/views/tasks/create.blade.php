@extends('master_layout')

@section('geading')
    Create Tasks
@endsection

@section('content')

    <div class="container bg-light shadow">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{route('tasks.store')}}">
                    {{ csrf_field() }}

                    <h2>
                        Add new task
                    </h2>

                    <div class="form-group">
                        <label class="label" for="county">Task Name</label>

                        <div class="form-group">
                            <input type="text" name="title" placeholder="Task Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label" for="county">Description</label>

                        <div class="form-group">
                            <textarea name="description" placeholder="Project Description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit">Create New Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
