<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Saztyles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/">Tanishka Infocom Services</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="/user">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/user">Profile</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/user/attendance">Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/dpr">DPR</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <label>Circle :</label>
            </div>
            <div class="col-sm-6">    
                <select id="circle" name="cicle">
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>manager :</label>
            </div>
            <div class="col-sm-6">    
                <select id="manager" name="manager">
                    <option>manager 1</option>
                    <option>manager 2</option>
                    <option>manager 3</option>
                    <option>manager 4</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Time In : </label>
            </div>
            <div class="col-md-6">
                <input type="time" class="form-control">
            </div>
        </div>
        <div class="row">
        <div class="col-md-6">
                <label>Time Out : </label>
            </div>
            <div class="col-md-6">
                <input type="time" class="form-control">
            </div>
        </div>
    </div>
</body>
</html>