@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/attendance.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
                <h1 class="text-center">EDIT ATTENDANCE INFO</h1>
        </div>
        <div class="form-container">
            <form method="POST" action="{{route('attendance.update',$attendance->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Employee ID : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="emp_id" class="form-control" value="{{$attendance->emp_id}}" readonly />
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Name : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="{{$attendance->name}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Designation : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="designation" class="form-control" value="{{$attendance->designation}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Mobile : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="{{$attendance->mobile}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Circle : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="circle" class="form-control" value="{{$attendance->circle}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Date : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" value="{{$attendance->date}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Manager : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="manager" class="form-control" value="{{$attendance->manager}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Project : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="joining" class="form-control" value="{{$attendance->project}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Time in : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="timein" class="form-control" value="{{$attendance->created_at}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Time out : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="timeout" class="form-control" value="{{$attendance->updated_at}}"/>
                    </div>
                </div>
                <div class="row text-center form-row" style="margin-top:10px">
                    <div class="col-md-12">    
                        <input type="submit" class="btn btn-lg btn-primary" value="Save Changes">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection