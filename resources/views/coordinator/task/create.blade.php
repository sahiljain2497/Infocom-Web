@extends('layouts.coordinator')

@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CREATE TASK</h1>
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
        <div class="form-container">
        <form method="post" action="{{ route('coordinator.task.store') }}">
            @csrf
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>MANAGER : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="manager" value="{{Auth::user()->emp_id}}" readonly />
                    @if($errors->has('manger'))
                        <span style="color:red">{{$errors->first('manager')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>EMPLOYEE ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="emp_id" placeholder="EMP ID" />
                    @if($errors->has('emp_id'))
                        <span style="color:red">{{$errors->first('emp_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
            <div class="col-sm-3 label-div">
                    <label>MESSAGE : </label>
                </div>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" name="note" placeholder="Message"></textarea>
                    @if($errors->has('message'))
                        <span style="color:red">{{$errors->first('message')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-primary">ASSIGN</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection