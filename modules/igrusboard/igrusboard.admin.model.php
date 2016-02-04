<?php 

class igrusboardAdminModel extends igrusboard
{
	//simplesetup 화면을 위한 html 마크업을 반환하는 메소드
	public function getIgrusboardAdminSimpleSetup($moduleSrl, $setupUrl)//setupurl == 자체 관리자 화면 url
	{
		if(!$moduleSrl)// 해당 모듈의 번호
		{
			return;
		}
		
		$oModuleModel = getModel('module');
		$moduleInfo = $oModuleModel->getModuleInfoByModuleSrl($moduleSrl);// 모듈 번호에 해당하는 모듈의 정보를 반환하는 메소드
		if(!$moduleInfo)
		{
			return;
		}
		
		Context::set('module_info', $moduleInfo);//템플릿에서 사용할 변수를 세팅 할 수 있는 메소드
		
		$config = $oModuleModel->getModulePartConfig('igrusboard', $moduleSrl);//모듈 이름과 모듈 번호로 해당 모듈의 설정 정보를 반환하는 메소드
		Context::set('config', $config);
		
		$oTemplate = TemplateHandler::getInstance();//템플릿 핸들러를 얻기 위한 메소드
		$html = $oTemplate->compile($this->module_path.'tpl/','simple_setup');// 특정 템플릿 파일을 컴파일한 결과 반환
		
		return $html;
	}
}