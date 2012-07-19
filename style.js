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
		var playing=false;
		function play(){
			sliderHide(currSlide);
			currSlide=(currSlide+1)%slideCount;
			sliderShow(currSlide);
		}
		function sliderShow(index){
			playing=true;
			setTimeout(function(){
				playing=false;
			},500);
			var board=$('.slideShow .board .item:eq('+index+')');
			board.css({left:70,opacity:0});
			board.show();
			board.animate({left:100,opacity:1},500);
			$('.slideShow .thumb .item:eq('+index+') .frame').animate({marginTop:0},500);
			$('.slideShow .screen .item:eq('+index+')').fadeIn(500);
		}
		function sliderHide(index){
			var board=$('.slideShow .board .item:eq('+index+')');
			board.animate({left:170,opacity:0},500,function(){$(this).hide();});
			$('.slideShow .thumb .item:eq('+index+') .frame').animate({marginTop:10},500);
			$('.slideShow .screen .item:eq('+index+')').fadeOut(500);
		}
		var playTick=setInterval(play,7000);
		$('.slideShow .thumb .item .frame').click(function(){
			if(playing)
				return;
			clearInterval(playTick);
			playTick=setInterval(play,7000);
			var clicked=$(this).find('img').attr('class');
			if(clicked!=currSlide){
				sliderHide(currSlide);
				currSlide=clicked*1;
				sliderShow(currSlide);
			}
		});
	}
});