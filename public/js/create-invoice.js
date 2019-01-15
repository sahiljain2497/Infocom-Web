let companyname = "";
let gstin = "";
let address_1 = "";
let address_2 = "";
let pan = "";
let contact = "";

function setInvoiceDetails(){
	let type = document.getElementById('invoice_type').value;
	if(type == "incoming"){
		$('#sender_companyname').val(companyname);
		$('#sender_gstin').val(gstin);
		$('#sender_address_1').val(address_1);
		$('#sender_address_2').val(address_2);
		$('#sender_pan').val(pan);
		$('#sender_contact').val(contact);
		$('#reciever_companyname').val("");
		$('#reciever_gstin').val("");
		$('#receiver_address_1').val("");
		$('#reciever_address_2').val("");
		$('#reciever_pan').val("");
		$('#reciever_contact').val("");
	}
	else{
		$('#reciever_companyname').val(companyname);
		$('#reciever_gstin').val(gstin);
		$('#reciever_address_1').val(address_1);
		$('#reciever_address_2').val(address_2);
		$('#reciever_pan').val(pan);
		$('#reciever_contact').val(contact);
		$('#sender_companyname').val("");
		$('#sender_gstin').val("");
		$('#sender_address_1').val("");
		$('#sender_address_2').val("");
		$('#sender_pan').val("");
		$('#sender_contact').val("");
	}
}

function loadMyProfile(){
	$('#sender_companyname').val();
}
function openSenderBox(){
	$('.sender').slideToggle();
}
function openRecieverBox(){
	$('.reciever').slideToggle();
}
function invoiceType(){
    let value = document.getElementById('invoice_type').value;
    console.log(value);
    if(value == 'Incoming')
    {
        $('.sender-row').css('display','flex');
        $('.reciever-row').css('display','none');
    }
    else
    {
        $('.sender-row').css('display','none');
        $('.reciever-row').css('display','flex');
    }
}

function showTableData() {
        let items = {};
        let table = document.getElementById('item-table');
        for (i = 1; i < table.rows.length -1 ; i++) {
            let arr = [];
            var objCells = table.rows.item(i).cells;
            for (var j = 0; j < objCells.length -1; j++) {
                arr.push(objCells.item(j).firstChild.value);
            }
            items[i] = arr;
        }
        //console.log(items);
        return items;
    }

function saveBill(){
    // console.log("ada");
    let data = {
        invoice_type : $('#invoice_type').val(),
        invoice_no : $('[name="invoice_no"]').val(),
        invoice_date : $('[name="invoice_date"]').val(),
        sender_companyname : $('#sender_companyname').val(),
        sender_gstin : $('#sender_gstin').val(),
        sender_address_1 : $('#sender_address_1').val(),
        sender_address_2 : $('#sender_address_2').val(),
        sender_pan : $('#sender_pan').val(),
        sender_contact : $('#sender_contact').val(),
        reciever_companyname : $('reciever_companyname').val(),
        reciever_gstin : $('#reciever_gstin').val(),
        reciever_address_1 : $('#reciever_address_1').val(),
        reciever_address_2 : $('#reciever_address_2').val(),
        reciever_pan : $('#reciever_pan').val(),
        reciever_contact : $('#reciever_contact').val(),
        invoice_description : $('[name="invoice_description"]').val(),
        invoice_total : $('[name="invoice_total"]').val()    
    }
    items = showTableData();
    data.items_table = items;
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url:'/admin/invoice',
        type: 'POST',
        data: data,
        success:function(data){
            console.log(data);
        }
    });
}

$(document).ready(function(){
	$('#save_bill').click(function(){
        saveBill();
    })
	$.ajaxSetup({
	    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
	});
	$.ajax({
	    url:'/admin/invoice/create',
	    type: 'GET',
	    success: function( data ){
	    	companyname = data[0].companyname;
	    	gstin = data[0].gstin;
	    	address_1 = data[0].address_line_1;
	    	address_2 = data[0].address_line_2;
	    	pan = data[0].pan;
	    	contact = data[0].mobile;
	    	setInvoiceDetails();
		}
	});	
	$(document).on('click','.delete-row-btn',function(){
		$(this).parent().parent().remove();
	});

	$('.tbody_2_row_1').on('click',function(){
		$('.tbody_1').append(`<tr>
		<td class="col-1"><input type="text"></td>
		<td class="col-2"><input type="text"></td>
		<td class="col-3"><input type="text"></td>
		<td class="col-4"><input type="text"></td>
		<td class="col-5"><input type="text"></td>
		<td class="col-6"><input type="text"></td>
		<td class="col-7"><input type="text"></td>
		<td class="col-8"><input type="text"></td>
		<td class="col-9"><input type="text"></td>
		<td class="col-10"><input type="text"></td>
		<td class="col-11"><input type="text"></td>
		<td class="col-12"><button class="delete-row-btn"><i class="fas fa-trash"></i></button></td>
		</tr>`);	
	});
})