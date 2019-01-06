<div class="row">
    <div class="col-sm-12">
    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span style="text-decoration:underline;">{{Auth::user()->emp_id}}</span> From  : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Admin</th>
                <th>Super Admin</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->date}}</td>
                        <td>{{$record->amount}}</td>
                        <td>{{$record->note}}</td>
                        <td>{{$record->a_approved}}</td>
                        <td>{{$record->sa_approved}}</td>
                        <td>{{$record->status}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>