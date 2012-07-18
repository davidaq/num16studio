$(function(){
	$('.header .logo,.nav a').hover(function(){
		$(this).stop(true,true);
		$(this).animate({opacity:0.6},300);
	},function(){
		$(this).animate({opacity:1},300);	
	});
	if($('.slideShow')[0]){
		$('.slideShow .screen img:gt(0)').hide();
		$('.slideShow .board .item').hide();
		sliderShow(0);
		var slideCount=$('.slideShow .board .item').length;
		var currSlide=0;
		function play(){
			sliderHide(currSlide);
			currSlide=(currSlide+1)%slideCount;
			sliderShow(currSlide);
		}
		var playTick=setInterval(play,4000);
		$('.slideShow .thumb .item .frame').click(function(){
			clearInterval(playTick);
			playTick=setInterval(play,4000);
			var clicked=$(this).find('img').attr('class');
			if(clicked!=currSlide){
				sliderHide(currSlide);
				currSlide=clicked;
				sliderShow(currSlide);
			}
		});
	}
});
function sliderShow(index){
	var board=$('.slideShow .board .item:eq('+index+')');
	board.css({left:70,opacity:0});
	board.show();
	board.stop(true,true).animate({left:100,opacity:1},400);
	$('.slideShow .thumb .item:eq('+index+') .frame').stop(true,true).animate({marginTop:0},400);
	$('.slideShow .screen .item:eq('+index+')').stop(true,true).fadeIn(400);
}
function sliderHide(index){
	var board=$('.slideShow .board .item:eq('+index+')');
	board.stop(true,true).animate({left:170,opacity:0},400,function(){$(this).hide();});
	$('.slideShow .thumb .item:eq('+index+') .frame').stop(true,true).animate({marginTop:10},400);
	$('.slideShow .screen .item:eq('+index+')').stop(true,true).fadeOut(400);
}