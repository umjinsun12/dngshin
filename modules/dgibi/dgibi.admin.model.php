<?php

class dgibiAdminModel extends dgibi
{
	public function getDgibiAdminSimpleSetup($moduleSrl, $setupUrl)
	{
		if (!$moduleSrl)
		{
			return;
		}
		
		$oModuleModel = getModel('module');
		$moduleInfo = $oModuleModel->getModuleInfoByModuleSrl($moduleSrl);
		if (!$moduleInfo)
		{
			return;
		}
		
		Context::set('module_info', $moduleInfo);
		
		$config = $oModuleModel->getModulePartConfig('dgibi', $moduleSrl);		
		Context::set('config', $config);
		
		$oTemplate = TemplateHandler::getInstance();
		$html = $oTemplate->compile($this->module_path . 'tpl/', 'simple_setup');
		
		return $html;
	}
}
