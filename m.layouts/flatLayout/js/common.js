// <![CDATA[
jQuery(function($){
$(document).ready(function (){
	
	var dummy = $("div.global-search-dummy");
	var dummy2 = $("div.menu-dummy")
	var global_search = $("div.global-search");
	var main_header = $("header.main");
		
	var check_prev = $("span.check-prev-dummy").length;
	var check_cancel = $("span.check-cancel-dummy").length;
	if(check_prev>0){
		main_header.find("a.btPrev").show().end().find("button.btSearch").hide();
	}
	if(check_cancel>0){
		main_header.find("a.btCancel").show().end().find("button.btSearch").hide();
	}
	var check_headline2 = $("h2.top-title");
	if(check_headline2.length >0){
		main_header.find("h1").hide();
	}	
	var check_headline = $("h2.member-top-title");
	if(check_headline.length >0){
		main_header.find("h1").hide();
		check_headline2.hide();
	}
	
	main_header.find("button.btSearch").click(function(){
		global_search.toggle().find("input").focus();
		dummy.toggle();
	}).end()
	.find("button.menu-trigger").click(function(){
		dummy2.toggle().css("z-index", "65");
		dummy.hide();
		global_search.hide();
		$("#menu-wrap").toggle().unbind('touchmove');
		var selScrollable = '.scrollable';
		$(document).on('touchmove',function(e){e.preventDefault();});
		$('body').on('touchstart', selScrollable, function(e) {
		  if (e.currentTarget.scrollTop === 0) {
		    e.currentTarget.scrollTop = 1;
		  } else if (e.currentTarget.scrollHeight === e.currentTarget.scrollTop + e.currentTarget.offsetHeight) {
		    e.currentTarget.scrollTop -= 1;
		  }
		});
		$('body').on('touchmove', selScrollable, function(e) {
		  e.stopPropagation();
		});
	});
	
	global_search.find("span.btClose").add(dummy).add(dummy2).click(function(){
		global_search.add(dummy).add(dummy2).add($("#menu-wrap")).hide();
		dummy.css("z-index", "50");
		$(document).unbind('touchmove');
		$('body').unbind('touchmove');
	});
	
	var gnb = $("nav.gnb ul");
	
	gnb.find("li:not(:has(ul))").find("span.arrow").hide().end().end().find("li span.arrow").click(function(){
		$(this).toggleClass("arrowUp").toggleClass("arrowDown");
		$(this).next().slideToggle(500);
	});
	$("div.member-menu-logged>div.member-menu-top").click(function(){
		$(this).toggleClass("arrowUp").toggleClass("arrowDown").next().slideToggle(500);
	});
	
	var lang_area = $("footer li.lang-area");
	lang_area.find("button.btBasic").click(function(){
		lang_area.find("ul.lang-list").toggle();
		$(this).toggleClass("on");
	})
			
	if($("span.cbt").length > 0){
		$("#btTop").hide();
	}

	$("div.info-table td select").next("input").css({
		"display" : "block",
		"margin-top": "5px"
	});
	
	var login_wrap = $("div.login-wrap")
	
	if(login_wrap.length >0){
		$("footer.main-footer").hide();
		login_wrap.height($(document).height()-120);
	}
	
	$(window).on("orientationchange",function(){
		login_wrap.height($(document).height()-120);
	});
	var supportsOrientationChange = "onorientationchange" in window,
    orientationEvent = supportsOrientationChange ? "orientationchange" : "resize";

	window.addEventListener(orientationEvent, function() {
		login_wrap.height($(document).height()-120);
	}, false);
});

if ($(window).width() > 767) {
	var myLefts = $('div.inside').clone().find('div.gridEl:odd').remove().end().html();
	var myAsides = $('div.inside').clone().find('div.gridEl:even').remove().end().html();
	
	$('div.content div.inside').html('');
	
	$('div.content div.inside').append('<div class="leftCol" />');
	$('div.content .leftCol').append(myLefts);
	
	$('div.content .inside').append('<div class="rightCol" />');
	$('div.content .rightCol').append(myAsides);
}

    
function cancelZoom()
{
    var d = document,
        viewport,
        content,
        maxScale = ',maximum-scale=',
        maxScaleRegex = /,*maximum\-scale\=\d*\.*\d*/;
 
    // this should be a focusable DOM Element
    if(!this.addEventListener || !d.querySelector) {
        return;
    }
 
    viewport = d.querySelector('meta[name="viewport"]');
    content = viewport.content;
 
    function changeViewport(event)
    {
        // http://nerd.vasilis.nl/prevent-ios-from-zooming-onfocus/
        viewport.content = content + (event.type == 'blur' ? (content.match(maxScaleRegex, '') ? '' : maxScale + 10) : maxScale + 1);
    }
 
    // We could use DOMFocusIn here, but it's deprecated.
    this.addEventListener('focus', changeViewport, true);
    this.addEventListener('blur', changeViewport, false);
}
 
// jQuery-plugin
(function($)
{
    $.fn.cancelZoom = function()
    {
        return this.each(cancelZoom);
    };
 
    // Usage:
    $('input,select,textarea').cancelZoom();
})(jQuery);



});

// ]]>