function showTableData() {
        let rate_list = {};
        let table = document.getElementById('rates_table');
        for (i = 1; i < table.rows.length -1 ; i++) {
            let arr = [];
            var objCells = table.rows.item(i).cells;
            for (var j = 0; j < objCells.length -1; j++) {
            	arr.push(objCells.item(j).firstElementChild.value);
            }
            rate_list[i] = arr;
        }
        //console.log(rate_list);
        return rate_list;
    }

function saveVendor(){
    let data = {
        company_name : $('[name="company_name"]').val(),
        gstin : $('[name="gstin"]').val(),
        pan : $('[name="pan"]').val(),
        aadhar : $('[name="aadhar"]').val(),
        account : $('[name="account"]').val(),
        code : $('[name="code"]').val(),
    }
    rate_list = showTableData();
    data.rate_list = rate_list;
    console.log(data);
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url:'/admin/vendor',
        type: 'POST',
        data: data,
        success:function(data){
            //console.log(data);
            alert("VENDOR CREATED SUCCESSFULLY");
        },
        error:function(data){
        	alert("VENDOR CREATION FAILED");
        }
    });
}

$(document).ready(function(){
	$('#save_vendor').click(function(){
        saveVendor();
    })
	$(document).on('click','.delete-row-btn',function(){
		$(this).parent().parent().remove();
	});

	$('.tbody_2_row').on('click',function(){
		$('#tbody-1').append(`<tr>
		<td>
			<select class="form-control" type="text">
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
		</td>
		<td><input type="text"></td>
		<td><button class="delete-row-btn"><i class="fas fa-trash"></i></button></td>
		</tr>`);	
	});
})