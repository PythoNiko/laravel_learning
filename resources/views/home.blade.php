@extends('master_layout')

@section('title')
    Home
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>

<h1>My {{$title}} Project</h1>
<h2> {{$purpose}} </h2>

<a href="https://laraveldaily.com/test-junior-laravel-developer-sample-project/">Original Source</a>
<p>We need to test basic Laravel skills, right? So the project should be simple, but at the same time touch majority of fundamentals.</p>

<h1>{{$projectTitle}}</h1>
<p>Basically, project to manage companies and their employees. Mini-CRM.</p>

<ul>
    <li>Basic Laravel Auth: ability to log in as administrator &#9745;</li>
    <li>Use database seeds to create first user with email admin@admin.com and password “password” &#9745;</li>
    <li>CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.</li>
    <li>Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website</li>
    <li>Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone</li>
    <li>Use database migrations to create those schemas above</li>
    <li>Store companies logos in storage/app/public folder and make them accessible from public</li>
    <li>Use basic Laravel resource controllers with default methods – index, create, store etc.</li>
    <li>Use Laravel’s validation function, using Request classes</li>
    <li>Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page</li>
    <li>Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register</li>
</ul>

@endsection
