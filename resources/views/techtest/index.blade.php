@extends('master_layout')

@section('title')
    | Tech Test
@endsection

@section('content')
    <div class="col-md-12">
        <h1>Tech Test</h1>
    </div>

    <div class="card mb-40">
        <div class="cardBody">
            <h3>Properties</h3>
            <table>
                <thead>
                <tr>
                    <th>County</th>
                    <th>Town</th>
                    <th>Property Type</th>
                    <th>Sale/Rent</th>
                    <th>Number of Bedrooms</th>
                    <th>Number of Bathrooms</th>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                @if ($response)
                    @foreach ($response as $property)
                        <tr>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                Test1
                            </td>
                            <td>
                                <a href="#">
                                    <i class="fal fa-edit"></i>
                                    Edit
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
            <a href="#" class="button noMarginBottom">
                Add New Property
            </a>
        </div>
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
