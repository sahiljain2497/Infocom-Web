@extends('layouts.coordinator')

@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">EXPENSE REQUEST</h1>
        </div>
        <form action="coordinator.expense.update">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-sm-3 label-div">
                    <label>EMP ID</label>
                </div>
                <div class="col-sm-9">
                    <input type="text" name="emp_id" class="form-control" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <input type="submit" value="SEARCH" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    <div>
@endsection