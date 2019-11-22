@extends('master_layout')

@section('content')

<h1 class="title">Edit Task</h1>

    <form>
        <div class="field">
            <label class="label" for="title"Title</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title" value="{{ $tasks->name }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="description"> Description</label>

            <div class="control">
                <input type="text" class="input" name="title" placeholder="Title">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Task</button>
            </div>
        </div>
    </form>

@endsection
