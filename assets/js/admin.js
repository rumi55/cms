"use strict";
(function($, app, window){

	app.init = function(){
		/* init tinyMCE */
		tinymce.init({
			selector: 'textarea.editor',
			menubar: false,
			browser_spellcheck: true,
			statusbar: false,
			resize: false,
			setup: function(ed){
		      ed.onChange.add(function(ed) {
		          console.debug('Editor is done: ' + ed.id);
		      });
			}
		});

		/* if no pages on admin page show create Page */
		if($('.page').length === 0){
			$('.create-page').show();
		}

		new app.CommunicationLayer();
	}

	app.CommunicationLayer = function(spec){
		var self = this,
			loader = '<img src="assets/img/loader.gif" />';
		//server stuff
		self.AddPost = function(data){
			var data = data.serialize();
		}
		return self;
	};

	app.PerformBinding = function(app, selector){
		var $wrapper = $(selector || window.document);

		$wrapper
			.on('click', '.-add', function(e){
				$('.-create-page').slideToggle();
			})
			.on('click', '.-create-btn', function(){
				if($(this).hasClass('disabled'))
					return false;


			})
			.on('blur', '.-create-page > input, .-create-page, textarea', function(){
				var val = $(this).val(),
					count = 0;

				if($.trim(val) !== ''){
					count++;
				}else{
					$(this).css('border-color', 'red');
				}
			})


	};

})(jQuery, window.Admin || (window.Admin = {}), window);