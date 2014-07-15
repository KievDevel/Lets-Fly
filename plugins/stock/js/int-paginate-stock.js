$(function(){
	$(window).load(function(){
		$('.liPaginate').liPaginate({
			easing:'easeOutQuart',
			duration: 1000, 
			effect:'fade',
			pagePos:'after',
			pageHeight:940
		});
	})
});