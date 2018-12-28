@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                        <td>{{$user->id}}</td>
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
                        <td><a href={{route('users.show', $user->id)}} class="btn btn-primary">View</a>
                            {{-- <a href={{route('users.destroy',$user->id)}} class="btn btn-danger">Delete</a> --}}
                            {{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            {{ Form::close() }}
                            <a href={{route('users.edit',$user->id)}} class="btn btn-success">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
