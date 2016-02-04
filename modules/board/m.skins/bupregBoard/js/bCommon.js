// <![CDATA[
jQuery(function($){
$(document).ready(function (){
	
	var nCheck = $("div.webzine-style").find("span.author");
	if(nCheck.find("img").length){
		nCheck.removeClass("author").css("margin-right", "10px");
	}

	var list_header = $("header.list-header");
	
	list_header.find("button.btSearch").click(function(){
		$(this).toggleClass("btAdmin");
		$(this).toggleClass("btBasic");
		list_header.find("div.search-area").toggle();
	});	
	
	list_header.find("button.btNotice").click(function(){
		$(this).toggleClass("btAdmin");
		$(this).toggleClass("btBasic");
		$(".notice-list").toggle();
	});
	
	var flatBoard = $("section.flatBoard");
	
	var gallery_list = flatBoard.find("div.m-gallery>ul.list>li");
	gallery_list.find("img[title='file']").hide();
	var webzine_list = flatBoard.find("div.m-webzine>ul.list>li");
	webzine_list.find("img[title='file']").hide();
	
	var talkbox = flatBoard.find("div.m-talkbox>ul.list>li");
	talkbox.find("img[title='file']").hide();
	var talkbox_body = talkbox.find("div.bubble");
	talkbox_body.width(talkbox.width()-75);
	
	var read_control = $(".read-control");
	
	read_control.find("button.btShare").click(function(){
		read_control.find("div.share").toggle();
	});
	
	read_control.find("button.btFile").click(function(){
		$("section.flatBoard div.read-file").toggle();
	});
	
	var declare = flatBoard.find("div.declare");
	
	read_control.find("button.btDeclare").click(function(){
		declare.toggle();
	})
	declare.find("button.btLight").click(function(){
		declare.hide();
	})
	
	var extra_var = $("table.xv");
	
	if(extra_var.find("th").length == 0){
		extra_var.css("margin-bottom","0");
	}
	
	var comment_write = $("div.comment-write");
	comment_write.find("button.btOpenWrite").click(function(){
		$(this).hide();
		$(this).next().hide();
		comment_write.find("form.cWrite-body").show().find("textarea").focus();
	});
	comment_write.find("a.btCancel").click(function(){
		comment_write.find("form.cWrite-body").hide();
		comment_write.find("button.btOpenWrite").show();
		comment_write.find("a.btDark").show();
	});
	
	
	$("div.write-form>form>ul>li.exvar input.tel:not(:last-child)").after("<span class='dash'>-</span>");
	function viewport(){
		var e = window
		, a = 'inner';
		if ( !( 'innerWidth' in window ) ){
			a = 'client';
			e = document.documentElement || document.body;
		}
		return { width : e[ a+'Width' ] , height : e[ a+'Height' ] }
	}
	
	var comment_el = $("div.comment-el");
	var comment_control = $("table.comment-control");
	var wf_list = $("div.write-form>form>ul>li");
	var blogbox_body = $("section.flatBoard div.m-blogbox>ul.list>li>div.bubble");
	
	comment_el.find("span.blind-text").click(function(){
		$(this).next("div.blind-comment").toggle();
	});
	
	
	if (viewport().width < 768) {
		comment_el.click(function(){
			$("#comment-control-dummy").show();
			$(this).next("table.comment-control").show();
			$('body').bind('touchmove', function(e){e.preventDefault()});
		});
		$(".comment-body a, .secret-comment, .blind-text").click(function(e){
			e.stopPropagation();
		});
		
		comment_control.find("a.bt-cc-cancel").click(function(){
			$(this).closest("table.comment-control").hide();
			$("#comment-control-dummy").hide();
			$('body').unbind('touchmove');
		});
		
		wf_list.each(function(){
			var this_width = $(this).width();
			var label_width = $(this).find("label").width();
			$(this).find("input[class!=tel][type!=checkbox][type!=radio]").width(this_width-label_width-48);
			$(this).find("textarea").width(this_width-label_width-45);
			$(this).find("select").width(this_width-label_width-50);
		})
	}
	if (viewport().width > 767){
		comment_control.find("button.btMore").click(function(){
			$(this).parent().prevAll("li.phone").css("display", "inline-block");
			$(this).next("button.btClose").css("display", "inline-block");
			$(this).hide();
		});
		comment_control.find("button.btClose").click(function(){
			$(this).parent().prevAll("li.phone").hide();
			$(this).prev("button.btMore").css("display", "inline-block");
			$(this).hide();
		});
		blogbox_body.find("div.left-side").width(blogbox_body.width()-340);
		talkbox_body.find("div.left-side").width(talkbox_body.width()-345);
	}
		
	
	if (viewport().width > 567){
		webzine_list.find("div.webzine-container").width(webzine_list.width()-145);
	}
	$(window).resize(function(){
		if (viewport().width > 567){
			var thumb_image = webzine_list.find("div.thumb-image");
			thumb_image.width(130).css("margin-left", "12px");
			webzine_list.find("div.webzine-container").width(webzine_list.width()-145);
		}
		if (viewport().width < 568){
			var thumb_image = webzine_list.find("div.thumb-image");
			thumb_image.width("28%").css("margin-left", "4%");
			webzine_list.find("div.webzine-container").width("68%");
		}
		talkbox_body.width(talkbox.width()-75);
	});

});
    
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