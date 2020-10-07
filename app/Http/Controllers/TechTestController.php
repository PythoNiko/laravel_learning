<?php

namespace App\Http\Controllers;

use App\LeagueTable;
use App\LeagueUpdateFlag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TechTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $lastLeagueUpdate = LeagueUpdateFlag::where('id', 1)->first();

//        if ($lastLeagueUpdate < Carbon::now()) {
//            dump("False", $lastLeagueUpdate, Carbon::now('UTC'));
//        } else {
//            dump("true", $lastLeagueUpdate, Carbon::now('UTC'));
//        }

        if ($lastLeagueUpdate && $lastLeagueUpdate < Carbon::now('UTC')) {
            $this->updateTable();

            $test = "Niko";

            $lastLeagueUpdate->last_update = Carbon::now('UTC');
            $lastLeagueUpdate->save();
        } else {
            $this->updateTable();
            $test = "Needs to be resolved.";
        }

        $leagueTable = LeagueTable::all();

        return view('techtest.index', compact(
            'test',
            'leagueTable'
        ));
    }

    public function updateTable()
    {
        // initial curl call to get last_page info from API
        $curl = curl_init();

        // cURL params
        $endPoint = 'http://livescore-api.com/api-client/leagues/table.json?key=GMWU5FsK2BnvIsJ4&secret=dYysBg19XhtoEIqkvmeA2Hk4iIz1aj5o&league=25&season=2';

        curl_setopt_array($curl, [
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);

        // execute cURL call
        $apiData = curl_exec($curl);

        // close instance
        curl_close($curl);

        // decode the response and grab the last_page value
        $tableData = json_decode($apiData, true);

        if ($tableData) {
            foreach ($tableData['data']['table'] as $teamData) {
                // instantiate new Property object for each loop
                $team = new LeagueTable();

                $team->rank = $teamData['rank'];
                $team->name = $teamData['name'];
                $team->matches_played = $teamData['matches'];
                $team->won = $teamData['won'];
                $team->drawn = $teamData['drawn'];
                $team->lost = $teamData['lost'];
                $team->goal_diff = $teamData['goal_diff'];
                $team->points = $teamData['points'];

                // error handling if data does not save to new Property object
                if (!$team->save()) {
                    dd($teamData);
//                    trigger_error("Error! Property did not save successfully.");
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
