@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">EDIT USER INFO</h1>
        </div>
        <hr/>
        @if(Session::has('update-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('update-message')}}</strong>
        </div>
        @endif
        @if(Session::has('create-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('create-message')}}</strong>
        </div>
        @endif
        <div class="form-container">
            <form method="POST" action="{{route('users.update',$user->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Employee ID : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="emp_id" class="form-control" value="{{$user->emp_id}}" readonly />
                        @if($errors->has('emp_id'))
                            <span style="color:red;">{{$errors->first('emp_id')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Name : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
                        @if($errors->has('name'))
                            <span style="color:red;">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Email : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="email" class="form-control" value="{{$user->email}}"/>
                        @if($errors->has('email'))
                            <span style="color:red;">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Designation : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="designation" class="form-control" value="{{$user->designation}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Mobile : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}"/>
                        @if($errors->has('mobile'))
                            <span style="color:red;">{{$errors->first('mobile')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Date of Birth : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="dob" class="form-control" value="{{$user->dob}}"/>
                        @if($errors->has('dob'))
                            <span style="color:red;">{{$errors->first('dob')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Aadhar No. </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="aadhar" class="form-control" value="{{$user->aadhar}}"/>
                        @if($errors->has('aadhar'))
                            <span style="color:red;">{{$errors->first('aadhar')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Pan No.</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="pan" class="form-control" value="{{$user->pan}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Experience : </label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="experience" class="form-control">{{$user->experience}}</textarea>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Joining : </label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="joining" class="form-control" value="{{$user->joining}}"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Account Type : </label>
                    </div>
                    <div class="col-sm-9">
                        <select type="type" name="type" class="form-control">
                            <option value="user" {{$user->type == "user" ? 'selected': ''}}>User</option>
                            <option value="coordinator" {{$user->type == "coordinator" ? 'selected': ''}}>Coordinator</option>
                            <option value="admin" {{$user->type == "admin" ? 'selected': ''}}>Admin</option>
                        </select>
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