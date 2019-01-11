<div class="row">
    <div class="col-sm-12">
    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span style="text-decoration:underline;">{{Auth::user()->emp_id}}</span> From  : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>Date</th>
                <th>Circle</th>
                <th>Project</th>
                <th>Customer</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->date}}</td>
                        <td>{{$record->circle}}</td>
                        <td>{{$record->project}}</td>
                        <td>{{$record->customer}}</td>
                        <td>
                        <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('dpr.show',$record->id)}}">Edit
                                    </a>
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