<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{Request::is('') ? 'active' : null}}">
                <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item {{Request::is('tasks*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('tasks.index')}}">Tasks</a>
            </li>
            <li class="nav-item {{Request::is('sessions*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('sessions.index')}}">Sessions</a>
            </li>
            <li class="nav-item {{Request::is('property*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('property.index')}}">Tech Test</a>
            </li>
            <li class="nav-item {{Request::is('learning*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('learning.index')}}">Learning</a>
            </li>
            <li class="nav-item {{Request::is('techtest*') ? 'active' : null}}">
                <a class="nav-link" href="{{route('techtest.index')}}">TechTest</a>
            </li>
        </ul>
    </div>
</nav>
