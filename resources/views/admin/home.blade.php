@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/home.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h1>ADMIN PANEL</h1>
    </div>
    <hr/>
    <div class="row options">
        <div class="col-md-12">
            <span><a href="/admin/users"><i class="static-icon fas fa-database"></i>&nbsp;&nbsp;USER DATABASE </a></span>
        </div>
    </div>
    <div class="row options">
        <div class="col-md-12">
            <span><a href="/admin/attendance"><i class="static-icon fas fa-database"></i>&nbsp;&nbsp;ATTENDANCE DATABASE</a></span>
        </div>
    </div>
    <div class="row options">
        <div class="col-md-12">
            <span><a href="/admin/circle"><i class="static-icon fas fa-database"></i>&nbsp;&nbsp;CIRCLE DATABASE</a></span>
        </div>
    </div>
    <div class="row options">
        <div class="col-md-12">
            <span><a href="/admin/dpr"><i class="static-icon fas fa-database"></i>&nbsp;&nbsp;DPR DATABASE</a></span>
        </div>
    </div>
    <div class="row options">
        <div class="col-md-12">
            <span><a href="/admin/invoice"><i class="static-icon fas fa-database"></i>&nbsp;&nbsp;INVOICE DATABASE</a></span>
        </div>
    </div>
</div>
@endsection
