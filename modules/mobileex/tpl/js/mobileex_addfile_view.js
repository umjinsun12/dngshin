jQuery(function($){

	 // 회전정보,가로,세로를 기억하는 변수
	 var addImgRotateInfo = new Array();
	 var addImgWidthInfo = new Array();
	 var addImgHeightInfo = new Array();

    $(document).ready(function() {

    		var c=$('.xe_content[class*=document_]').eq(0);
	         if(c.attr('class'))
	          {
		        var document_srl=c.attr('class').replace(/.*document_([0-9]+).*/,'$1');
		        if(mobileAddFileInfo != 'N') c.prepend(mobileAddFileInfo);
		        if(pcAddFileInfo != 'N') c.prepend(pcAddFileInfo);
	          }
    	     
    	     if(addfileConfigInfo && addfileConfigInfo.length > 0 ) {
         	     // 배열을 반복해서..돌린다
         	     $.each(addfileConfigInfo, function(index, item) {
         	     	    var rotate;
         	     	    
         	     	    if(item.rotate) rotate = parseInt(item.rotate);
         	     	    else rotate = 0
         	     	    	
         	          if(rotate &&rotate !=0) {
         	           $('#addImg_'+item.file_srl).rotate({duration:1,animateTo:rotate});
         	          }
         	          addImgRotateInfo[item.file_srl] = rotate;
         	          addImgWidthInfo[item.file_srl] = item.width
         	          addImgHeightInfo[item.file_srl] = item.height;
         	     });
    	    }
    	     
          if(addfileBtn == 'Y') {
          	var maxWidth = $('.add_img_wrap').width();
          	$('.add_img_wrap a').click(function(){
          		var file_srl = $(this).attr('name');
             	var imgWidth = $('#addImg_'+file_srl).width();
             	if(imgWidth > addfileMinSize) {
             		   $('#addImgBtn_'+file_srl).css('padding','5px'); 
             			$('#addImgBtn_'+file_srl).css('width',addfileMinSize+'px').css('height',addfileMinSize+'px'); 
             			$('#addImg_'+file_srl).css('height',addfileMinSize+'px'); 
             			$('#addImgIcon_'+file_srl).removeClass('m');
             			$('#addImgIcon_'+file_srl).addClass('p');
                }
             	else {
             		 $('#addImgBtn_'+file_srl).css('padding',0); 
             		 $('#addImgBtn_'+file_srl).css('width',maxWidth+'px'); 
             		 $('#addImgBtn_'+file_srl).css('height','auto'); 
             		 $('#addImg_'+file_srl).css('width','100%'); 
             		 $('#addImg_'+file_srl).css('height','auto'); 
             		 $('#addImgIcon_'+file_srl).removeClass('p');
             		 $('#addImgIcon_'+file_srl).addClass('m');
             	}
          	});
         }	
    });
});