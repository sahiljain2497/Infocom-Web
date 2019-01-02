@extends('layouts.user')

@section('content')
<div class="classic-container">
    <div class="jumbotron">
        <h1 class="text-center">MY PROFILE : </h1>
    </div>
    <hr/>
    <form method="POST" action="{{route('user.user.update',$user->id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Employee ID : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="emp_id" value="{{$user->emp_id}}" readonly class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Name : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="name" value="{{$user->name}}" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Email : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="email" value="{{$user->email}}" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Designation : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="designation" value="{{$user->designation}}" class="form-control" readonly/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Mobile : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Date of Birth : </label>
            </div>
            <div class="col-sm-9">
                <input type="date" name="dob" value="{{$user->dob}}" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Aadhar No. </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="aadhar" value="{{$user->aadhar}}" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Pan No.</label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="pan" value="{{$user->pan}}" class="form-control" />
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
                <input type="date" name="joining" value="{{$user->joining}}" class="form-control" readonly/>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-12">    
                <input type="submit" class="btn btn-lg btn-primary" value="Save Changes">
            </div>
        </div>
    </form>
</div>
@endsection