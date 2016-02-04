<?php
    /**
     * @file   aroundmap.view.php
     * @class  aroundmap
     * @author ChoiHeeChul, KimJinHwan, ParkSunYoung
     * @brief  Model class of Aroundmap module
     **/

    class aroundmapModel extends aroundmap {
        /**
         * @brief 초기화 
         **/
        function init() {
	}
	/**
         * @brief 적용되어 있는 모듈인지 확인한다.
         * @param $module_srl 확인할 모듈의 srl
         * @return true/false
         **/	
	function isAppliedModules($module_srl) {
	    $args->module_srl = $module_srl;
            $output = executeQuery('aroundmap.getApplyModule', $args);
            if($output->data->count) return true;	
		return false;
	}
	/**
         * @brief naver api key 존재 유무 확인
         * @return true/false
         **/
	function isApiKeyExists() {
            $oModuleModel = &getModel('module');
            $module_config = $oModuleModel->getModuleConfig('aroundmap');

	    if($module_config->naver_api_key && strlen($module_config->naver_api_key)>0)
		return true;
	    
	    return false;
	}
	/**
         * @brief naver api key를 가져온다.
         * @return naver api key
         **/
	function getNaverApiKey() {
	    $oModuleModel = &getModel('module');
            $module_config = $oModuleModel->getModuleConfig('aroundmap');
	    
	    return $module_config->naver_api_key;
	}
    }
?>
