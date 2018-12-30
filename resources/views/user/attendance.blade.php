@extends('layouts.user')

@section('content')
<div class="container">
        <div class="jumbotron">
        <div class="row">
            <form method="GET">
                <input type="date" name="start" value="{{$start}}" />
                <input type="date" name="end" value="{{$end}}" />
                <input type="submit" value="search" />
            </form>
        </div>
        </div>
        @if(!empty($records))
            <p>got some data</p>
            <div class="row">
                <div class="col-md-12">
                    <span>Showing from Date : </span><span>{{$start}}</span><span> to </span><span>{{$end}}</span>
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