@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>CIRCLES</h1>
        </div>
        <div class="row">
            <button data-toggle="modal" data-target="#addCircle">Add new Circle</button>
        </div>
        <div class="row">
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
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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