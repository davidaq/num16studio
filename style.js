$(function(){
	$('.header .logo,.nav a').hover(function(){
		$(this).stop(true,true);
		$(this).animate({opacity:0.6},300);
	},function(){
		$(this).animate({opacity:1},300);	
	});
	if($('.slideShow')[0]){
		$('.slideShow .screen img:gt(0)').hide();
	}
});