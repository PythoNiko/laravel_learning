<?php

namespace App\Http\Controllers;

use App\TechTest;
use Illuminate\Http\Request;

class TechTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $curl = curl_init();

        // ToDo: - Store securely
        $endPoint = 'http://trialapi.craig.mtcdevserver.com/api/properties';
        $apiKey = '3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint . '?api_key=' . $apiKey,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response, true);

        dump($response);

        return view('techtest.index');
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
     * @param  \App\TechTest  $techTest
     * @return \Illuminate\Http\Response
     */
    public function show(TechTest $techTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechTest  $techTest
     * @return \Illuminate\Http\Response
     */
    public function edit(TechTest $techTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TechTest  $techTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechTest $techTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechTest  $techTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechTest $techTest)
    {
        //
    }
}
