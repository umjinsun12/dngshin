!function(d){
	"use strict";
	d.fn.Krzip=function(){
		var e=d(this),
		s=(Math.max(document.body.scrollTop,document.documentElement.scrollTop),
		e.find("#wrap"));
		s.style.display="none";
		var r={postcode:e.find(".krzip-hidden-postcode"),
		roadAddress:e.find(".krzip-hidden-roadAddress"),
		jibunAddress:e.find(".krzip-hidden-jibunAddress"),
		detailAddress:e.find(".krzip-hidden-detailAddress"),
		extraAddress:e.find(".krzip-hidden-extraAddress")},
		i={postcode:e.find(".krzip-postcode"),
		roadAddress:e.find(".krzip-roadAddress"),
		jibunAddress:e.find(".krzip-jibunAddress"),
		detailAddress:e.find(".krzip-detailAddress"),
		extraAddress:e.find(".krzip-extraAddress"),
		search:e.find(".krzip-search"),
		guide:e.find(".krzip-guide")},
		a=new daum.Postcode({
			oncomplete:function(d){
				var e="",s="";
				"R"===d.userSelectedType?(e=d.roadAddress,""!==d.bname&&(s+=d.bname),""!==d.buildingName&&(s+=""!==s?", "+d.buildingName:d.buildingName),s&&(s="("+s+")")):e=d.jibunAddress,i.postcode.val(d.postcode).trigger("change");
				var r="R"===d.userSelectedType?e:d.roadAddress;i.roadAddress.val(r).trigger("change");
				var a="R"===d.userSelectedType?d.jibunAddress:e;
				if(i.jibunAddress.val(a?"("+a+")":a).trigger("change"),i.extraAddress.val(s).trigger("change"),i.guide.hide().html(""),d.autoRoadAddress){
					var n=d.autoRoadAddress+extraRoadAddr;
					i.guide.html("("+xe.lang.msg_krzip_road_address_expectation.replace("%s",n)+")").show()
				}
				else if(d.autoJibunAddress){
					var t=d.autoJibunAddress;
					i.guide.html("("+xe.lang.msg_krzip_jibun_address_expectation.replace("%s",t)+")").show()
				}
				i.detailAddress.trigger("focus")},
			onresize:function(d){
				s.style.height=d.height+"px"
			},width:"100%",height:"100%"});
			
			var n,t,o=["postcode","roadAddress","jibunAddress","detailAddress","extraAddress"];
			
			for(n=0;n<o.length;n++)
			t=o[n],i[t].data("linked",t).on("change",function(){var e=d(this);r[e.data("linked")].val(e.val())});
			
			for(o=["postcode","roadAddress","jibunAddress","extraAddress","search"],n=0;n<o.length;n++)
			t=o[n],i[t].on("click",function(){a.embed(s)})}}(jQuery);