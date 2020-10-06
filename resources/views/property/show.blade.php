@extends('master_layout')

@section('title')
    | Properties
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif

    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">

                <h1>Properties Show</h1>

                {{ $property->town }}
            </div>
        </div>
    </div>
@endsection
