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
        <li class="nav-item">
            <a class="nav-link" href="/user">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/user/user">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/attendance">Attendance</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/dpr">DPR</a>
        </li>
    </ul>
  </div>
</nav>
<div class="container">
    <div class="jumbotron">
        <h1>My Profile : </h1>
    </div>
    <form method="POST" action="{{route('user.update',$user->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-sm-6">
                <label>Employee ID : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="emp_id" value="{{$user->emp_id}}" readonly/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Name : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="name" value="{{$user->name}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Email : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="email" value="{{$user->email}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Designation : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="designation" value="{{$user->designation}}" readonly/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Mobile : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="mobile" value="{{$user->mobile}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Date of Birth : </label>
            </div>
            <div class="col-sm-6">
                <input type="date" name="dob" value="{{$user->dob}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Aadhar No. </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="aadhar" value="{{$user->aadhar}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Pan No.</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="pan" value="{{$user->pan}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Experience : </label>
            </div>
            <div class="col-sm-6">
                <textarea name="experience">{{$user->experience}}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Joining : </label>
            </div>
            <div class="col-sm-6">
                <input type="date" name="joining" value="{{$user->joining}}" readonly/>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">    
                <input type="submit" class="btn btn-lg btn-primary" value="Save Changes">
            </div>
        </div>
    </form>
</div>
</body>
</html>