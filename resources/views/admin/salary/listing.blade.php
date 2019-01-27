<div class="row">
    <div class="col-sm-12">
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>EMPID</th>
                <th>Month</th>
                <th>Year</th>
                <th>Gross</th>
                <th>PF</th>
                <th>ESI</th>
                <th>Net pay</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->emp_id}}</td>
                        <td>{{\Carbon\Carbon::parse($record->date)->format('F')}}</td>
                        <td>{{$record->year}}</td>
                        <td>{{$record->gross}}</td>
                        <td>{{$record->pf}}</td>
                        <td>{{$record->esi}}</td>
                        <td>{{$record->net_pay}}</td>
                        <td>
                        <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('salary.edit',$record->id)}}">Edit
                                    </a>
                                    <form action="{{ route('salary.destroy' , $record->id)}}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                        {{ csrf_field() }}
                                        <input type="submit" class="dropdown-item" value="Delete">
                                    </form>
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