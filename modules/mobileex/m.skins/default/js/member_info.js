/* 정보 수정 */
function completeModify(ret_obj, response_tags, args, fo_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    alert(message);
    location.href = current_url.setQuery('act','dispMobileexMemberInfo');
}

/* 스크랩 삭제 */
function doDeleteScrap(document_srl) {
	 if(!document_srl) return;
    var params = new Array();
    params['document_srl'] = document_srl;
    exec_xml('member', 'procMemberDeleteScrap', params, function() { location.reload(); });
}

/* 저장글 삭제 */
function doDeleteSavedDocument(document_srl, confirm_message) {
    if(!confirm(confirm_message)) return false;
    if(!document_srl) return;
    var params = new Array();
    params['document_srl'] = document_srl;
    exec_xml('member', 'procMemberDeleteSavedDocument', params, function() { location.reload(); });
}

/* 쪽지삭제 - 리스트상 */
function doDeleteMessages(message_srl, confirm_message) {
    if(!confirm(confirm_message)) return false;
    if(!message_srl) return;
    var params = new Array();
    params['message_srl'] = message_srl;
    exec_xml('mobileex', 'procMobileexDeleteMessage', params, function() { location.reload(); });
}

/* 쪽지삭제 - 쪽지보기 */
function doDeleteMessage(message_srl, confirm_message) {
    if(!confirm(confirm_message)) return false;
    if(!message_srl) return;
    var params = new Array();
    params['message_srl'] = message_srl;
    exec_xml('mobileex', 'procMobileexDeleteMessage', params, function() { 
    	location.href = current_url.setQuery('message_srl','').setQuery('act','dispMobileexMessages');
    });
}

/* 개별 쪽지 보관 */
function doStoreMessage(message_srl, confirm_message) {
	if(!confirm(confirm_message)) return false;
    if(!message_srl) return;
    var params = new Array();
    params['message_srl'] = message_srl;
    exec_xml('communication', 'procCommunicationStoreMessage', params, function() { 
      location.href = current_url.setQuery('message_type','T').setQuery('message_srl','');
    });
}


/* 쪽지발송 */
function completeMobileexSendMessage(ret_obj, response_tags, args, fo_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    alert(message);
    location.href = current_url.setQuery('act','dispMobileexMessages').setQuery('message_type','S').setQuery('message_srl','').setQuery('receiver_srl','');
}


    jQuery(function($){
    $(document).ready(function(){
       $('form .txt').click(function(){ 
       	 $(this).hide();
     	    $(this).parent().find('.input_box').focus();
       });
    
      });
    });