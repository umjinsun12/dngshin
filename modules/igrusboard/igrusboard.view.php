<?php

class igrusboardView extends igrusboard
{
	public function init()
	{
		//설정 값 세팅
		$oModuleModel = getModel('module');
		$config = $oModuleModel->getModulePartConfig('igrusboard', $this->module_info->module_srl);
		Context::set('config', $config);
		
		//템플릿 경로를 스킨 경로로 세팅
		$templatePath = sprintf('%sskins/%s/', $this->module_path, $this->module_info->skin);
		$this->setTemplatePath($templatePath); //템플릿 경로를 세팅하는 메소드
		
		//템플릿 파일명을 세팅
		$templateFile = str_replace('dispIgrusboard', '', $this->act);
		$this->setTemplateFile($templateFile); //템플릿 파일을 세팅하는 메소드
	}
	
	public function dispIgrusboardWrite() // 글 쓰기화면을 보여준다 권한만 체크
	{
		if(!$this->grant->write_document)
		{
			return new Object(-1, 'msg_not_permitted');
		}
	}
	
	public function dispIgrusboardContent()
	{
		$documentSrl = Context::get('document_srl');
		
		if($documentSrl)
		{
			return $this->viewDocument();
		}
		else
		{
			return $this->viewList();
		}
	}
	
	private function viewDocument()
	{
		$document = Context::get('document_srl');
		$oDocumentModel = getModel('document');
		
		if(!$this->grant->view)
		{
			return new Object(-1,'msg_not_permitted');
		}
		
		$oDocument = $oDocumentModel->getDocument($documentSrl);
		
		if(!$oDocument->isExists())
		{
			return new Object(-1,'msg_not_founded');
		}
		
		if($this->grant->manager)
		{
			$oDocument->setGrant();
		}
		
		$oDocument->updateReadedCount();
		
		// 브라우저 제목에 글 제목 추가
		Cotext::addBrowserTitle($oDocument->getTitleText());
		
		// 템플릿 변수 세팅
		Context::set('oDocument', $oDocument);
		
		// 글보기, 목록보기 템플릿 파일을 직접지정
		$this->setTemplateFile('View');
	}
	
	private function viewList()
	{
		$page = Context::get('page');
		$oDocumentModel = getModel('document');
		
		if(!$this->grant->list)
		{
			return new Object(-1, 'msg_not_permitted');
		}
		
		$args = new stdClass();
		$args->module_srl = $this->module_info->module_srl;
		$args->page = $page;
		$args->list_count = 10;
		$args->page_count = 10;
		$args->sort_index = 'list_order';
		$args->order_type = 'asc';
		
		// 목록 가져오기
		$output = $oDocumentModel->getDocumentList($args);
		
		Context::set('document_list', $output->data);
		Context::set('total_count', $output->total_count);
		Context::set('total_page', $output->total_page);
		Context::set('page', $output->page);
		Context::set('page_navigation', $output->page_navigation);
		
		$this->setTemplateFile('List');
	}
}