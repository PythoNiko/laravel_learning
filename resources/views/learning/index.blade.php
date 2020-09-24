@extends('master_layout')

@section('heading')
    Session Form
@endsection

@section('content')

    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Learning</h1>

                <ul>
                    @foreach($quiz as $items)
                        <li>
                            <b>{{ $items->question }}</b>
                        </li>
                        <i>{{ $items->answer }}</i>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
