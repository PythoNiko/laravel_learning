@extends('master_layout')

@section('title')
    Test
@endsection

@section('content')
    <h1>{{$title}}</h1>

    <p>This is my first test.</p>

    <p>My name is {{$name}}</p>

    <p>
        <?php
        use App\Http\Controllers\PagesController;
        echo PagesController::multiplier(2, 3);
        ?>
    </p>
@endsection
