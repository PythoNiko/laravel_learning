<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'PythoNiko')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
</head>

<body>
    <ul>
        <li><a href="/login">Login</a></li>
        <li><a href="/home">Home</a></li>
        <li><a href="/tasks">Tasks</a></li>
        <li><a href="/maps">Maps</a></li>
    </ul>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
