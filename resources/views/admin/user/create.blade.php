@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">USER INFO CARD</h1>
        </div>
        <hr/>
        <div class="form-container">  
            <form method="POST" action="{{route('users.store')}}">
            {{ csrf_field() }}
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Employee ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="emp_id" class="form-control" value="{{$empid}}" readonly/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Name : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="name" class="form-control"/>
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
                    <input type="text" name="email" class="form-control"/>
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
                    <input type="text" name="designation" class="form-control"/>
                    @if($errors->has('designation'))
                        <span style="color:red;">{{$errors->first('designation')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Mobile : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="mobile" class="form-control"/>
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
                    <input type="date" name="dob" class="form-control"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Aadhar No. </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="aadhar" class="form-control"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Pan No.</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="pan" class="form-control"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Experience : </label>
                </div>
                <div class="col-sm-9">
                    <textarea name="experience" class="form-control"></textarea>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Joining : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" name="joining" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                    @if($errors->has('date'))
                        <span style="color:red;">{{$errors->first('date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Password : </label>
                </div>
                <div class="col-sm-9">
                    <input type="password" name="password" class="form-control"/>
                     @if($errors->has('password'))
                        <span style="color:red;">{{$errors->first('password')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Confirm Password : </label>
                </div>
                <div class="col-sm-9">
                    <input type="password" name="password_confirmation" class="form-control"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Account Type : </label>
                </div>
                <div class="col-sm-9">
                    <select type="type" name="type" class="form-control">
                        <option value="user">User</option>
                        <option value="coordinator">Coordinator</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <input type="submit" value="CREATE USER" class="btn btn-primary search-btn"/>
                </div>
            </div>
        </form>
        </div>    
    </div>
@endsection