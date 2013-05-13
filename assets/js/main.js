$(function(){
	$('.form-signin').submit(function(e){
		$('.loader').show();
		var postdata = $(this).serialize();
		$.ajax({
			type: 'POST',
			url: 'http://localhost/cms/admin/login_try',
			data: postdata,
			success: function(data){
				console.log(data.success);
				if(data.success){
					location.reload();
				}else{
					$('.loader').hide();
					$('.form-signin').addClass('error');
				}
			}
		});
		e.preventDefault();
	});
})