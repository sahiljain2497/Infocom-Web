@extends('layouts.admin')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">EXPENSE RECORDS</h1>
        </div>
        <hr/>
        <div class="form-container">
            <form method="GET">
                <div class="row form-row">
                    <div class="col-md-3 label-div">
                        <label>EMP ID :</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="Search EMPID" name="emp_id" value="{{$emp_id}}" class="form-control" />
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-3 label-div">
                        <label>START DATE:</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="start" value="{{$start}}" class="form-control" />
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-md-3 label-div">
                        <label>END DATE :</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" name="end" value="{{$end}}" class="form-control" />
                    </div>
                </div>
                <div class="row form-row text-center">
                    <div class="col-md-12">
                        <input type="submit" value="SEARCH" class="btn btn-primary search-btn" />
                    </div>
                </div>
            </form>
        </div>
        @if(count($records) != 0)
            @include('admin.employee_expense.listing')
        @elseif(!empty($start) || !empty($end))
            <div class="row">
                <div class="col-md-12">
                    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>No Records Found for <span style="text-decoration:underline;">{{$emp_id}}</span> From : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
                </div>
            </div>
        @endif
    </div>
@endsection