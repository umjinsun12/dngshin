<?php
    /**
     * The admin model class of the mobileex module
     * @author COMSIN (comsinnet@naver.com)
     **/

    class mobileexAdminModel extends mobileex {

        /**
         * @brief Initialization
         **/
        function init() {
        }

 		/**
		 * Common:: skin setting page for the module (mobile)
		 * @param $module_srl sequence of module
		 * @return string The html code
		 */
		function getMobileexMobileSkinHTML($module_srl)
		{
			return $this->_getMobileexSkinHtml($module_srl);
		}
		
		/**
		 * mSkin setting page for the module
		 * @param $module_srl sequence of module
		 * @return string The HTML code
		 */
		 
		function _getMobileexSkinHTML($module_srl)
		{
			   $xe_version =  preg_match('/^1.5/', __ZBXE_VERSION__) ? '5' : '4';
            $oModuleModel = &getModel('module');
            $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
            if(!$module_info) return;

            $skin = $module_info->mskin;
            $module_path = './modules/'.$module_info->module;
        
        // Get XML information of the skin and skin sinformation set in DB
			$skin_info = $oModuleModel->loadSkinInfo($module_path, $skin, 'm.skins');
			$skin_vars = $this->getMobileexMobileSkinVars($module_srl);

            if(count($skin_info->extra_vars)) {
                foreach($skin_info->extra_vars as $key => $val) {
                    $group = $val->group;
                    $name = $val->name;
                    $type = $val->type;
                    if($skin_vars[$name]) $value = $skin_vars[$name]->value;
                    else $value = '';
                    if($type=="checkbox") $value = $value?unserialize($value):array();

                    $skin_info->extra_vars[$key]->value= $value;
                }
            }
             
            Context::set('xe_version', $xe_version);
            Context::set('module_info', $module_info);
            Context::set('mid', $module_info->mid);
            Context::set('skin_info', $skin_info);
            Context::set('skin_vars', $skin_vars);
			
			//Security
			$security = new Security(); 
			$security->encodeHTML('mid');
			$security->encodeHTML('module_info.browser_title');
			$security->encodeHTML('skin_info...');

        $oTemplate = &TemplateHandler::getInstance();
        return $oTemplate->compile($this->module_path.'tpl', 'mskin_config');
		}
		
        /**
         * Get mobile skin information of the module
         **/
        function getMobileexMobileSkinVars($module_srl) {
            $args->module_srl = $module_srl;
            $output = executeQueryArray('mobileex.getMobileSkinVars',$args);
            if(!$output->toBool() || !$output->data) return;

            $skin_vars = array();
            foreach($output->data as $val) $skin_vars[$val->name] = $val;
            return $skin_vars;
        }
		
		/**
		 * Insert mobile skin vars to a module
		 * @param $module_srl Sequence of module
		 * @param $obj Skin variables
		 */
		 
		function insertMobileexMobileSkinVars($module_srl, $obj)
		{
			return $this->_insertMobileexMobileSkinVars($module_srl, $obj);
		}
		
		
		/**
       * @brief Insert Mobile skin vars to a module
      **/
      
        function _insertMobileexMobileSkinVars($module_srl, $obj) {
			$oDB = DB::getInstance();
			$oDB->begin();

        $output = $this->_deleteMobileexMobileSkinVars($module_srl);
			if(!$output->toBool())
			{
				$oDB->rollback();
				return $output;
			}

            if(!$obj || !count($obj)) return new Object();

            $args->module_srl = $module_srl;
            foreach($obj as $key => $val) {
                if (is_object($val)) continue;
                if (is_array($val)) $val = serialize($val);

                $args->name = trim($key);
                $args->value = trim($val);
                if(!$args->name || !$args->value) continue;

           $output = executeQuery('mobileex.insertMobileSkinVars', $args);

				if(!$output->toBool())
				{
					return $output;
					$oDB->rollback();
				}
            }

			$oDB->commit;
			return new Object();
        }
        
		/**
		 * Remove Mobile skin vars ofa module
		 */
		function deleteMobileexMobileSkinVars($module_srl)
		{
			return $this->_deleteMobileexMobileSkinVars($module_srl);
		}
        
      /**
       * @brief Remove skin vars of a module
       **/
      function _deleteMobileexMobileSkinVars($module_srl) {
          $args->module_srl = $module_srl;
			$cache_key = 'object_mobileex_mobile_skin_vars:'.$module_srl;
			$query = 'mobileex.deleteMobileSkinVars';

          //remove from cache
          $oCacheHandler = &CacheHandler::getInstance('object');
          if($oCacheHandler->isSupport())
          {
              $oCacheHandler->delete($cache_key);
          }

          return executeQuery($query, $args);
      }
        
    }
?>
