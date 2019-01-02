@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/attendance.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">ATTENDANCE RECORDS</h1>
        </div>
        <hr/>
        @if(Session::has('delete-message'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('delete-message')}}</strong>
        </div>
        @endif
        <div class="form-container">
            <form method="GET">
                <div class="row form-row">
                    <div class="col-md-3 label-div">
                        <label>EMP ID :</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" placeholder="Search EMPID" name="emp_id" value="{{$empid}}" class="form-control" />
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
        @if(count($records) > 0)
            <div class="row">
                <div class="table-container">
                    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span>{{$empid}}</span> from date : </span><span>{{$start}}</span><span> to </span><span>{{$end}}</span></p>
                    <table class="table">
                        <thead>
                            <th>S.no</th>
                            <th>Circle</th>
                            <th>Manager</th>
                            <th>Project</th>
                            <th>Time-in</th>
                            <th>Time-out</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->circle}}</td>
                                    <td>{{$record->manager}}</td>
                                    <td>{{$record->project}}</td>
                                    <td>{{$record->created_at}}</td>
                                    <td>{{$record->updated_at}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{route('attendance.edit',$record->id)}}" class="dropdown-item">Edit</a>
                                                {!! Form::open(['route' => ['attendance.destroy',$record->id]]) !!}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::hidden('empid', $record->emp_id) }}
                                                    {{ Form::hidden('start', $start) }}
                                                    {{ Form::hidden('end', $end) }}
                                                <button type="submit" class="dropdown-item">Delete</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $records->onEachSide(2)->appends(['emp_id' => $empid, 'start'=> $start,'end'=> $end ])->links() }} 	
            </div>
        @endif
    </div>
@endsection