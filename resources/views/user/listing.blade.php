<div class="row">
    <div class="col-sm-12">
    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span style="text-decoration:underline;">{{Auth::user()->emp_id}}</span> From  : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
    <p><b>Days Present</b> : {{$present}}</p>
    <p><b>Days Absent</b> : {{$absent}}</p>
    <div class="table-container">
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
</div>