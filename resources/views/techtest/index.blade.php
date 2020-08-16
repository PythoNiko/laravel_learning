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
            <h3>Proprties</h3>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Unit</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Start Date</th>
                    <th>Expiry Date</th>
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
