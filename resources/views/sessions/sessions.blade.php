@extends('master_layout')

@section('title')
Session Form
@endsection

@section('content')

    <h1><b>Sessions</b></h1><br>

    <p>Getting user's name and workplace from the session: {{$user_name}} + {{$user_works}}</p>

    <p>Age: {{$age}}</p><br>

    <form>
        <button id="testButton" action="" type="submit" value="1" name="testButton">Niko</button>
    </form>
    <br>
    <label>
        @if(session()->has('testString'))
            Session string: {{$testString}}
        @else
            Session string: empty
        @endif
    </label>

@endsection
