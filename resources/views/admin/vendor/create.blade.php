@extends('layouts.admin')

@section('stylesheets')
<link href="{{ asset('css/admin/vendor.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CREATE VENDOR</h1>
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
        <form method="post" action="{{ route('dpr.store') }}">
            @csrf
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Company : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="company_name"/>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>GSTIN : </label>
                </div>
                <div class="col-sm-9">
                    <input type="texts" class="form-control" name="gstin" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Pan : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pan" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Account : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="account" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Aadhar : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="aadhar" />
                </div>
            </div>
            <div class="row form-row">
                <div class="col-sm-3 label-div">
                    <label>Vendor Code : </label>
                </div>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="code" />
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
                    <button type="button" class="btn btn-primary" id="save_vendor">CREATE</button>
                </div>
            </div>
        </form>
</div>
</div>
@endsection

@section('javascripts')
<script src="{{ asset('js/vendor.js')}}"></script>
@endsection