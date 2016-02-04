<?php

class dgibiController extends dgibi
{
	public function procDgibiWrite()
	{
		// 권한 체크
		if (!$this->grant->write_document)
		{
			return new Object(-1, 'msg_not_permitted');
		}
		
		
		// 결과 체크
		if (!$output->toBool())
		{
			return $output;
		}
		
		// 성공 시 글 보기 화면으로 이동
		$returnUrl = getNotEncodedUrl('', 'mid', $this->mid, 'document_srl', $output->get('document_srl'));
		$this->setRedirectUrl($returnUrl);
	}
}