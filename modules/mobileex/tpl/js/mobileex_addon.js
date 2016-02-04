jQuery(function($){
	 
    $(document).ready(function() {
    	
    	   
    		var c=$('.xe_content[class*=document_]').eq(0);
	         if(c.attr('class'))
	          {
		        var document_srl=c.attr('class').replace(/.*document_([0-9]+).*/,'$1');
		        if(mobileAddFileInfo != 'N') c.prepend(mobileAddFileInfo);
		        if(pcAddFileInfo != 'N') c.prepend(pcAddFileInfo);
	          }
    	     
          if(addfileBtn == 'Y') {
          	var maxWidth = $('.add_img_wrap').width();
          	$('.add_img_wrap a').click(function(){
          		var file_srl = $(this).attr('name');
             	var imgWidth = $('#addImg_'+file_srl).width();
             	if(imgWidth > addfileMinSize) {
             			$('#addImg_'+file_srl).css('width',addfileMinSize+'px'); 
             			$('#addImg_'+file_srl).css('height','auto'); 
             			$('#addImgIcon_'+file_srl).removeClass('m');
             			$('#addImgIcon_'+file_srl).addClass('p');
                }
             	else {
             		 
             		 $('#addImg_'+file_srl).css('width',maxWidth); 
             		 $('#addImg_'+file_srl).css('height','auto'); 
             		 $('#addImgIcon_'+file_srl).removeClass('p');
             		 $('#addImgIcon_'+file_srl).addClass('m');
             	}
          	});
         }	
    });
});