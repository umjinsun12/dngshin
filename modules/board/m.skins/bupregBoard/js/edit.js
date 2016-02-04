// <![CDATA[
jQuery(function($){
$(document).ready(function (){
	function strip(html){
	   var tmp = document.createElement("DIV");
	   tmp.innerHTML = html;
	   return tmp.textContent||tmp.innerText;
	}
	$('#nText, #rText').text(function(index, old){
		return strip(old);
	});
});
});
// ]]>