@extends('master_layout')

@section('title')
    | TechTest
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

                <h1>Predictor</h1>

                <div class="container bg-white shadow">
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Name</th>
                                <th scope="col">Played</th>
                                <th scope="col">Won</th>
                                <th scope="col">Drawn</th>
                                <th scope="col">Lost</th>
                                <th scope="col">Dif</th>
                                <th scope="col">Points</th>
                            </tr>
                            </thead>
                            {{-- ToDo: Validation and error handling --}}
                            @if ($leagueTable)
                                @foreach ($leagueTable as $team)
                                    <tr>
                                        <td>
                                            {{ $team->rank }}
                                        </td>
                                        <td>
                                            {{ $team->name }}
                                        </td>
                                        <td>
                                            {{ $team->matches_played }}
                                        </td>
                                        <td>
                                            {{ $team->won }}
                                        </td>
                                        <td>
                                            {{ $team->drawn }}
                                        </td>
                                        <td>
                                            {{ $team->lost }}
                                        </td>
                                        <td>
                                            {{ $team->goal_dif }}
                                        </td>
                                        <td>
                                            {{ $team->points }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="centeredTitleText" colspan="9">
                                        No Data Found
                                    </td>
                                </tr>
                            @endif
                        </table>

            </div>
        </div>
    </div>
@endsection
