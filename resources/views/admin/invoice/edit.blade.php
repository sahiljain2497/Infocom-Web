@extends('layouts.admin')
@section('stylesheets')
<link href="{{ asset('css/admin/invoice.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="classic-container">
        <div class="jumbotron">
            <h1 class="text-center">CREATE INVOICE</h1>
        </div>
        <hr/>
        <div class="row">
        	<div class="col-sm-12">
        		<form>
        			<input type="hidden" id="invoice_id" value="{{$invoice->id}}">
        			<div class="table-container">
        			<div class="row">
	        			<div class="col-sm-2 label-div">
	        				<label>Invoice Type : </label>
	        			</div>
	        			<div class="col-sm-10">
		        		<select name="invoice_type" class="form-control" id="invoice_type">
		        			<option value="incoming" {{$invoice->invoice_type == 'incoming' ? 'selected':''}}>Incoming</option>
                            <option value="outgoing" {{$invoice->invoice_type == 'outgoing' ? 'selected':''}}>Outgoing</option>
		        		</select>
		        		</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-sm-2 label-div">
	        				<label>Invoice Number : </label>
	        			</div>
	        			<div class="col-sm-3">
		        		<input type="text" value="{{$invoice->invoice_no}}" class="form-control" name="invoice_no" />
		        		</div>
		        		<div class="col-sm-2"></div>
		        		<div class="col-sm-2 label-div">
	        				<label>Invoice Date : </label>
	        			</div>
	        			<div class="col-sm-3">
		        		<input type="date" value="{{$invoice->invoice_date}}" class="form-control" name="invoice_date" />
		        		</div>
	        		</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-md-6 text-center"><button onclick="openSenderBox()" type="button" class="btn btn-primary search-btn">ADD SENDER INFO</button></div>
	        			<div class="col-md-6 text-center"><button onclick="openRecieverBox()" type="button" class="btn btn-primary search-btn">ADD RECIEVER INFO</button></div>
	        		</div>
	        		<div class="row">
	        		<div class="sender col-md-6">
	        			<div class="row"><div class="col-md-12 text-center"><h5>Sender Info :</h5></div></div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Company Name :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->sender_companyname}}" placeholder="Company Name" class="form-control" id="sender_companyname" name="sender_companyname"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>GSTIN : </label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->sender_gstin}}" placeholder="GSTIN" name="sender_gstin" id="sender_gstin" class="form-control"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Address Line 1 :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->sender_address_1}}" placeholder="Address Line 1" name="sender_address_1" id="sender_address_1" class="form-control"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Address Line 2 :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->sender_address_2}}" class="form-control" placeholder="Address Line 2" id="sender_address_2" name="sender_address_2"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Contact :</label>
	        				</div>
	        				<div class="col-sm-9">
			        			<input type="text" value="{{$invoice->sender_contact}}" class="form-control"  placeholder="Contact" id="sender_contact" name="sender_contact"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Pan :</label>
	        				</div>
	        				<div class="col-sm-9">
        						<input type="text" value="{{$invoice->sender_pan}}" class="form-control" placeholder="Pan" id="sender_pan" name="sender_pan"/>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="reciever col-md-6">
	        			<div class="row"><div class="col-md-12 text-center"><h5>Reciever Info :</h5></div></div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Company Name :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->reciever_companyname}}" class="form-control" placeholder="Company Name" name="reciever_companyname" id="reciever_companyname"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>GSTIN : </label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->reciever_gstin}}" class="form-control" placeholder="GSTIN" name="reciever_gstin" id="reciever_gstin"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Address Line 1 :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->reciever_address_1}}" class="form-control" placeholder="Address Line 1" name="reciever_address_1" id="reciever_address_1"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Address Line 2 :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" value="{{$invoice->reciever_address_2}}" class="form-control" placeholder="Address Line 2" id="reciever_address_2" name="reciever_address_2"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Contact :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" class="form-control" value="{{$invoice->reciever_contact}}" placeholder="Contact" id="reciever_contact" name="reciever_contact"/>
	        				</div>
	        			</div>
	        			<div class="row">
	        				<div class="col-sm-3 label-div">
	        					<label>Pan :</label>
	        				</div>
	        				<div class="col-sm-9">
	        					<input type="text" class="form-control" value="{{$invoice->reciever_pan}}" placeholder="Pan" id="reciever_pan" name="reciever_pan"/>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="table-container">
	        			<table class="table" id="item-table">
	        				<thead>
	        					<th>S.no</th>
	        					<th>Item</th>
	        					<th>SAC</th>
	        					<th>HSN</th>
	        					<th>QTY</th>
	        					<th>RATE</th>
	        					<th>Per</th>
	        					<th>Amount</th>
	        					<th>Tax (%)</th>
	        					<th>Tax (Rs)</th>
	        					<th>Total</th>
	        					<th></th>
	        				</thead>
	        				<tbody class="tbody_1">
	        					@for ($i = 1 ; $i <= count($invoice->items_table) ; $i++)
	        						<tr>
	        							<td class="col-1"><input value="{{$invoice->items_table[$i][0]}}"></td>
	        							<td class="col-2"><input value="{{$invoice->items_table[$i][1]}}"></td>
	        							<td class="col-3"><input value="{{$invoice->items_table[$i][2]}}"></td>
	        							<td class="col-4"><input value="{{$invoice->items_table[$i][3]}}"></td>
	        							<td class="col-5"><input value="{{$invoice->items_table[$i][4]}}"></td>
	        							<td class="col-6"><input value="{{$invoice->items_table[$i][5]}}"></td>
	        							<td class="col-7"><input value="{{$invoice->items_table[$i][6]}}"></td>
	        							<td class="col-8"><input value="{{$invoice->items_table[$i][7]}}"></td>
	        							<td class="col-9"><input value="{{$invoice->items_table[$i][8]}}"></td>
	        							<td class="col-10"><input value="{{$invoice->items_table[$i][9]}}"></td>
	        							<td class="col-11"><input value="{{$invoice->items_table[$i][10]}}"></td>
	        							<td><button class="delete-row-btn"><i class="fas fa-trash"></i></button></td>
	        						</tr>
	        					@endfor
	        				</tbody>
	        				<tbody class="tbody_2">
	        					<tr class="tbody_2_row_1" style="text-align: center;">
	        						<td colspan="12"><b> + ADD NEW ROW</b></td>
	        					</tr>
	        				</tbody>
	        			</table>
	        		</div>
	        	</div>
	        	<hr/>
	        	<div class="table-container">
	        		<div class="row">
	        			<div class="col-sm-2 label-div">
	        				<label>Invoice Description : </label>
	        			</div>
	        			<div class="col-sm-10">
	        				<input type="text" value="{{$invoice->invoice_description}}" placeholder="Description" name="invoice_description" class="form-control">
		        		</div>
	        		</div>
	        		<div class="row">
	        			<div class="col-sm-2 label-div">
	        				<label>Invoice Amount : </label>
	        			</div>
	        			<div class="col-sm-10">
	        				<input type="text" value="{{$invoice->invoice_total}}" placeholder="Total Amount" class="form-control" name="invoice_total">
		        		</div>
	        		</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-md-12 text-center">
	        			<input id="save_bill" type="button" value="SAVE BILL" class="btn btn-primary search-btn">
	        		</div>
	        	</div>
	        	</form>
        	</div>
        </div>
    </div>
@endsection
@section('javascripts')
<script src="{{ asset('js/edit-invoice.js')}}"></script>
@endsection