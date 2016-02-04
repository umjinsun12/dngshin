<?php
$lang->page_list='페이지 목록';
$lang->page_creation='페이지 생성';
$lang->page_management='페이지 관리';
$lang->page_configuration='페이지설정';
$lang->skin_settings='스킨설정';
$lang->plugin='플러그인';
$lang->page='페이지';
$lang->plugin_creation='플러그인 생성';
$lang->plugin_configuration='플러그인 설정';
$lang->payment_details='결제내역';
$lang->plugin_id='플러그인 아이디';
$lang->plugin_title='플러그인 타이틀';
if(!is_array($lang->state_list)){
	$lang->state_list = array();
}
$lang->state_list['1']='진행';
$lang->state_list['2']='완료';
$lang->state_list['3']='오류';
if(!is_array($lang->payment_method)){
	$lang->payment_method = array();
}
$lang->payment_method['VA']='가상계좌';
$lang->payment_method['CC']='신용카드';
$lang->payment_method['MP']='휴대폰';
$lang->payment_method['IB']='계좌이체';
$lang->payment_method['PP']='페이팔';
$lang->payment_method['BT']='무통장입금';
$lang->no_data='자료없음';
$lang->order_number='주문번호';
$lang->paymethod='결제방식';
$lang->products_ordered='결제상품';
$lang->epay_module='결제모듈';
$lang->payment_amount='결제금액';
$lang->payment_member='결제회원';
$lang->payment_date='결제일';
$lang->product='상품';
$lang->price='가격';
$lang->status='상태';
$lang->pg_resultcode='결과값(PG)';
$lang->pg_resultmessage='결과메시지(PG)';
$lang->extension='추가정보';
$lang->view_all='전체보기';
$lang->view_today='당일보기';
$lang->view_1month='1개월';
$lang->view_3month='3개월';
$lang->details='상세내용';
$lang->receipt='영수증';
$lang->result='결과)';
$lang->payment_method='결제수단)';
$lang->cmd_place_order='구매하기';
$lang->about_epay='결제 플러그인 관리 및 결제내역 조회가 가능합니다.';
$lang->about_plugin='결제 플러그인을 선택해 주세요.';
$lang->msg_invalid_epay_module='EPAY 모듈정보를 찾을 수 없습니다. 설정을 확인하세요.';
$lang->msg_login_required='로그인 후 사용하실 수 있습니다.';
$lang->msg_want_status_change='바꾸시겠습니까?';
$lang->msg_no_payment_list='결제내역이 없습니다.';
