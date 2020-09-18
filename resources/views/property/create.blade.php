@extends('master_layout')

@section('title')
    | Add Property
@endsection

@section('content')
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2>Add new property</h2>

                {{-- ToDo: Validation and error handling --}}
                <form method="POST" action="{{route('property.store')}}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="label" for="county">County</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="county" placeholder="County" value="{{old('county')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="country">Country</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="country" placeholder="Country" value="{{old('country')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="town">Town</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="town" placeholder="Town" value="{{old('town')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="description">Description</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="description" placeholder="Description" value="{{old('description')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="full_details_url">Full Details URL</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="full_details_url" placeholder="Full Details URL" value="{{old('full_details_url')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="displayable_address">Displayable Address</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="displayable_address" placeholder="Displayable Address" value="{{old('displayable_address')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="image_url">Upload Image</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="image_url" placeholder="Image URL" value="{{old('image_url')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="thumbnail_url">Thumbnail Image</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="thumbnail_url" placeholder="Thumbnail URL" value="{{old('thumbnail_url')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="latitude">Latitude</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="latitude" placeholder="Latitude" value="{{old('latitude')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="longtitude">Longtitude</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="longtitude" placeholder="Longtitude" value="{{old('longtitude')}}">
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
                            <input type="number" class="input form-control" name="price" placeholder="Price" value="{{old('price')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="property_type">Property Type</label>

                        <div class="form-group">
                            <input type="text" class="input form-control" name="property_type" placeholder="Property Type" value="{{old('property_type')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Is the property for sale or rent?:</p>
                        <input type="radio" id="sale" name="sale_rent" value="Sale">
                        <label for="sale">Sale</label><br>

                        <input type="radio" id="rent" name="sale_rent" value="Rent">
                        <label for="rent">Rent</label><br>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="button is-link">Add Property</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
