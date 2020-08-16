@extends('master_layout')

@section('title')
    | Properties
@endsection

@section('content')
    <h3>Properties</h3>

    <div class="container bg-white shadow">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">County</th>
                        <th scope="col">Town</th>
                        <th scope="col">Property Type</th>
                        <th scope="col">Sale/Rent</th>
                        <th scope="col">Number of Bedrooms</th>
                        <th scope="col">Number of Bathrooms</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                {{-- ToDo: Validation and error handling --}}
                @if ($property)
                    @foreach ($property as $properties)
                        <tr>
                            <td>
                                {{ $properties->county }}
                            </td>
                            <td>
                                {{ $properties->town }}
                            </td>
                            <td>
                                {{ $properties->property_type }}
                            </td>
                            <td>
                                {{ $properties->for_sale_rent }}
                            </td>
                            <td>
                                {{ $properties->num_of_bedrooms }}
                            </td>
                            <td>
                                {{ $properties->num_of_bathrooms }}
                            </td>
                            <td>
                                &pound;{{ number_format($properties->price) }}
                            </td>
                            <td>
                                <a href="{{route('property.edit', $properties->id)}}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{route('property.destroy', $properties->id)}}">
                                    Delete
                                </a>
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

{{--    <?php--}}
{{--        // dd($response);--}}
{{--        $i = 0;--}}

{{--        while($i < 30){--}}
{{--            var_dump($response['data'][$i]['county']);--}}
{{--            $i ++;--}}
{{--        }--}}

{{--//        dd($response['data'][0]['description']);--}}
{{--    ?>--}}

{{--    <div>--}}
{{--        <?php--}}
{{--            foreach($response as $property){--}}
{{--                dd($property);--}}
{{--//                var_dump(isset($property['$property']) ? $property['$property'] : 0);--}}
{{--            }--}}
{{--        ?>--}}
{{--    </div>--}}
@endsection
