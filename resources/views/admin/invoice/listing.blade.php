<div class="table-container">
    <table class="table">
        <thead>
            <th>S.no</th>
            <th>Type</th>
            <th>Invoice No.</th>
            <th>Sender Co.</th>
            <th>Reciever Co.</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$invoice->invoice_type}}</td>
                    <td>{{$invoice->invoice_no}}</td>
                    <td>{{$invoice->sender_companyname}}</td>
                    <td>{{$invoice->reciever_companyname}}</td>
                    <td>{{$invoice->invoice_total}}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('invoice.edit',$invoice->id)}}">Edit</a>
                                <a>
                                    {{ Form::open(['route' => ['invoice.destroy', $invoice->id], 'method' => 'delete']) }}
                                        <button class="dropdown-item" type="submit">Delete</button>
                                    {{ Form::close() }}
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>