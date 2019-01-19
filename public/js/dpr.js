function setLinkId(){
	$('#link_id').val($('#site_id_a').val()+ "-" + $('#site_id_b').val());
}

function setAmount(){
	$('[name="amount"]').val( parseInt($('[name="rate"]').val()) * parseInt($('[name="quantity"]').val()) );
	$('[name="invoice_amount"]').val( parseInt($('[name="rate"]').val()) * parseInt($('[name="quantity"]').val()));
}