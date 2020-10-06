@extends('master_layout')

@section('title')
    | Properties
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

                <h1>Properties</h1>

                <p>Number of properties: {{ $propertyCount }}</p>

                <p>
                    <a href="{{route('property.create')}}" class="button noMarginBottom">
                        Add New Property
                    </a>
                </p>

                <div class="container bg-white shadow">
                    <div class="row">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Preview</th>
                                    <th scope="col">County</th>
                                    <th scope="col">Town</th>
                                    <th scope="col">Property Type</th>
                                    <th scope="col">Sale/Rent</th>
                                    <th scope="col">Number of Bedrooms</th>
                                    <th scope="col">Number of Bathrooms</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            {{-- ToDo: Validation and error handling --}}
                            @if ($properties)
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>
                                            @if($property->thumbnail_url)
                                                <img src="{{ $property->thumbnail_url }}" class="css-class" alt="property_image">
                                            @else
                                                <img src="https://lh3.googleusercontent.com/proxy/tEaBkUcigm-pg7O4KnqU-nKhL4YdiFxPyfgW-aNdWaTuyK2LwAWHlUlc3Ex6X1zEx8syyZ1rftzU6uPRsBs7S3DkDtlnA16YNSlMeMJ2BJLt4E7YFmGvaA" class="css-class" alt="image_not_found">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $property->county }}
                                        </td>
                                        <td>
                                            {{ $property->town }}
                                        </td>
                                        <td>
                                            {{ $property->property_type }}
                                        </td>
                                        <td>
                                            {{ ucfirst($property->for_sale_rent) }}
                                        </td>
                                        <td>
                                            {{ $property->num_of_bedrooms }}
                                        </td>
                                        <td>
                                            {{ $property->num_of_bathrooms }}
                                        </td>
                                        <td>
                                            &pound;{{ number_format($property->price) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('property.edit', ['property' => $property]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{route('property.removeProperty', ['property' => $property])}}">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{route('property.show', ['property' => $property])}}">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="centeredTitleText" colspan="9">
                                        No Properties Found
                                    </td>
                                </tr>
                            @endif
                        </table>
                    {{-- Requirements state no Auth is required here.
                         If this was to change could easily create permissions and do simple check
                         can('edit/add new property')....--}}
                    </div>
                    <a href="{{route('property.create')}}" class="button noMarginBottom">
                        Add New Property
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
