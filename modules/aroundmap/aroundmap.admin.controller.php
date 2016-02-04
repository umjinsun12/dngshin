<?php
    /**
     * @file	aroundmap.admin.controller.php
     * @class	aroundmapAdminController
     * @brief	Aroundmap Admin Controller
     * @author	ChoiHeeChul, KimJinHwan, ParkSunYoung
     **/
    class aroundmapAdminController extends aroundmap {
		
		/**
         * @brief 초기화
         **/
        function init() {
		}

		/**
		 * @brief 어드민 페이지에서 입력한 옵션 값들 세팅\n
		 * option values
		 * - naver_api_key
		 * - yahoo_api_key
		 * - sphinx info
		 **/
		function procAroundmapAdminSetApiKey() {
			// 어드민 페이지에서 입력한 옵션값들을 가져온다.
			$config->naver_api_key = Context::get('naver_api_key');
			$config->yahoo_api_key = Context::get('yahoo_api_key');
			$config->useSphinx = Context::get('usesphinx');
			$config->serverName = Context::get('servername');
			$config->serverPort = Context::get('serverport');
				
			// 가져온 옵션값들을 module config에 저장한다.
			$oModuleController = &getController('module');
			$oModuleController->insertModuleConfig('aroundmap',$config);
			
			// 기존에 적용된 모듈을 삭제한다.
			$apply_module = Context::get('apply_module');
			$output = executeQuery('aroundmap.deleteApplyModules');
			if(!$output->toBool()) return $output;
	
			// 어드민 페이지에서 입력한 새로운 모듈을 입력한다.
			$modules = explode(',',$apply_module);
			for($i=0,$c=count($modules);$i<$c;$i++) {
				if($modules[$i] != 0) {
					$args->module_srl = $modules[$i];
					$output = executeQuery('aroundmap.insertApplyModule',$args);
					if(!$output->toBool()) return $output;
				}
			}
			
			$this->setMessage('success_applied');
		}
    }
?>