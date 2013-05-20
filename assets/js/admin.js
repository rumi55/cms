"use strict";
(function($, app, window){

	app.init = function(admin){

		/* init tinyMCE */
		tinymce.init({
			selector: 'textarea.editor',
			menubar: false,
			browser_spellcheck: true,
			statusbar: false,
			resize: false,
		    plugins: [
		         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		         "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage", 
		   style_formats: [
		        {title: 'Bold text', inline: 'strong'},
		        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		        {title: 'Example 1', inline: 'span', classes: 'example1'},
		        {title: 'Example 2', inline: 'span', classes: 'example2'},
		        {title: 'Table styles'},
		        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		    ]
		});
		/* if no pages on admin page show create Page */
		if($('.page').length != 0){
			$('.create-page').hide();
		}
	}

	app.CommunicationLayer = function(spec){
		var self = this,
			loader = '<img src="assets/img/loader.gif" class="loader" />';
		//server stuff
		self.Post = function(e){
			var data = $(this).serialize(),
				action = $(this).attr('action'),
				method = $(this).attr('method');

			$.ajax({
				url: action,
				type: method,
				data: data,
				success: self.success,
				dataType: 'json'
			});
			return false;
		}

		self.success = function(data){
			if(data.response === true){
				app.CreateNotifs($('form'), 'success', data.message);
			}else{
				app.CreateNotifs($('form'), 'error', data.message);
			}
		}

		self.formValidate = function(e){
			var val = $(this).val(),
				count = 0;

			$.each($(this).parent().find('input'), function(i){
				if($.trim($(this).val()) != ''){
					count++;
				}
			});

			if(count != $(this).parent().find('input').length){
				
				$(this).css('border-color', 'red');
				
				if(!$('.-create-btn').hasClass('disabled')){
					$('.-create-btn').addClass('disabled');
				}
			}else{
				$('.-create-btn').removeClass('disabled');
			}
		}
		return self;
	};

	app.PerformBinding = function(admin, selector){
		
		var $wrapper = $(selector || window.document);

		$wrapper
			.on('click', '.-add', function(e){
				$('.-create-page').slideToggle();
			})
			.on('click', '.-create-btn', function(){
				if($(this).hasClass('disabled'))
					return false;


			})
			.on('blur', '.-create-page > input, .-create-page, textarea', admin.formValidate)
			.on('keyup', '#page-title', app.buildUrl)
			.on('submit', '.-form-create', admin.Post);

		app.init(admin);
	};

	app.CreateNotifs = function(container, type, message){

		container.prepend(
			'<div class="alert alert-'+type+'">'+message+'</div>'
		);

		if(type === 'success'){
			var timer = setTimeout(function(){
				$('.alert').fadeOut('slow').remove();
				$(container).slideUp('slow');
				location.reload();
				timer = null;
			}, 2000)
		}
	}

	app.buildUrl = function(e){
		console.log('yeah that makes sense');
		var val = $(this).val(),
			url = val.replace(/[^\w\s]/gi, '');
		url = url.toLowerCase(); // makes it lowercase
		url = url.replace(/^\s\s*/, '').replace(/\s\s*$/, ''); //trims whitespace
		url = url.split(' ').join('-'); //joins spaces with dashes


		$('.-page-url').val(url);
	}

})(jQuery, window.Admin || (window.Admin = {}), window);