@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/circle.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CIRCLES</h1>
        </div>
        <hr/>
        <div class="row" style="margin-bottom:10px;">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addCircle">ADD NEW CIRCLE</button>
        </div>
        <div class="row">
            <div class="table-container">
            <table class="table">
                <thead>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($circles as $circle)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$circle->region}}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('circle.edit',$circle->id)}}" class="dropdown-item">Edit</a>
                                        {!! Form::open([
                                            'method' => 'DELETE',
                                            'route' => ['circle.destroy',$circle->id]]) !!}
                                        <button type="submit" class="dropdown-item">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $circles->onEachSide(2)->links() }}
            </div>
        </div>
    </div>
    <div class="modal" id="addCircle">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add new circle </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('circle.store')}}">
                @csrf
                <input type="text" name="circle" /> 
                <input type="submit" value="Create"/>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
@endsection('content')