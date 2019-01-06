@extends('layouts.admin')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CREATE MESSAGE</h1>
        </div>
        <hr/>
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('error')}}</strong>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('success')}}</strong>
        </div>
        @endif
        <form method="post" action="{{route('message.store')}}">
            @csrf
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>EMPID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="to" placeholder="EMP ID" />
                    @if($errors->has('emp_id'))
                        <span style="color:red">{{$errors->first('emp_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>MESSAGE :</label>
                </div>
                <div class="col-sm-9">
                    <textarea name="data" class="form-control"></textarea>
                    @if($errors->has('data'))
                        <span style="color:red">{{$errors->first('data')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-primary">SEND NOTIFICATION</button>
                </div>
            </div>
        </form>
    </div>
@endsection