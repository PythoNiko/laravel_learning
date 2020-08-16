@extends('master_layout')

@section('title')
    | Add Property
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            {{-- ToDo: Validation and error handling --}}
            <form method="POST" action="{{route('techtest.store')}}">
                {{ csrf_field() }}

                <div class="field">
                    <label class="label" for="county">County</label>

                    <div class="control">
                        <input type="text" class="input" name="county" placeholder="County">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="country">Country</label>

                    <div class="control">
                        <input type="text" class="input" name="country" placeholder="Country">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="town">Town</label>

                    <div class="control">
                        <input type="text" class="input" name="town" placeholder="Town">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="description">Description</label>

                    <div class="control">
                        <input type="text" class="input" name="description" placeholder="Description">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="full_details_url">Full Details URL</label>

                    <div class="control">
                        <input type="text" class="input" name="full_details_url" placeholder="Full Details URL">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="displayable_address">Displayable Address</label>

                    <div class="control">
                        <input type="text" class="input" name="displayable_address" placeholder="Displayable Address">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="image_url">Upload Image</label>

                    <div class="control">
                        <input type="file" class="input" name="image_url">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="thumbnail_url">Thumbnail Image</label>

                    <div class="control">
                        <input type="file" class="input" name="thumbnail_url">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="latitude">Latitude</label>

                    <div class="control">
                        <input type="text" class="input" name="latitude" placeholder="Latitude">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="longtitude">Longtitude</label>

                    <div class="control">
                        <input type="text" class="input" name="longtitude" placeholder="Longtitude">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="num_of_bedrooms">Number of Bedrooms</label>

                    <div class="control">
                        <input type="text" class="input" name="num_of_bedrooms">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="num_of_bathrooms">Number of Bathrooms</label>

                    <div class="control">
                        <input type="text" class="input" name="num_of_bathrooms">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="price">Price</label>

                    <div class="control">
                        <input type="text" class="input" name="price" placeholder="Price">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="property_type">Property Type</label>

                    <div class="control">
                        <input type="text" class="input" name="property_type" placeholder="Property Type">
                    </div>
                </div>
                <div class="field">
                    <p>Is the property for sale or rent?:</p>
                    <input type="radio" id="sale" name="sale_rent" value="Sale">
                    <label for="sale">Sale</label><br>

                    <input type="radio" id="rent" name="sale_rent" value="Rent">
                    <label for="rent">Rent</label><br>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">Add Property</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
