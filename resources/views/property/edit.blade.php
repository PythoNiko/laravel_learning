@extends('master_layout')

@section('title')
    | Edit Property
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

                <h2>Edit Property</h2>

                <form method="POST" action="{{route('property.update', ['property' => $property])}}">
                    {{method_field('PUT')}}
                    @csrf
                    <div class="form-group">
                        <label class="label" for="county">County</label>

                        <div class="form-group">
                            <input type="text" class="input" name="county" placeholder="County" value="{{ old('county', $property->county) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="country">Country</label>

                        <div class="form-group">
                            <input type="text" class="input" name="country" placeholder="Country" value="{{ old('country', $property->country) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="town">Town</label>

                        <div class="form-group">
                            <input type="text" class="input" name="town" placeholder="Town" value="{{ old('town', $property->town) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="description">Decription</label>

                        <div class="form-group">
                            <input type="text" class="input" name="description" placeholder="Description" value="{{ old('description', $property->description) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="displayableAddress">Displayable Address</label>

                        <div class="form-group">
                            <input type="text" class="input" name="displayableAddress" placeholder="Displayable Address" value="{{ old('displayableAddress', $property->displayable_address) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="latitude">Latitude</label>

                        <div class="form-group">
                            <input type="text" class="input" name="latitude" placeholder="Latitude" value="{{ old('latitude', $property->latitude) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="longtitude">Longtitude</label>

                        <div class="form-group">
                            <input type="text" class="input" name="longtitude" placeholder="Longtitude" value="{{ old('longtitude', $property->longtitude) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="num_of_bedrooms">Number of Bedrooms</label>

                        <div class="form-group">
                            <select class="input form-control" name="num_of_bedrooms">
                                <option value="">Num of Bedrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="num_of_bathrooms">Number of Bathrooms</label>

                        <div class="form-group">
                            <select class="input form-control" name="num_of_bathrooms">
                                <option value="">Num of Bathrooms</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="price">Price</label>

                        <div class="form-group">
                            <input type="text" class="input" name="price" placeholder="Price" value="{{ old('price', $property->price) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="propertyType">Property Type</label>

                        <div class="form-group">
                            <input type="text" class="input" name="propertyType" placeholder="Property Type" value="{{ old('propertyType', $property->property_type) }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Is the property for sale or rent?:</p>
                        <input type="radio" id="sale" name="sale_rent" value="Sale">
                        <label for="sale">Sale</label><br>

                        <input type="radio" id="rent" name="sale_rent" value="Rent">
                        <label for="rent">Rent</label><br>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-link">Update Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
