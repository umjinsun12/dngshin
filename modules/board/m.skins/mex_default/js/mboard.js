var totalCmtPageCount;
var totalSubCmtPageCount;
var cmtWriteGrant = false;

function completeInsertComment(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    var mid = ret_obj['mid'];
    var document_srl = ret_obj['document_srl'];
    var comment_srl = ret_obj['comment_srl'];

    var url = current_url.setQuery('mid',mid).setQuery('document_srl',document_srl).setQuery('act','');
    if(comment_srl) url = url.setQuery('rnd',comment_srl)+"#comment_"+comment_srl;

    //alert(message);

    location.href = url;
}

function completeDocumentInserted(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    var mid = ret_obj['mid'];
    var document_srl = ret_obj['document_srl'];
    var category_srl = ret_obj['category_srl'];

    //alert(message);

    var url;
    if(!document_srl)
    {
        url = current_url.setQuery('mid',mid).setQuery('act','');
    }
    else
    {
        url = current_url.setQuery('mid',mid).setQuery('document_srl',document_srl).setQuery('act','');
    }
    if(category_srl) url = url.setQuery('category',category_srl);
    location.href = url;
}

function completeGetPage(ret_val) {
	jQuery("#cl").remove();
	jQuery("#clpn").remove();
	jQuery("#cmt_list").show();
	jQuery("#cmt_list").append(ret_val['html']);
   if(!cmtWriteGrant) jQuery(".cmt_reply_btn").remove();
	jQuery("#cmtLoadingBox").hide();
}

function loadPage(document_srl, page) {
	var params = {};
	jQuery("#cmtLoadingBox").show();
	params["cpage"] = page; 
	params["document_srl"] = document_srl;
	params["mid"] = current_mid;
	exec_xml("board", "getBoardCommentPage", params, completeGetPage, ['html','error','message'], params);
}

function completeGetCmtList(ret_val) {
   totalCmtPageCount = totalCmtPageCount-1;
	jQuery("#cmb").remove();
	jQuery("#cmt_list").show();
	jQuery("#cl").append(ret_val['html']);
   if(totalCmtPageCount == 0) jQuery("#cmb").remove();
   if(!cmtWriteGrant) jQuery(".cmt_reply_btn").remove();
   jQuery("#cmtLoadingBox").hide();
}

function loadCmtList(document_srl, last_comment_srl, view_count) {
	var params = {};
	jQuery("#cmtLoadingBox").show();
	params["target_module"] = 'board'; 
	params["skin_name"] = 'mex_default'; 
	params["view_count"] = view_count; 
	params["last_comment_srl"] = last_comment_srl; 
	params["document_srl"] = document_srl;
	params["mid"] = current_mid;
	exec_xml("mobileex", "getMobileexCommentList", params, completeGetCmtList, ['html','error','message'], params);
}

function completeGetSubCmtList(ret_val) {
   totalSubCmtPageCount = totalSubCmtPageCount-1;
	jQuery("#cmb").remove();
	jQuery("#cmt_list").show();
	jQuery("#scl").append(ret_val['html']);
   if(totalSubCmtPageCount == 0) jQuery("#cmb").remove();
   if(!cmtWriteGrant) jQuery(".cmt_reply_btn").remove();
   jQuery("#cmtLoadingBox").hide();
}

function loadSubCmtList(document_srl, paginate, view_count, up_category) {
	var params = {};
	jQuery("#cmtLoadingBox").show();
	params["target_module"] = 'board'; 
	params["skin_name"] = 'mex_default'; 
	params["view_count"] = view_count; 
	params["paginate"] = paginate; 
	params["document_srl"] = document_srl;
	params["up_category"] = up_category;
	params["mid"] = current_mid;
	exec_xml("mobileex", "getMobileexSubCommentList", params, completeGetSubCmtList, ['html','error','message'], params);
}


function completeDeleteComment(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    var mid = ret_obj['mid'];
    var document_srl = ret_obj['document_srl'];
    var page = ret_obj['page'];

    var url = current_url.setQuery('mid',mid).setQuery('document_srl',document_srl).setQuery('act','');
    if(page) url = url.setQuery('page',page);

    //alert(message);

    location.href = url;
}

function completeDeleteDocument(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    var mid = ret_obj['mid'];
    var page = ret_obj['page'];

    var url = current_url.setQuery('mid',mid).setQuery('act','').setQuery('document_srl','');
    if(page) url = url.setQuery('page',page);

    //alert(message);

    location.href = url;
}

function mFormSubmit(){
		var frm = document.getElementById('mform');
		procFilter(frm, insert);
}