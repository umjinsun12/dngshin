function completeInsertAttendance(ret_obj) {
    var error = ret_obj['error'];
    var message = ret_obj['message'];
    var page = ret_obj['page'];
    //alert(message);
    var url = current_url;
    location.href = url;
}

var a = true;
var b = true;
function text_entercheck(e){
    var qook = jQuery("#click_button").get(0);
    if(e.keyCode == 13){
        if(b){
            if(!a){return ;}
            b = false;
            qook.disabled = true;
            return procFilter(qook, insert_attendance);
        } else{ 
            alert(warn_msg);
        }
        return false;
    } else{
        return true;
    }
} 

function attendance_check(){
    var qook = jQuery('#click_button').get(0);
    if(a){
        if(!b){return ;}
        a = false;
        qook.disabled=true;
        return procFilter(qook, insert_attendance);
    } else{ 
        alert(warn_msg);
    }
}


function attendance_no_check(){
    var qook = jQuery('#click_button').get(0);
	alert('출석 인사말을 입력해 주세요');

}


function modify_att(){
    var m = jQuery('#modify_submit').get(0);
    return procFilter(m, update_attendance);
}


function alll() {
 var m = document.f1.greetings.value;
 var mm = m.length;
  document.f1.t2.value = mm;
 setTimeout("alll()" ,0);
 }
 
