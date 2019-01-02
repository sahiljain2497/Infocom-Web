@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/attendance.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
                <h1 class="text-center">EDIT ATTENDANCE INFO</h1>
        </div>
        <hr/>
        @if(Session::has('edit-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('edit-message')}}</strong>
        </div>
        @endif
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
                        <input type="text" name="name" class="form-control" value="{{$attendance->name}}" readonly/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Designation : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="designation" class="form-control" value="{{$attendance->designation}}" readonly/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Mobile : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="{{$attendance->mobile}}" readonly/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Date : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="date" class="form-control" value="{{$attendance->date}}" readonly/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Circle : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="circle" class="form-control" value="{{$attendance->circle}}"/>
                        @if($errors->has('circle'))
                            <span style="color:red;">{{$errors->first('circle')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Manager : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="manager" class="form-control" value="{{$attendance->manager}}"/>
                        @if($errors->has('manager'))
                            <span style="color:red;">{{$errors->first('manager')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Project : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="project" class="form-control" value="{{$attendance->project}}"/>
                        @if($errors->has('project'))
                            <span style="color:red;">{{$errors->first('project')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Time in : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="timein" class="form-control" value="{{$attendance->created_at}}"/>
                        @if($errors->has('timein'))
                            <span style="color:red;">{{$errors->first('timein')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Time out : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="timeout" class="form-control" value="{{$attendance->updated_at}}"/>
                        @if($errors->has('timeout'))
                            <span style="color:red;">{{$errors->first('timeout')}}</span>
                        @endif
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