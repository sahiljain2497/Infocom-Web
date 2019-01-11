@extends('layouts.admin')

@section('content')
<div class="classic-container">
    <div class="jumbotron">
        <h1 class="text-center">MY PROFILE : </h1>
    </div>
    <hr/>
    @if(Session::has('unsuccess'))
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{Session::get('unsuccess')}}</strong>
    </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('success')}}</strong>
        </div>
    @endif
    @if(Session::has('created'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{Session::get('created')}}</strong>
        </div>
    @endif
    <div class="form-container">
    @if($info != null)
    <form method="POST" action="{{route('profile.update',$id)}}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    @else
    <form method="POST" action="{{route('profile.store')}}">
        {{ csrf_field() }}
    @endif
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Employee ID : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="emp_id" value="{{$id}}" readonly class="form-control"/>
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
                <input type="text" name="name" value="{{$info['name']}}" class="form-control"/>
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
                <input type="text" name="email" value="{{$info['email']}}" class="form-control"/>
                @if($errors->has('email'))
                    <span style="color:red;">{{$errors->first('email')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Mobile : </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="mobile" value="{{$info['mobile']}}" class="form-control"/>
                @if($errors->has('mobile'))
                    <span style="color:red;">{{$errors->first('mobile')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Aadhar No. </label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="aadhar" value="{{$info['aadhar']}}" class="form-control"/>
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
                <input type="text" name="pan" value="{{$info['pan']}}" class="form-control" />
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Company Name</label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="companyname" value="{{$info['companyname']}}" class="form-control" />
                @if($errors->has('companyname'))
                    <span style="color:red;">{{$errors->first('companyname')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>GSTIN</label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="gstin" value="{{$info['gstin']}}" class="form-control" />
                @if($errors->has('gstin'))
                    <span style="color:red;">{{$errors->first('gstin')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Address Line 1</label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="address_line_1" value="{{$info['address_line_1']}}" class="form-control" />
                @if($errors->has('address_line_1'))
                    <span style="color:red;">{{$errors->first('address_line_1')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Address Line 2</label>
            </div>
            <div class="col-sm-9">
                <input type="text" name="address_line_2" value="{{$info['address_line_2']}}" class="form-control" />
                @if($errors->has('address_line_2'))
                    <span style="color:red;">{{$errors->first('address_line_2')}}</span>
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
        <div class="row text-center">
            <div class="col-md-12">
            @if($info != null)    
                <input type="submit" class="btn btn-lg btn-primary" value="Save Profile">
            @else
                <input type="submit" class="btn btn-lg btn-primary" value="Update Profile">
            @endif
            </div>
        </div>
    </form>
</div>
</div>
@endsection