@extends('layouts.admin')

@section('stylesheets')
<link href="{{ asset('css/admin/vendor.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">EDIT VENDOR</h1>
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
        <form>
            @csrf
            <input type="hidden" value="{{$data->id}}" id="vendor_id">
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Company : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="company_name" value="{{$data->company_name}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>GSTIN : </label>
                </div>
                <div class="col-sm-9">
                    <input type="texts" class="form-control" name="gstin" value="{{$data->gstin}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Pan : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pan" value="{{$data->pan}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Account : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="account" value="{{$data->account}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Aadhar : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="aadhar" value="{{$data->aadhar}}"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Code : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="code" value="{{$data->code}}"/>
                </div>
            </div>
            <div class="row form-row text-center">
                <h1 style="width: 100%;margin-bottom: 20px;margin-top: 20px;">Rates Table :</h1>
                <table class="table" id="rates_table">
                    <thead>
                        <th>Activity-type</th>
                        <th>Rate</th>
                        <th></th>
                    </thead>
                    <tbody id="tbody-1">
                        @for ($i = 1 ; $i <= count($data->rate_list) ; $i++)
                            <tr>
                                <td>
                                    <select class="form-control" type="text">
                                        <option value="MW Installation and Commission" {{ $data->rate_list[$i][0] ? 'selected':''}}>MW Installation and Commission</option> 
                                        <option value="MW De-installation" {{ $data->rate_list[$i][0] == "MW De-installation"  ? 'selected':''}}>MW De-installation</option> 
                                        <option value="MW ATP" {{ $data->rate_list[$i][0] =="MW ATP" ? 'selected':''}}>MW ATP </option>
                                        <option value="LOGISTIC" {{ $data->rate_list[$i][0] =="Logistic" ? 'selected':''}}>Logistic </option>
                                        <option value="BTS INSTALLATION" {{ $data->rate_list[$i][0] =="BTS Installation" ? 'selected':''}}>BTS Installation </option> 
                                        <option value="BTS De-installation" {{ $data->rate_list[$i][0] =="BTS De-installation" ? 'selected':''}}>BTS De-installation</option> 
                                        <option value="BTS ATP" {{ $data->rate_list[$i][0] =="BTS ATP" ? 'selected':''}}>BTS ATP</option>
                                        <option value="MW/BTS Packing" {{ $data->rate_list[$i][0] =="MW/BTS Packing"? 'selected':''}}>MW/BTS Packing </option>
                                        <option value="LOS SURVEY" {{ $data->rate_list[$i][0] =="LOS SURVEY"? 'selected':''}}>LOS SURVEY </option>
                                        <option value="RF SURVEY" {{ $data->rate_list[$i][0] =="RF SURVEY"? 'selected':''}}>RF SURVEY </option>
                                        <option value="OFC" {{ $data->rate_list[$i][0] =="OFC"? 'selected':''}}>OFC </option>
                                        <option value="OHF" {{ $data->rate_list[$i][0] =="OHF"? 'selected':''}}>OHF</option>
                                        <option value="MAST/POLE" {{ $data->rate_list[$i][0] =="MAST/POLE"? 'selected':''}}>MAST/POLE </option>
                                        <option value="UBR Installation" {{ $data->rate_list[$i][0] =="UBR Installation & Commission"? 'selected':''}}>UBR Installation & Commission</option> 
                                        <option value="UBR De-installation" {{ $data->rate_list[$i][0] =="UBR De-installation"? 'selected':''}}>UBR De-installation</option> 
                                        <option value="l2 survey" {{ $data->rate_list[$i][0] =="l2 survey"? 'selected':''}}>l2 survey</option>
                                        <option value="EMF" {{ $data->rate_list[$i][0] =="EMF"? 'selected':''}}>EMF</option>
                                        <option value="CLOT" {{ $data->rate_list[$i][0] =="CLOT"? 'selected':''}}>CLOT</option>
                                        <option value="SCVT" {{ $data->rate_list[$i][0] =="SCVT"? 'selected':''}}>SCVT</option>
                                        <option value="SCFT" {{ $data->rate_list[$i][0] =="SCFT"? 'selected':''}}>SCFT</option>
                                    </select>
                                </td>
                                <td><input type="text" value="{{$data->rate_list[$i][1]}}"></td>
                                <td><button class="delete-row-btn"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        @endfor
                    </tbody>
                    <tbody id="tbody-2">
                        <tr class="text-center tbody_2_row">
                            <td colspan="3">+ Add New Row</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row form-row">
                <div class="col-sm-12 text-center">
                    <button type="button" class="btn btn-primary" id="save_vendor">SAVE CHANGES</button>
                </div>
            </div>
        </form>
</div>
</div>
@endsection

@section('javascripts')
<script src="{{ asset('js/vendor-edit.js')}}"></script>
@endsection