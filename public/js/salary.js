$('document').ready(function(){
	$('.computeDays').click(function(){
		let empid = $('[name="emp_id"]').val();
		let date = $('[name="date"]').val();
		$.ajaxSetup({
		    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		$.ajax({
			url:'/admin/computedays',
			method:'GET',
			data:{
				empid:empid,
				date:date
			},
			success:function(data){
				$('[name="absent"]').val(data.absent);
				$('[name="present"]').val(data.present);
			}
		})	
	})
})
	