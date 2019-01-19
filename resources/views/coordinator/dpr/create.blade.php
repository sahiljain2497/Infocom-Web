@extends('layouts.coordinator')

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
        <div class="form-container">
        <form method="post" action="{{ route('coordinator.dpr.store') }}">
            @csrf
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Creator ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="creator_id" value="{{Auth::user()->emp_id}}" readonly/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="date" />
                    @if($errors->has('date'))
                        <span style="color:red">{{$errors->first('date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Month : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="month" />
                    @if($errors->has('month'))
                        <span style="color:red">{{$errors->first('month')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Project : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="project" />
                    @if($errors->has('project'))
                        <span style="color:red">{{$errors->first('project')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Customer : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="customer" />
                    @if($errors->has('customer'))
                        <span style="color:red">{{$errors->first('customer')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Circle : </label>
                </div>
                <div class="col-sm-9">
                    <select name="circle" class="form-control">
                        @foreach($circles as $circle)
                            <option value="{{$circle->region}}">{{$circle->region}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Cluster : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="cluster" />
                    @if($errors->has('cluster'))
                        <span style="color:red">{{$errors->first('cluster')}}</span>
                    @endif
                </div>
            </div>            
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Activity Type : </label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="activity_type">
                        <option value="MW Installation and Commission">MW Installation and Commission</option> 
                        <option value="MW De-installation">MW De-installation</option> 
                        <option value="MW ATP">MW ATP </option>
                        <option value="LOGISTIC">Logistic </option>
                        <option value="BTS INSTALLATION">BTS Installation </option> 
                        <option value="BTS De-installation">BTS De-installation</option> 
                        <option value="BTS ATP">BTS ATP</option>
                        <option value="MW/BTS Packing">MW/BTS Packing </option>
                        <option value="LOS SURVEY">LOS SURVEY </option>
                        <option value="RF SURVEY">RF SURVEY </option>
                        <option value="OFC">OFC </option>
                        <option value="OHF">OHF</option>
                        <option value="MAST/POLE">MAST/POLE </option>
                        <option value="UBR Installation">UBR Installation & Commission</option> 
                        <option value="UBR De-installation">UBR De-installation</option> 
                        <option value="l2 survey">l2 survey</option>
                        <option value="EMF">EMF</option>
                        <option value="CLOT">CLOT</option>
                        <option value="SCVT">SCVT</option>
                        <option value="SCFT">SCFT</option>
                    </select>
                    @if($errors->has('activity_type'))
                        <span style="color:red">{{$errors->first('activity_type')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site ID A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_id_a" id="site_id_a" onfocusout="setLinkId()" />
                    @if($errors->has('site_id_a'))
                        <span style="color:red">{{$errors->first('site_id_a')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site ID B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_id_b" id="site_id_b" onfocusout="setLinkId()" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Name A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_name_a" />
                    @if($errors->has('site_name_a'))
                        <span style="color:red">{{$errors->first('site_name_a')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Name B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_name_b" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Link ID : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="link_id" id="link_id" />
                    @if($errors->has('link_id'))
                        <span style="color:red">{{$errors->first('link_id')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Anteena Size : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="anteena_size" />
                    @if($errors->has('anteena_size'))
                        <span style="color:red">{{$errors->first('anteena_size')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Type : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="site_type" />
                    @if($errors->has('site_type'))
                        <span style="color:red">{{$errors->first('site_type')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>SOW : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sow" />
                    @if($errors->has('sow'))
                        <span style="color:red">{{$errors->first('sow')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Quantity : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="quantity" />
                    @if($errors->has('quantity'))
                        <span style="color:red">{{$errors->first('quantity')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Rate of PO: </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="rate" onfocusout="setAmount()"/>
                    @if($errors->has('rate'))
                        <span style="color:red">{{$errors->first('rate')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Amount : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="amount" />
                    @if($errors->has('amount'))
                        <span style="color:red">{{$errors->first('amount')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Payterm : </label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="payterm">
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                        <option value="30">30</option>
                        <option value="60">60</option>
                    </select>
                    @if($errors->has('payterm'))
                        <span style="color:red">{{$errors->first('payterm')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Allocation Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="allocation_date" />
                    @if($errors->has('allocation_date'))
                        <span style="color:red">{{$errors->first('allocation_date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Installation Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="installation_date" />
                    @if($errors->has('installation_date'))
                        <span style="color:red">{{$errors->first('installation_date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Integration Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="integration_date" />
                    @if($errors->has('integration_date'))
                        <span style="color:red">{{$errors->first('integration_date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Dismentale Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="dismentale_date" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>At Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="at_date" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>At Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="at_status" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Site Completion Date : </label>
                </div>
                <div class="col-sm-9">
                    <input type="date" class="form-control" name="site_completion_date" />
                    @if($errors->has('site_completion_date'))
                        <span style="color:red">{{$errors->first('site_completion_date')}}</span>
                    @endif
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Completion Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="completion_status" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Tower Type A : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tower_type_a" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Tower Type B : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tower_type_b" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Payment Status : </label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="payment_status">
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>WCC Status : </label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="wcc_status" name="payment_status">
                        <option value="yes">YES</option>
                        <option value="no">NO</option>
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Number : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_number" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Amount : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_amount" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Invoice Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="invoice_status" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>PO No. : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="po_number" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>PO Status : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="po_status" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Done By : </label>
                </div>
                <div class="col-sm-9">
                    <select class="form-control" name="done_by">
                        <option value="vendor">Vendor</option>
                        <option value="inhouse">inhouse</option>
                    </select>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Name : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_name" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Rate : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_rate" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Payment : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="vendor_payment_status" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Team Name : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="team_name" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button class="btn btn-primary">CREATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection