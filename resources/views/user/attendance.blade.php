@extends('layouts.user')

@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">MY ATTENDANCE</h1>
        </div>
        <hr/>
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
        <hr/>
        @if(!empty($records))
            <div class="row">
                <div class="col-md-12">
                <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span>{{$empid}}</span> from date : </span><span>{{$start}}</span><span> to </span><span>{{$end}}</span></p>
                    <table class="table">
                        <thead>
                            <th>S.no</th>
                            <th>Circle</th>
                            <th>Manager</th>
                            <th>Project</th>
                            <th>Time-in</th>
                            <th>Time-out</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection