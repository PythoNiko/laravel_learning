@extends('master_layout')

@section('title')
Session Form
@endsection

@section('content')

    <h1><b>Sessions</b></h1><br>

    <p>Getting user's name and workplace from the session: {{$user_name}} + {{$user_works}}</p>

    <p>Age: {{$age}}</p>

@endsection
