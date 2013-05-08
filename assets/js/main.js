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

	/* admin page actions */
	$('.delete').on('click', deleteClick);

	$('.main').on('click', 'article.page .alert .no', function(){
		$(this).parent().parent().slideUp();

		$(this).parent().parent().promise().done(function(){
			$(this).parent().find('.delete').removeClass('inactive').on('click', deleteClick)
			$(this).remove();
		})
	});
	$('.main').on('click', 'article.page .alert .yes', function(){
		$(this).find('.loader').show();
		console.log('winner');
	});
})

var deleteClick = function(){
		var message = 'Are you sure you want to delete this page?';
		createAlert($(this).parent().parent(), message, $(this).attr('data-page-id'));
		$(this).addClass('inactive').unbind('click');
	},

	createAlert = function(div, message, pageId){
		var html = '<div class="alert alert-error hidden"><p>';
			html += message;
			html += '</p><div class="actions"><span class="btn btn-success yes" data-page-id="'+pageId+'"><img src="../assets/img/loader.gif" class="loader" />Yes</span><span class="btn btn-danger no">No</span></div>';

		div.prepend(html);
		
		div.promise().done(function(){
			div.find('.hidden').hide().removeClass('hidden').slideDown();
		})	
	}