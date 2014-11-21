// JavaScript Document
(function($){$(document).ready(function(){
	
	// Add Parameters to YouTube Embeds
	$('iframe[src^="http://www.youtube.com"], iframe[src^="https://www.youtube.com"], iframe[src^="//www.youtube.com"]').each(function() {
		var url = $(this).attr("src");
		var parameters = url.substring(url.indexOf('?'), url.length );
		if ( parameters) { 
			parameters = parameters + '&autohide=1&modestbranding=1&rel=0&showinfo=0&border=0&fs=1&iv_load_policy=1&theme=light&controls=1';
		}else{
			parameters = '?autohide=1&modestbranding=1&rel=0&showinfo=0&border=0&fs=1&iv_load_policy=1&theme=light&controls=1';
		}
		
		newsrc = url.substring(0,url.indexOf('?')) + parameters;
		
		$(this).attr("src",newsrc);
	});
	
	
})})(jQuery);
	

