@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">USER INFO CARD : </h1>
        </div>
        <div>
            <div class="row">
            <div class="col-sm-6">
                <label>Employee ID : </label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="emp_id" value="{{$user->emp_id}}" />
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
                <input type="text" name="designation" value="{{$user->designation}}"/>
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
                <input type="date" name="joining" value="{{$user->joining}}"/>
            </div>
        </div>
        </div>    
    </div>
@endsection