@extends('layouts.admin')

@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CREATE DPR</h1>
        </div>
        <hr/>
        @if(Session::has('success-message'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('success-message')}}</strong>
        </div>
        @endif
        @if(Session::has('unsuccess-message'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>{{Session::get('unsuccess-message')}}</strong>
        </div>
        @endif
        <form method="POST" action="{{ route('dpr.update',$data->id)}}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Creator ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="creator_id" value="{{$data->creator_id}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" value="{{$data->date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Month : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="month" value="{{$data->month}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Project : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="project" value="{{$data->project}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Customer : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="customer" value="{{$data->customer}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Circle : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="circle" value="{{$data->circle}}" >
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Cluster : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="cluster" value="{{$data->cluster}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site ID A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_id_a" value="{{$data->tower_type_a}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site ID B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_id_b" value="{{$data->site_id_b}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Name A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_name_a" value="{{$data->site_name_a}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Name B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_name_b" value="{{$data->site_name_b}}"  />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Link ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="link_id" value="{{$data->link_id}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Type : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_type" value="{{$data->site_type}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Activity Type : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="activity_type" value="{{$data->activity_type}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>SOW : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sow" value="{{$data->sow}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Quantity : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="quantity" value="{{$data->quantity}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Rate : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="rate" value="{{$data->rate}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Amount : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount" value="{{$data->amount}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Payterm : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="payterm" value="{{$data->payterm}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>1<sup>st</sup> Mile Amount: </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="first_mile_amount" value="{{$data->first_mile_amount}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Allocation Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="allocation_date" value="{{$data->allocation_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Installation Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="installation_date" value="{{$data->installation_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Integration Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="integration_date" value="{{$data->integration_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Dismentale Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="dismentale_date" value="{{$data->dismentale_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>At Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="at_date" value="{{$data->at_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>At Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="at_status" value="{{$data->at_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Completion Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="site_completion_date" value="{{$data->site_completion_date}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Completion Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="completion_status" value="{{$data->completion_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Anteena Size : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="anteena_size" value="{{$data->anteena_size}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Tower Type A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tower_type_a" value="{{$data->tower_type_a}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Tower Type B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tower_type_b" value="{{$data->tower_type_b}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Payment Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="payment_status" value="{{$data->payment_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>WCC Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="wcc_status" value="{{$data->wcc_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Number : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_number" value="{{$data->invoice_number}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Amount : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_amount" value="{{$data->invoice_amount}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_status" value="{{$data->invoice_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>PO No. : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="po_number" value="{{$data->po_number}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>PO Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="po_status" value="{{$data->po_status}}"  />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Team Name : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="team_name" value="{{$data->team_name}}"  />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Done By : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="done_by" value="{{$data->done_by}}"  />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Name : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_name" value="{{$data->vendor_name}}"  />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Rate : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_rate" value="{{$data->vendor_rate}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Payment : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_payment_status" value="{{$data->vendor_payment_status}}" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-primary" type="submit">SAVE CHANGES</button>
                </div>
            </div>
        </form>
</div>
@endsection