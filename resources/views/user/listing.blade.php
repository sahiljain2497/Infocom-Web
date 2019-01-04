<div class="row">
                <div class="col-md-12">
                <p style="font-size: 20px;text-align: center;font-weight: 599;"><span>Showing Records for <span style="text-decoration:underline;">{{$empid}}</span> From  : </span><span style="text-decoration:underline;">{{$start}}</span><span> To </span><span style="text-decoration:underline;">{{$end}}</span></p>
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