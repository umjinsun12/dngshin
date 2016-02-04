/**
 * @file   modules/mobileex/js/mobileex_admin.js
 * @author COMSIN (comsinnet@naver.com)
 * @brief  mobileex 모듈의 관리자용 javascript
 **/


/* complete to mobileex config */
function completeMobileexConfig(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    alert(message);
    var url = current_url.setQuery('act','dispMobileexAdminConfig');
    location.href = url;
}

/* complete to mobileex config */
function completeModuleDelete(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    alert(message);
    var url = current_url.setQuery('act','dispMobileexAdminModuleList');
    location.href = url;
}
