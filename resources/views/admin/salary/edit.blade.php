@extends('layouts.admin')

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
        <form method="post" action="{{ route('salary.store') }}">
            @csrf
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>EMP ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="emp_id" value={{$emp_id}}/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" value={{$date}}/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Present Days: </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="present" value={{$present}}/>
                </div>
            </div>
           <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Absent Days: </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="absent" value="{{$absent}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Gross Salary : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="gross" value="{{$gross}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>PF : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pf" value={{$pf}}/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>ESI : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="esi" value={{$esi}}/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Net Pay : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="netpay" value={{$netpay}}/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
</div>
</div>
@endsection