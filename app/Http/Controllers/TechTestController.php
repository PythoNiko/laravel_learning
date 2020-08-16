<?php

namespace App\Http\Controllers;

use App\Property;
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
        $property = Property::all();

//        // test to fill dm column - works fine
//        // TODO: next build form and marry up
//        $property->fill([
//            'county' => 'test',
//            'country' => 'test',
//            'town' => 'test',
//            'description' => 'test',
//            'full_details_url' => 'test',
//            'displayable_address' => 'test',
//            'image_url' => 'test',
//            'thumbnail_url' => 'test',
//            'latitude' => 'test',
//            'longtitude' => 'test',
//            'num_of_bedrooms' => 5,
//            'num_of_bathrooms' => 5,
//            'price' => 200.50,
//            'property_type' => 'test',
//            'for_sale_rent' => 'test'
//        ]);
//
//        $property->save();

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

//        dump($response['data']);

        return view('techtest.index', compact(
            'response',
            'property'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("techtest.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $property = new Property();

        $property->county = request('county');
        $property->country = request('country');
        $property->town = request('town');
        $property->description = request('description');
        $property->full_details_url = request('full_details_url');
        $property->displayable_address = request('displayable_address');
        $property->image_url = request('image_url');
        $property->thumbnail_url = request('thumbnail_url');
        $property->latitude = request('latitude');
        $property->longtitude = request('longtitude');
        $property->num_of_bedrooms = request('num_of_bedrooms');
        $property->num_of_bathrooms = request('num_of_bathrooms');
        $property->property_type = request('property_type');
        $property->for_sale_rent = request('sale_rent');

        $property->save();

        return redirect('/techtest');
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
