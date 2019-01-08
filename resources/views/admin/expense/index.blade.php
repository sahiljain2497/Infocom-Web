@extends('layouts.admin')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">MY EXPENSES</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#addExpense">ADD NEW EXPENSE</button>
        </div>
        <div class="row" style="margin-bottom:10px;">
            <a href="{{route('employee_expense.index')}}" class="btn btn-primary">EMPLOYEE EXPENSE REQUEST</a>
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
    </div>
    <hr/>
    @if(count($records) != 0)
        @include('admin.expense.listing')
    @elseif(!empty($start) && !empty($end))
        <div class="row">
            <div class="col-md-12">
                <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>No Records Found for <span style="text-decoration:underline;">{{$empid}}</span> From : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
            </div>
        </div>
    @endif
    <div class="modal" id="addExpense">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Expense </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST" action ="{{route('expense.store')}}">
                @csrf
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Date</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="date" class="form-control"/>
                        @if($errors->has('date'))
                            <span style="color:red;">{{$errors->first('date')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Amount</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="amount" class="form-control"/>
                        @if($errors->has('amount'))
                            <span style="color:red;">{{$errors->first('amount')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-3 label-div">
                        <label>Note</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea name="note" class="form-control"></textarea>
                        @if($errors->has('note'))
                            <span style="color:red;">{{$errors->first('note')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-12 text-center">
                        <input type="submit" value="APPLY" class="btn btn-primary search-btn" />
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
@endsection