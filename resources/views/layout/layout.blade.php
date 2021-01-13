<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>University system </title>
    <link href="https://bootswatch.com/4/flatly/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{route('my_profile')}}">UNI-SYS</a>/
    @if (Auth::user())
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
            </ul>
            <ul class="my-2 my-lg-0 navbar-nav">
                <li>
                    <a class="nav-link" href="{{route('logout')}}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="nav-link">Logout</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        {{csrf_field()}}
                    </form>
                </li>
            </ul>
        </div>
    @endif
</nav>
<div class="d-flex">
    @if (Auth::user())
        <ul class="nav flex-column right-nav bg-dark full-height text-white">
            <li class="nav-item marg_2">
                <form class="form-inline my-1 my-lg-0">
                    <input class="form-control mr-sm-0" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('my_profile')}}">My Profile</a>
                <hr/>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('my_courses')}}">My Courses</a>
                <hr/>
            </li>
            @can("lecturer")
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('my_students')}}">My Students</a>
                <hr/>
            </li>
            @endcan
            @can("student")
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('my_student_shells')}}">My Student Shells</a>
                    <hr/>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('all_courses')}}">Courses</a>
                    <hr/>
                </li>
            @endcan
            @can("admin")
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('all_schedules')}}">Schedule</a>
                    <hr/>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('all_lectures')}}">Lectures</a>
                    <hr/>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('all_users')}}">Users</a>
                    <hr/>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('all_student_shells')}}">Student Shells</a>
                    <hr/>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('posts.all')}}">Posts</a>
                <hr/>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{route('about')}}">About</a>
                <hr/>
            </li>
        </ul>
    @endif
    @yield("content")
</div>
</body>
</html>
