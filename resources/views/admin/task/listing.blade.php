<div class="row">
    <div class="col-sm-12">
    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span style="text-decoration:underline;">{{Auth::user()->emp_id}}</span> From  : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>Manager</th>
                <th>Employee</th>
                <th>Note</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->manager}}</td>
                        <td>{{$record->emp_id}}</td>
                        <td>{{$record->note}}</td>
                        <td>{{$record->status == 0 ? 'incomplete' : 'complete'}}</td>
                        <td>
                        @if(Auth::user()->emp_id != $record->manager)
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="">
                                    {!! Form::open(['route' => ['task.update',$record->id],'method'=>'PATCH']) !!}
                                        {!! Form::token() !!}
                                        <input type="hidden" name="status" value="completed" />
                                        <input type="submit" class="dropdown-item" value="Complete"/>
                                    {!! Form::close() !!}
                                    </a>
                                </div>
                            </div>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>