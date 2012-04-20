var MARKDOWN = window.MARKDOWN = (function() {
	//Private scope

   	return {
   		//Public scope
   		init: function() {
   			var md_textarea = $('#field_id_4');
			var md_iframe = $('#md_iframe');

			//Setup resizing
		   	md_textarea.data('y', md_textarea.outerHeight()); 

		   	md_textarea.mouseup(function(){
				var th = $(this);
				th.data('y', th.outerHeight());
				md_iframe.css('height', th.data('y')-10)
		  	});

		  	//Setup AJAX call [this.actionId]
		  	/* Idea:
		  		var timer = setTimeout clearTimeout(timer);
			*/
			var timer = false;
			var actionId = this.actionId;

		  	md_textarea.keyup(function(e) {
		  		if(timer !== false) {
		  			clearTimeout(timer);
		  		}

		  		timer = setTimeout(function() {
		  			$.ajax({
		  				url: '/?ACT='+actionId,
		  				type: 'POST',
		  				data: {md_markdown: md_textarea.val()},
		  				dataType: 'html',
		  				error: function(jqXHR, textStatus, errorThrown) {
		  					//console.log('error', errorThrown, textStatus)
		  				},
		  				success: function(data, textStatus, jqXHR) {
		  					md_iframe.contents().find('#container').html(data);
		  				}
		  			});
		  		}, 1000);

		  	});
   		},

   		actionId: false
   	};

})(jQuery);