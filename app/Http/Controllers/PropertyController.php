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

        // load data from API and set flag to 1
        if ($dataLoader && $dataLoader->data_loaded == 0) {
            $this->populateProperties();
            $dataLoader->data_loaded = 1;
            $dataLoader->save();
        }

        // load all properties and send to view to be rendered
        $properties = Property::all();

        // count of properties
        $propertyCount = Property::all()->count();

        return view('property.index', compact(
            'properties',
            'propertyCount'
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
         *      - Code below duplicated when using cURL
         *      - Create a dedicated function wic passes in various params for each call.
         */

        // initial curl call to get last_page info from API
        $curl = curl_init();

        // cURL params
        $endPoint = 'http://trialapi.craig.mtcdevserver.com/api/properties';
        $apiKey = '?api_key=3NLTTNlXsi6rBWl7nYGluOdkl2htFHug';

        curl_setopt_array($curl, [
            CURLOPT_URL => $endPoint . $apiKey,
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
        $initialResponse = curl_exec($curl);

        // close instance
        curl_close($curl);

        // decode the response and grab the last_page value
        $data = json_decode($initialResponse, true);
        $lastPage = $data['last_page'];

        // set index to 1 and append to a new param which can be used in second cURL call to start grabbing data from each page
        $index = 1;
        $currentPage = '&page[number]=' . $index;

        // while the index is less than the last page, new cURL call and use page index
        while ($index <= $lastPage) {
            $curl2 = curl_init();

            curl_setopt_array($curl2, [
                CURLOPT_URL => $endPoint . $apiKey . $currentPage,
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

            $responseStatus = curl_getinfo($curl2);
            $dataResponse = curl_exec($curl2);

            // close new instance(s) of cURL
            curl_close($curl2);

            $propertiesData = json_decode($dataResponse, true);

            if ($responseStatus != 404 && !empty($propertiesData['data'])) {
                foreach ($propertiesData['data'] as $propertyData) {
                    // instantiate new Property object for each loop
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
                    $property->price = $propertyData['price'];
                    $property->property_type = $propertyData['property_type']['title'];
                    $property->for_sale_rent = $propertyData['type'];

                    // error handling if data does not save to new Property object
                    if (!$property->save()) {
                        trigger_error("Error! Property did not save successfully.");
                    }
                }
            }
            // increment index for page loop
            $index++;
        }
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
