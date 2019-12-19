@extends('master_layout')

@section('title')
    Maps
@endsection

@section('content')

    <div id="app">
        <h1><b>@{{ title }}</b></h1>
        <br>
        <h1>@{{ message }}</h1>
        <h1>@{{ name }}</h1>
        <h1>@{{ add }}</h1>
    </div>

    <input v-model="message">

    <script>
        new Vue({
            el: '#app',
            data: {
                title: 'Intro to Vue',
                message: 'Hello World',
                name: 'Niko',
                add: 5 + 3
            }
        })
    </script>

@endsection
