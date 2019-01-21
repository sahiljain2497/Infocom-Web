function setLinkId(){
	$('#link_id').val($('#site_id_a').val()+ "-" + $('#site_id_b').val());
}

function setAmount(){
	$('[name="amount"]').val( parseInt($('[name="rate"]').val()) * parseInt($('[name="quantity"]').val()) );
	$('[name="invoice_amount"]').val( parseInt($('[name="rate"]').val()) * parseInt($('[name="quantity"]').val()));
}

var vendors = [];

$(document).ready(function(){
	$.ajax({
		url:'/admin/vendor',
		method:'GET',
		success:function(data){
			vendors = data.vendors;
			// console.log(data.vendors); 
		}
	});
	$('[name="vendor_name"]').on('change',function(){
		let vendor = $('[name="vendor_name"]').val();
		let activity = $('[name="activity_type"]').val();
		let rate = 0 ;
		for(let i = 0 ;i < vendors.length ; i++){
			if(vendors[i].company_name == vendor){
				for(let key in vendors[i].rate_list){
					if(vendors[i].rate_list[key][0] == activity){
						rate = vendors[i].rate_list[key][1];
						break;
					}
				}
				break;
			}
		}
		// console.log(rate);
		if(rate != 0){
			$('[name="vendor_rate"]').val(rate);
		}
		else{
			$('[name="vendor_rate"]').val("");	
		}
	});
})