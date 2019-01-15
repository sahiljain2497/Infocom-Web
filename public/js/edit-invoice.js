function openSenderBox(){
	$('.sender').slideToggle();
}
function openRecieverBox(){
	$('.reciever').slideToggle();
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
	let idd = $('#invoice_id').val();
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
        reciever_companyname : $('#reciever_companyname').val(),
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
    console.log(data);
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url:'/admin/invoice/'+idd,
        type: 'PATCH',
        data: data,
        success:function(data){
            //console.log(data);
            alert("INVOICE UPDATED SUCCESSFULLY");
        }
    });
}


$(document).ready(function(){
	$('#save_bill').click(function(){
        saveBill();
    })
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