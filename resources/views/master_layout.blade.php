<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'PythoNiko')</title>
</head>

<body>
    <ul>
        <li><a href="/login">Login</a></li>
        <li><a href="/home">Home</a></li>
        <li><a href="/contact">Contact</a></li>
        <li><a href="/test">Test</a></li>
        <li><a href="/testtwo">Test 2</a></li>
        <li><a href="/tasks">Tasks</a></li>
    </ul>
    @yield('content')
</body>
</html>
