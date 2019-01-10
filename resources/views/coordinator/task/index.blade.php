@extends('layouts.coordinator')

@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">MY TASKS</h1>
        </div>
        <hr/>
        @if(Session::has('success-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('success-message')}}</strong>
        </div>
        @endif
        <div class="row" style="margin-bottom:10px;">
            <a href="{{ route('coordinator.task.create')}}" class="btn btn-primary">ADD NEW TASK</a>
        </div>
        <div class="form-container">
            <form method="GET">
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Start Date</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="start" value="{{$start}}" class="form-control" />
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>End Date</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="end" value="{{$end}}" class="form-control"/>
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-12 text-center">
                        <input type="submit" value="SEARCH" class="btn btn-primary search-btn" />
                    </div>
                </div>
            </form>
        </div>
        <hr/>
        @if(count($records) != 0)
            @include('coordinator.task.listing')
        @elseif(!empty($start) && !empty($end))
            <div class="row">
                <div class="col-md-12">
                    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>No Records Found for <span style="text-decoration:underline;">{{$emp_id}}</span> From : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
                </div>
            </div>
        @endif
    </div>
@endsection