@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/users.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="classic-container">
    <div class="jumbotron text-center">
        <h1>USER LIST</h1>
    </div>
    <div class="row search-row">
        <form method="GET">
            @csrf
            <input type="text" placeholder="Search Employee ID" name="search-id" class="form-control" />
            <input type="submit" value="Search" class="btn btn-primary search-btn" />
        </form>
    </div>
    <hr/>
    <div class="row">
        <div class="table-container">
            <table class="table">
                <thead>
                    <th>S.no</th>
                    <th>Emp Id</th>
                    <th>Type</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>DOB</th>
                    <th>Designation</th>
                    <th>Aadhar</th>
                    <th>Pan</th>
                    <th>Joining</th>
                    <th>Experience</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->emp_id}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->designation}}</td>
                        <td>{{$user->aadhar}}</td>
                        <td>{{$user->pan}}</td>
                        <td>{{$user->joining}}</td>
                        <td>{{$user->experience}}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                <a href="{{route('users.show', $user->id)}}" class="dropdown-item">View</a>
                                {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
                                <button type="submit" class="dropdown-item">Delete</button>
                                {{ Form::close() }}
                                <a href="{{route('users.edit',$user->id)}}" class="dropdown-item">Edit</a></td>
                                </div>
                            </div> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
