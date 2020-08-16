@extends('master_layout')

@section('title')
    | Edit Property
@endsection

@section('content')
    <h3>Properties</h3>

    <div class="container bg-white shadow">
        <div class="row">
            <form method="PUT" action="{{route('property.update')}}">
                @method('PUT')
                @csrf
                <div class="field">
                    <label class="label" for="title">Title</label>

                    <div class="control">
                        <input type="text" class="input" name="title" placeholder="Title" value="#">
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
                        <button type="submit" class="button is-link">Update Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
