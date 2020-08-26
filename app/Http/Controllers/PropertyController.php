<?php

namespace App\Http\Controllers;

use App\DataLoader;
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
        // check if data has been loaded from API already
        $dataLoader = DataLoader::where('id', 1)->first();

        if ($dataLoader && $dataLoader->data_loaded == 0) {
            $this->populateProperties();
            $dataLoader->data_loaded = 1;
            $dataLoader->save();
        }

        // load all properties and send to view to be rendered
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

    public function populateProperties()
    {
        /*
         * ToDo:
         *      1. Get last page number from /last_page_url
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

        $responseStatus = curl_getinfo($curl);

        curl_close($curl);

        if ($responseStatus['http_code']) {
            $response = json_decode($response, true);

            $property = new Property();

            foreach ($response['data'] as $propertyData) {
                $property = new Property();

                $property->uuid = $propertyData['uuid'];
                $property->county = $propertyData['county'];
                $property->country = $propertyData['country'];
                $property->town = $propertyData['town'];
                $property->description = $propertyData['description'];
                $property->full_details_url = '?';
                $property->displayable_address = $propertyData['address'];
                $property->image_url = $propertyData['image_full'];
                $property->thumbnail_url = $propertyData['image_thumbnail'];
                $property->latitude = $propertyData['latitude'];
                $property->longtitude = $propertyData['longitude'];
                $property->num_of_bedrooms = $propertyData['num_bedrooms'];
                $property->num_of_bathrooms = $propertyData['num_bathrooms'];
                $property->property_type = $propertyData['property_type']['title'];
                $property->for_sale_rent = $propertyData['type'];

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
