<div class="row">
    <div class="col-sm-12">
    <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for </span> <span style="text-decoration:underline;">{{Auth::user()->emp_id}}</span>
    @if($start)
        <span> From : </span><span style="text-decoration:underline;">{{$start}}</span>
    @endif
    @if($end)    
        <span> To </span><span style="text-decoration:underline;">{{$end}}</span>
    @endif
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>Date</th>
                <th>Emp ID</th>
                <th>Amount</th>
                <th>Note</th>
                <th>Coordinator</th>
                <th>Admin</th>
                <th>Super Admin</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->date}}</td>
                        <td>{{$record->emp_id}}</td>
                        <td>{{$record->amount}}</td>
                        <td>{{$record->note}}</td>
                        <td>{{$record->c_approved}}</td>
                        <td>{{$record->a_approved}}</td>
                        <td>{{$record->sa_approved}}</td>
                        <td>{{$record->status}}</td>
                        <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">
                                {!! Form::open(['route' => ['coordinator.employee_expense.update',$record->id],'method'=>'PATCH']) !!}
                                    {!! Form::token() !!}
                                    <input type="hidden" name="action" value="approved" />
                                    <input type="submit" class="dropdown-item" value="Approve"/>
                                {!! Form::close() !!}
                                </a>
                                <a class="dropdown-item" href="">
                                {!! Form::open(['route' => ['coordinator.employee_expense.update',$record->id],'method'=>'PATCH']) !!}
                                    {!! Form::token() !!}
                                    <input type="hidden" name="action" value="disapproved" />
                                    <input type="submit" class="dropdown-item" value="Disapprove"/>
                                {!! Form::close() !!}
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