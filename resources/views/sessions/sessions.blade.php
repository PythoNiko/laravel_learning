@extends('master_layout')

@section('heading')
Session Form
@endsection

@section('content')

    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Sessions</h1><br>

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
            </div>
        </div>
    </div>

@endsection
