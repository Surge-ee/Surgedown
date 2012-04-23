var MARKDOWN = window.MARKDOWN = (function() {
	//Private scope

   	return {
   		//Public scope
   		init: function() {
   			var container = $('#publish');
   			//var md_textarea = $('.md_left textarea');
			//var md_iframe = $('.md_iframe');

			//Setup resizing
		   	container.delegate('.md_left textarea', 'mouseup', function(){
				var th = $(this);
				th.data('y', th.outerHeight());
				$('.md_iframe').css('height', th.data('y')-10)
		  	});

		  	//Setup AJAX call [this.actionId]
		  	/* Idea:
		  		var timer = setTimeout clearTimeout(timer);
			*/
			var timer = false;
			var actionId = this.actionId;

		  	container.delegate('.md_left textarea', 'keyup', function(e) {

		  		if(timer !== false) {
		  			clearTimeout(timer);
		  		}

		  		var md_iframe = $(this.parentNode.parentNode).find('.md_right iframe');
		  		var md_content = $(this).val();


		  		timer = setTimeout(function() {
		  			$.ajax({
		  				url: '/?ACT='+actionId,
		  				type: 'POST', 
		  				data: {md_markdown: md_content},
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