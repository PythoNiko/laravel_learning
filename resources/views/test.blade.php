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
            echo "<br>";
            echo PagesController::multiplier(10, 8);
            echo "<br>";
            echo PagesController::name_printer("Niko");
            echo "<br>";
            echo PagesController::data_type_printer();
        ?>
    </p>
@endsection
