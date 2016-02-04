<?php

class DgibiAdminController extends dgibi
{
	public function procDgibiAdminUpdateSimpleSetup()
	{
		$moduleSrl = Context::get('module_srl');
		
		$oModuleModel = getModel('module');
		$moduleInfo = $oModuleModel->getModuleInfoByModuleSrl($moduleSrl);
		
		if (!$moduleInfo || $moduleInfo->module != 'dgibi')
		{
			return new Object(-1, 'invalid_request');
		}
		
		$args = new stdClass();
		$args->title = Context::get('title');
		
		$oModuleController = getController('module');
		$oModuleController->insertModulePartConfig('dgibi', $moduleSrl, $args);
	}
}