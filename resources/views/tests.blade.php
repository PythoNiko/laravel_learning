@extends('master_layout')

@section('title')
    Test
@endsection

@section('content')
<h1>
    Test Working!
</h1>

@foreach($tests as $test)
    <li>{{ $test->test_name }} : {{ $test->test_description }}</li>
@endforeach

<form method="POST" action="/tests">
    {{ csrf_field() }}

    <div>
        <input type="text" name="test_name" placeholder="Test Name">
    </div>

    <div>
        <textarea name="test_description" placeholder="Test Description"></textarea>
    </div>

    <div>
        <button type="submit">Add a Test</button>
    </div>
</form>

@endsection
