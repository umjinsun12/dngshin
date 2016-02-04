<?php 
	class igrusboardAdminController extends igrusboard
	{
		public function procIgrusboardAdminUpdateSimpleSetup()
		{
			$moduleSrl = Context::get('module_srl');

			$oModuleModel = getModel('module');
			$moduleInfo = $oModuleModel->getModuleInfoByModuleSrl($moduleSrl);
			
			if(!$moduleInfo||$moduleInfo->module != 'igrusboard') // 파라미터로 들어온 module_srl 모듈이 우리모듈인지 체크
			{
				return new Object(-1, 'invalid_request');
			}
			
			$args = new stdClass();
			$args->title = Context::get('title');
			
			$oModuleController = getController('module');
			$oModuleController->insertModulePartConfig('igrusboard', $moduleSrl, $args);//개별 모듈에 대한 설정을 저장하는 메소드
		}
	}