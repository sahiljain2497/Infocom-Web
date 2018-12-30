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
        <li class="nav-item">
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
    @if($status)
    <form method="POST" action="{{route('home.update',$data->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    @else
    <form method="POST" action="{{route('home.store')}}">
        {{ csrf_field() }}
        {{ method_field('POST') }}
    @endif
        <div class="row">
            <div class="col-sm-6">
                <label>Circle :</label>
            </div>
            <div class="col-sm-6">    
                <select id="circle" name="circle" >
                    @if(!empty($data))
                        @foreach($circles as $circle)
                            <option {{$data->circle == $circle->region? 'selected':'' }}>
                                {{$circle->region}}
                            </option>
                        @endforeach
                    @else
                        @foreach($circles as $circle)
                            <option>
                                {{$circle->region}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Manager :</label>
            </div>
            <div class="col-sm-6">    
                <input id="manager" name="manager" value="{{ !empty($data) ? $data->manager : ''}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>Date : </label>
            </div>
            <div class="col-sm-6">
                <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly/>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <label>project : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="project" value="{{ $status ? $data->project : '' }}" {{ $status ? 'readonly' : '' }} >
            </div>
        </div>
        @if(empty($data->timeout))
            @if(!$status)
            <input type="submit" class="btn btn-lg btn-primary" value="check-in" />
            @else
            <div class="row">
                <div class="col-sm-6">
                    <label>Timein : </label>
                </div>
                <div class="col-sm-6">
                    <input type="text" value="{{$data->created_at}}" readonly>
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-primary" value="check-out" />
            @endif
        @else
            <p>you have checked out for today.Contact admin for further changes</p>
        @endif
        </form>
    </div>
</body>
</html>