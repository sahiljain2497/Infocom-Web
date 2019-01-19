@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/vendor.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">MY VENDOR'S</h1>
        </div>
        <hr/>
        @if(Session::has('success-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('success-message')}}</strong>
        </div>
        @endif
        @if(Session::has('unsuccess-message'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('unsuccess-message')}}</strong>
        </div>
        @endif
        <div class="row" style="margin-bottom:10px;">
            <a href="{{route('vendor.create')}}" class="btn btn-primary">ADD NEW VENDOR</a>
        </div>
        <div class="form-container">
            <form method="GET">
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Company Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" name="company_name" value="{{$company_name}}" class="form-control"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-12 text-center">
                        <input type="submit" value="SEARCH" class="btn btn-primary search-btn" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr/>
    @if(count($records) != 0)
        @include('admin.vendor.listing')
    @elseif( !empty($company_name))
        <div class="row">
            <div class="col-md-12">
                <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>No Records Found for <span style="text-decoration:underline;">{{$company_name}}</span></p>
            </div>
        </div>
    @endif
@endsection
@section('javascripts')
<script src="{{ asset('js/vendor.js')}}"></script>
@endsection