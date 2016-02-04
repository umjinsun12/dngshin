<?php 
class igrusboardController extends igrusboard
{
	public function procIgrusboardWrite()
	{
		//권한 체크
		if(!$this->grant->write_document)
		{
			return new Object(-1, 'msg_not_permitted');
		}
		
		//데이터 준비
		$args = new stdClass();
		$args->module_srl = $this->module_srl;
		$args->nick_name = Context::get('nick_name');
		$args->title = Context::get('title');
		$args->content = Context::get('content');
		
		// document 모듈에 등록
		$oDocumentController = getController('document');
		$output = $oDocumentController->insertDocument($args);
		
		
		// 결과 체크
		if(!$output->toBool())
		{
			return $output;
		}
		
		//성공시 글 보기 화면으로 이동
		$returnUrl = getNotEncodeUrl('','mid',$this->mid, 'document_srl', $output->get('document_srl'));
		$this->setRedirectUrl($returnUrl);
	} 
}