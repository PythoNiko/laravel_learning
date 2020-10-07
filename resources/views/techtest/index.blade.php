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
            <div class="col-md-32">

                <h1>Predictor</h1>

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Position</th>
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
                    <div class="col-md-6">
                        <b>Next round of fixtures:</b><br>
                        Liverpool vs Man City<br>
                        Leicester City vs Arsenal<br>
                        West Ham vs Spurs<br>
                        Chelsea vs AFC Bournemouth<br>
                        Crystal Palace vs Manchester United<br>
                        Burnley vs Sheffield United<br>
                        Wolverhampton Wanderers vs Southampton<br>
                        Everton vs Brighton & Hove Albion<br>
                        Norwich City vs Aston Villa<br>
                        Newcastle United vs Watford<br><br>
                        <b>Predicitons based on this weeks fixtures:</b>
                        <ul>
                            <li>Leicester Win</li>
                            <li>West Ham - Spurs BTTS</li>
                            <li>Chelsea -1 Handicap</li>
                            <li>Everton - Brighton & Hove Albion BTTS</li>
                        </ul><br>
                        <i><b>Notes:</b><br>
                            Hard coded for now. Fixtures API to populate this section. Improvements to this section can include:
                        <ul>
                            <li>Further Column to show form (last 6 games)</li>
                            <li>CSS/Highlighting on teams to watch out for</li>
                            <li>Dynamic Highlighting on table to show which two teams play next</li>
                        </ul></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
