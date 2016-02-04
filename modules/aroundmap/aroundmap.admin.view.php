<?php
    /**
     * @file   aroundmap.admin.view.php
     * @class  aroundmapAdminView
     * @author ChoiHeeChul, KimJinHwan, ParkSunYoung
     * @brief  aroundmap Admin View
     **/
    class aroundmapAdminView extends aroundmap {
	/**
         * @brief 초기화
         **/
        function init() {
	}

	/**
         * @brief aroundmap 모듈의 어드민 페이지
         **/
	function dispAroundmapAdminConfig() {
	    // module config를 가져온다.
            $oModuleModel = &getModel('module');
            $module_config = $oModuleModel->getModuleConfig('aroundmap');

	    // Naver api key 초기화 및 저장
            if(!$module_config->naver_api_key) {
                $module_config->naver_api_key = "";
            }
            Context::set('naver_api_key', $module_config->naver_api_key);
	    
	    // Yahoo api key 초기화 및 저장
	    if(!$module_config->yahoo_api_key) {
                $module_config->yahoo_api_key = "";
            }
            Context::set('yahoo_api_key', $module_config->yahoo_api_key);
	    
	    // 등록시킨 모듈을 가져와서 저장
	    $output = executeQueryArray('aroundmap.getApplyModules');
            $apply_module_list = array();
            for($i=0,$c=count($output->data);$i<$c;$i++) {
                $apply_module_list[] = $output->data[$i];
            }
            Context::set('apply_module', $apply_module_list);
	    
	    // Sphinx 검색 모듈의 서버 정보 초기화 및 저장
	    $serverName = $module_config->serverName;
            $serverPort = $module_config->serverPort;
            
            Context::set('serverName',$serverName);
            Context::set('serverPort',$serverPort);
            
	    // Sphinx 검색 모듈의 사용여부 초기화 및 저장
            $useSphinx = $module_config->useSphinx;
            if(!$useSphinx)  $useSphinx = 'false';
            Context::set('useSphinx' , $useSphinx);

	    // 템플릿 세팅
            $this->setTemplatePath($this->module_path.'tpl');
            $this->setTemplateFile('config.html');
	}
    }
?>