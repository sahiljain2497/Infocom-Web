@extends('layouts.admin')
@section('stylesheets')
    <link href="{{ asset('css/admin/message.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">MESSAGE</h1>
        </div>
        <hr/>
        <div class="row form-row create-row">
        <div class="col-sm-12">
            <a href="{{ route('message.create')}}" class="btn btn-primary search-btn"><i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;CREATE MESSAGE</a>
        </div>
        </div>
        <hr/>
        <form method="GET">
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>Start Date : </label>
            </div>
            <div class="col-sm-9">
                <input type="date" name="start" class="form-control" />
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-3 label-div">
                <label>End Date : </label>
            </div>
            <div class="col-sm-9">
                <input type="date" name="end" class="form-control"/>
            </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary search-btn">SEARCH</button>
            </div>
        </div>
        </form>
        <hr/>
        <div class="row form-row">
            <table class="table">
                <thead>
                    <th>S.No.</th>
                    <th>Reciever</th>
                    <th>Message</th>
                    <th>Action</th>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection