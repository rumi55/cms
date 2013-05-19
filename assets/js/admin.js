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
		    ],
		    setup: function(ed){
		    	ed.on('blur', admin.formValidate);
		    }
		});
		/* if no pages on admin page show create Page */
		if($('.page').length != 0){
			$('.create-page').hide();
		}
	}

	app.CommunicationLayer = function(spec){
		var self = this,
			loader = '<img src="assets/img/loader.gif" />';
		//server stuff
		self.AddPost = function(data){
			var data = data.serialize();
		}

		self.formValidate = function(e){
			console.log($(this).attr('class'));		
			if($(this).hasClass('mce-tinymce')){
				console.log(tinyMCE.get('page-content').getContent());
			}	
			// var val = $(this).val(),
			// 	count = 0;

			// if($.trim(val) !== ''){
			// 	count++;
			// }else{
			// 	$(this).css('border-color', 'red');
			// }
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
			.on('blur', '.-create-page > input, .-create-page, textarea', admin.formValidate);

		app.init(admin);
	};

})(jQuery, window.Admin || (window.Admin = {}), window);