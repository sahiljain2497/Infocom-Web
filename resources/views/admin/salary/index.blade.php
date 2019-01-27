@extends('layouts.admin')

@section('content')
<div class="classic-container">
    <div class="jumbotron">
        <h1 class="text-center">SALARY</h1>
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
    <div class="row" style="margin-bottom:10px;">
        <a href="{{ route('salary.create')}}" class="btn btn-primary">ADD SALARY</a>
    </div>
    <div class="form-container">
        <form method="GET">
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>EMP ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="emp_id" value="{{$emp_id}}" class="form-control" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Date</label>
                </div>
                <div class="col-md-9">
                	<input type="date" name="salary_date" class="form-control" value="{{$date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <input type="submit" value="SEARCH" class="btn btn-primary search-btn" />
                </div>
            </div>
        </form>
    </div>
    @if(count($records) > 0)
        @include('admin.salary.listing')
    @endif
</div>
@endsection