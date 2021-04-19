(function( $ ) {
	'use strict';
	  
	 $( window ).load(function() {
		 var perPage = $('#infiniteContainer').attr('data-per-post');
		 var exhaustedPosts = false;
		 var inRequest = false;
		 var page = 1;
		
		var ajaxInfinite = function() {
			$.ajax({
				type: "GET",
				url: ajaxurl,
				data: {
					action: 'request_infinite_scroll',
					to_page: page,
					order: "desc",
					orderby: "date",
					posts_per_page: perPage
				},
				success: function(data){
					inRequest = false;
					page++;
					
					//insert new html
					$( data ).insertBefore( $('#infiniteBottom') );
					
					//stop the ajax calls if there are no more posts
					if( data.length == 0 ){
						exhaustedPosts =  true;
					}
				}
			});			
		};
		
		$(document).on( 'scroll', function(){
			var scrollTop = $(window).scrollTop();
			var screenBottom = scrollTop + $(window).innerHeight();
			var offset = $('#infiniteBottom').offset().top;
			
			if( (screenBottom > offset) && 
				!exhaustedPosts && 
				!inRequest){
					
				inRequest = true;
				ajaxInfinite();				
			} 
		});
	 });	 
})( jQuery );
