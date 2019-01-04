@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/invoice.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">INVOICES</h1>
        </div>
        <hr/>
        <br/>
        <div class="row form-row">
            <div class="col-sm-6 options">
                <a href="{{route('invoice.create')}}" class="btn btn-primary option-button">CREATE INVOICE</a>
            </div>
            <div class="col-sm-6 options">
                <button class="btn btn-primary option-button" data-target="#uploadModal" data-toggle="modal">UPLOAD INVOICE</button>
            </div>
        </div>
        <hr/>
        <div class="form-container-invoice">
            <form method="GET">
            @csrf 
                <div class="row form-row">
                    <div class="col-sm-3">
                        <label>Invoice No.</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="text" name="invoice_id" class="form-control" placeholder="Enter invoice No."/>
                    </div>
                </div>
                <div class="row form-row">
                <div class="col-sm-3">
                        <label>Start Date</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="date" name="start" class="form-control"/>
                    </div>
                </div>
                <div class="row form-row">
                <div class="col-sm-3">
                        <label>End Date</label>
                    </div>
                    <div class="col-sm-9 options">
                        <input type="date" name="end" class="form-control"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12 options">
                <button class="btn btn-primary option-button">SEARCH INVOICE</button>
            </div>
        </div>
    </div>
<div class="modal" id="uploadModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">UPLOAD INVOICE</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('invoice.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row form-row">
                        <div class="col-sm-6 label-div">
                            <label>Invoice No </label>
                        </div>
                        <div class="col-sm-6">
                            <input name="invoice_no" type="text" class="form-control"/>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-6 label-div">
                            <label>Invoice Type </label>
                        </div>
                        <div class="col-sm-6">
                            <select id="invoice_type" name="invoice_type" class="form-control" onchange="invoiceType()">
                                <option value="Incoming">Incoming</option>
                                <option value="Outgoing">Outgoing</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-row sender-row">
                        <div class="col-sm-6 label-div">
                            <label>Sender : </label>
                        </div>
                        <div class="col-sm-6">
                            <input name="sender_companyname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-row reciever-row">
                        <div class="col-sm-6 label-div">
                            <label>Reciever : </label>
                        </div>
                        <div class="col-sm-6">
                            <input name="reciever_companyname" class="form-control">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-sm-6 label-div">
                            <label>Select Invoice </label>
                        </div>
                        <div class="col-sm-6">
                            <label for="file-upload" class="custom-file-upload">
                                <i class="fa fa-cloud-upload"></i> UPLOAD INVOICE
                            </label>
                            <input id="file-upload" name="invoice_file" type="file"/>
                        </div>
                    </div>
                    <div class="row form-row" style="margin-top:30px;">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary option-button">SAVE</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection