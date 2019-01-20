<div class="row">
    <div class="col-sm-12">
    <div class="table-container">
        <table class="table">
            <thead>
                <th>S.no</th>
                <th>Company</th>
                <th>GSTIN</th>
                <th>Account</th>
                <th>Aadhar</th>
                <th>Pan</th>
                <th>Code</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$record->company_name}}</td>
                        <td>{{$record->gstin}}</td>
                        <td>{{$record->account}}</td>
                        <td>{{$record->aadhar}}</td>
                        <td>{{$record->pan}}</td>
                        <td>{{$record->code}}</td>
                        <td>
                        <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('vendor.edit',$record->id)}}">Edit
                                    </a>
                                    <form action="{{ route('vendor.destroy' , $record->id)}}" method="POST">
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