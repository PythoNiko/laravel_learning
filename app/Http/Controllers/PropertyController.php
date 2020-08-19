<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $properties = Property::all();

        return view('property.index', compact(
            'properties'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("property.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Property $property
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Property $property)
    {
        $rules = [
            'county'                => 'required',
            'country'               => 'required',
            'town'                  => 'required',
            'description'           => 'required',
            'full_details_url'      => 'required',
            'displayable_address'   => 'required',
            'latitude'              => 'required',
            'longtitude'            => 'required',
            'num_of_bedrooms'       => 'required',
            'num_of_bathrooms'      => 'required',
            'price'                 => 'required',
            'property_type'         => 'required',
            'sale_rent'             => 'required'
        ];

        $request->validate($rules);

        $property = new Property();

        $property->uuid = Str::uuid();
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

        if ($property->save()) {
            return redirect('/property')->with('success', 'Property saved successfully');
        } else {
            return back()->withInput();
        }
    }

    public function populatePropertiesFromAPI()
    {
        /*
         * ToDo:
         *      1. Check if uuid already exists
         *      - if not: populate from below
         *      - else: skip
         *      2. Get last page number from /last_page_url
         *      - While page number < last page number
         *      - grab data from each, mark page as read
         *      - call API and append /next_page_url with increments to capture each page number
         *      - when all data complete, stop.
         */

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

        $response_status = curl_getinfo($curl);

        curl_close($curl);

        if ($response_status['http_code']) {
            $response = json_decode($response, true);

            $property = new Property();

            foreach ($response['data'] as $property_data) {
                // dd($property_data);

                $property = new Property();

                $property->uuid = $property_data['uuid'];
                $property->county = $property_data['county'];
                $property->country = $property_data['country'];
                $property->town = $property_data['town'];
                $property->description = $property_data['description'];
                $property->full_details_url = '?';
                $property->displayable_address = $property_data['address'];
                $property->image_url = $property_data['image_full'];
                $property->thumbnail_url = $property_data['image_thumbnail'];
                $property->latitude = $property_data['latitude'];
                $property->longtitude = $property_data['longitude'];
                $property->num_of_bedrooms = $property_data['num_bedrooms'];
                $property->num_of_bathrooms = $property_data['num_bathrooms'];
                $property->property_type = $property_data['property_type']['title'];
                $property->for_sale_rent = $property_data['type'];

                $property->save();
            }
        }

        return $property;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * @param Property $property
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Property $property)
    {
        return view('property.edit', compact(
            'property'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public function update(Request $request, Property $property)
    {

        $rules = [
            'county'                => 'required',
            'country'               => 'required',
            'town'                  => 'required',
            'description'           => 'required',
            'full_details_url'      => 'required',
            'displayable_address'   => 'required',
            'latitude'              => 'required',
            'longtitude'            => 'required',
            'num_of_bedrooms'       => 'required',
            'num_of_bathrooms'      => 'required',
            'price'                 => 'required',
            'property_type'         => 'required',
            'sale_rent'             => 'required'
        ];

        $request->validate($rules);

        $input = $request->all();

        $property->fill($input)->save();

        return redirect()->route('property.index');
    }

    /**
     * @param Property $property
     * @return mixed
     * @throws \Exception
     */
    public function removeProperty(Property $property)
    {
        if ($property->delete()) {
            return redirect()->route('property.index')->with('success', 'Property deleted successfully');
        } else {
            return redirect()->route('property.index')->with('error', 'Property failed to delete');
        }
    }
}
