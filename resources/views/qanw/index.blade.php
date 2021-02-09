@extends('master_layout')

@section('heading')
    QANW Tips
@endsection

@section('content')

    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-md-12">
                <h1>Learning</h1>

                <p>To Be Updated</p>

                <h3>Dev Ops</h3>
                <ul>
                    <li>To check what dev sites are available</li>
                        <ul>
                            <li>Connect to live server</li>
                            <li>sh /var/tasks/jq-sites.sh | jq .</li>
                            <li>Check current "branch" and see stage of ticket.</li>
                                <ul>
                                    <li>If in test then do not change</li>
                                    <li>If ticket is complete or ready for release then free to use</li>
                                </ul>
                        </ul>
                </ul>
            </div>
        </div>
    </div>

@endsection
