// <![CDATA[
jQuery(function($){
	$("section.swiper").each(function(a){
		$(this).addClass('swiper-container'+a);
		$(this).find('div.swiper-pagination').addClass('swiper-pagination'+a);
		var sCon = $('section.swiper-container'+a);
		var sWrap = sCon.find('ul.swiper-wrapper');
		var slides = sWrap.find('li.swiper-slide');
		var index_slide = sWrap.find('li.slide');
		var tabNav = sCon.find("nav");
		var triggers = tabNav.find("li");
		var tabNum = triggers.length-1;
		var target;
		triggers.first().addClass('active');
		function sliderResponse(target){
			triggers.removeClass('active').eq(target).addClass('active');
		}	
		var mySwiper = new Swiper('section.swiper-container'+a ,{
			pagination: 'div.swiper-pagination'+a,
			calculateHeight:true,
			onSlideNext : function(swiper){
				target = tabNav.find('li.active').index();
				target === tabNum ? target = 0 : target = target+1;
				if(sWrap.find('li.slide.swiper-slide-active').length>0){
					sliderResponse(target);
				}
			},
			onSlidePrev : function(swiper){
				target = tabNav.find('li.active').index();
				tabNum = triggers.length-1;
				target === 0 ? target = tabNum : target = target-1;
				if(sWrap.find("li.slide").prev(".swiper-slide-active").length>0){
					sliderResponse(target);
				}
			}
		});		
		tabNav.find("li").on('click', function(e){
			var tab_index = $(this).index();
			sliderResponse(tab_index);
			var slide_index = sWrap.find("li.slide"+tab_index).index();
			mySwiper.swipeTo(slide_index);
		});
		tabNav.find("li a.bt-more").click(function(event){
			event.stopPropagation();
		})
		mySwiper.resizeFix();
		$(window).on("orientationchange",function(){
			mySwiper.resizeFix();
		});
		var supportsOrientationChange = "onorientationchange" in window,
		    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";
		
		window.addEventListener(orientationEvent, function() {
		    mySwiper.resizeFix();
		}, false);	
	});
	$(document).ready(function (){
		var talkbox = $("div.m-talkbox>section>ul.list>li");
		var talkbox_body = talkbox.find("div.bubble");
		talkbox_body.width(talkbox.width()-75);
		
		
		$(window).resize(function(){
			talkbox_body.width(talkbox.width()-75);
		});
	});
});
// ]]>