// 어드민 페이지의 등록시킬 모듈 기능 관련 함수

// 등록할 모듈 추가
function insertSelectedModules(id, module_srl, mid, browser_title) {
    var sel_obj = xGetElementById('_'+id);
    for(var i=0;i<sel_obj.options.length;i++) if(sel_obj.options[i].value==module_srl) return;
    var opt = new Option(browser_title+' ('+mid+')', module_srl, false, false);
    sel_obj.options[sel_obj.options.length] = opt;
    if(sel_obj.options.length>8) sel_obj.size = sel_obj.options.length;

    doSyncApplyModules(id);
}

// 등록된 모듈 삭제
function removeApplyModule(id) {
    var sel_obj = xGetElementById('_'+id);
    sel_obj.remove(sel_obj.selectedIndex);
    if(sel_obj.options.length) sel_obj.selectedIndex = sel_obj.options.length-1;
    doSyncApplyModules(id);
}

// 등록한 모듈 리스트에 추가
function doSyncApplyModules(id) {
    var selected_module_srls = new Array();
    var sel_obj = xGetElementById('_'+id);
    for(var i=0;i<sel_obj.options.length;i++) {
        selected_module_srls.push(sel_obj.options[i].value);
    }
    xGetElementById(id).value = selected_module_srls.join(',');
}


