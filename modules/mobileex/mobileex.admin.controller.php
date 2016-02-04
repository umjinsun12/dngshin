<?php
    /**
     * The admin controller class of the mobileex module
     * @author COMSIN (comsinnet@naver.com)
     **/
     
    class mobileexAdminController extends mobileex {

        function init()
		   {
		   }
         
        /**
         * @brief 모바일EX 기본설정 입력
         **/
         
        function procMobileexAdminInsertConfig() {
        	
            // xe core version check
            $xe_ver = 5;
            if(preg_match('/^1.7/', __ZBXE_VERSION__)) $xe_ver = 7;
            elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $xe_ver = 5;
            elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $xe_ver = 4;
            // Get configurations (using module model object)
            $oModuleModel = &getModel('module');
            $config = $oModuleModel->getModuleConfig('mobileex');
            
            $args = Context::getRequestVars();

            if(!$args->allowed_filesize) $args->allowed_filesize = 2;
            if(!$args->allowed_attach_size) $args->allowed_attach_size = 2;
            if(!$args->allowed_filetypes) $args->allowed_filetypes = '*.*';
            if(!$args->addfile_thumb_size) $args->addfile_thumb_size = 800;
            if(!$args->addfile_min_size) $args->addfile_min_size = 120;
            if(!$args->img_resize_width) $args->img_resize_width = 0;
            if(!$args->img_resize_height) $args->img_resize_height = 0;
            
            $args->target_module_srl = Context::get('target_module_srl');
            if(!$args->target_module_srl) $args->target_module_srl = '';
            
            
            $oModuleController = &getController('module');
            $output = $oModuleController->insertModuleConfig('mobileex',$args);

            $msg_code = 'success_updated';
             $this->setMessage($msg_code);
             

            if($xe_ver > 4) {
			        $returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispMobileexAdminConfig');
		         	return $this->setRedirectUrl($returnUrl, $output);
            } else {
            if(!$output->toBool()) return $output;
            }
        }
        
        /**
         * @brief 모바일EX 모듈별 개별설정 입력
         **/
         
        function procMobileexAdminInsertEachConfig() {
            // xe core version check
            $xe_ver = 5;
            if(preg_match('/^1.7/', __ZBXE_VERSION__)) $xe_ver = 7;
            elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $xe_ver = 5;
            elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $xe_ver = 4;
            
            $args = Context::getRequestVars();
            if(!$args->allowed_filesize) $args->allowed_filesize = 2;
            if(!$args->allowed_attach_size) $args->allowed_attach_size = 2;
            if(!$args->allowed_filetypes) $args->allowed_filetypes = '*.*';
            if(!$args->addfile_thumb_size) $args->addfile_thumb_size = 800;
            if(!$args->addfile_min_size) $args->addfile_min_size = 120;
            if(!$args->img_resize_width) $args->img_resize_width = 0;
            if(!$args->img_resize_height) $args->img_resize_height = 0;
    
            $output = executeQuery('mobileex.deleteEachModuleConfig', $args);
            if(!$output->toBool()) return $output;
    
            $output = executeQuery('mobileex.insertEachModuleConfig', $args);
            if(!$output->toBool()) return $output;

            $msg_code = 'success_saved';
             $this->setMessage($msg_code);
             
            if($xe_ver > 4) {
			        $returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispMobileexAdminEachConfig', 'module_srl', $args->module_srl);
		         	return $this->setRedirectUrl($returnUrl, $output);
            } else {
            if(!$output->toBool()) return $output;
            }
        }
        
        /**
         * @brief 개별 관리 게시판 삭제
         **/
        function procMobileexAdminModuleDelete() {
        	
            $args->module_srl = Context::get('module_srl');
            // 개별설정 삭제
            $output = executeQuery('mobileex.deleteEachModuleConfig', $args);
            if(!$output->toBool()) return $output;
            // 모바일 스킨설정 제거
            $oMobileexAdminModel = &getAdminModel('mobileex');
            $output = $oMobileexAdminModel->deleteMobileexMobileSkinVars($args->module_srl);
             if(!$output->toBool()) return $output;
             
            $this->add('module','mobileex');
            $this->add('page',Context::get('page'));
            $this->setMessage('success_deleted');
        }
        
        /**
         * @brief 모바일스킨 업데이트
         **/
        function procMobileexAdminUpdateSkinInfo() {
            $xe_ver = 5;
            if(preg_match('/^1.7/', __ZBXE_VERSION__)) $xe_ver = 7;
            elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $xe_ver = 5;
            elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $xe_ver = 4;
            // Get information of the module_srl
            $module_srl = Context::get('module_srl');

            $oModuleModel = &getModel('module');
			   $columnList = array('module_srl', 'module', 'mskin');
            $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl, $columnList);
            if($module_info->module_srl) {
            	
            	$skin = $module_info->mskin;

             $oMobileexModel = &getModel('mobileex');
             $oMobileexAdminModel = &getAdminModel('mobileex');
              // Get skin information (to check extra_vars)
              $module_path = './modules/'.$module_info->module;

					$skin_info = $oModuleModel->loadSkinInfo($module_path, $skin, 'm.skins');
					$skin_vars = $oMobileexAdminModel->getMobileexMobileSkinVars($module_srl);

                // Check received variables (unset such variables as act, module_srl, page, mid, module)
                $obj = Context::getRequestVars();
                unset($obj->act);
                unset($obj->error_return_url);
                unset($obj->module_srl);
                unset($obj->page);
                unset($obj->mid);
                unset($obj->module);
                unset($obj->_mode);
                // Separately handle if a type of extra_vars is an image in the original skin_info
                if($skin_info->extra_vars) {
                    foreach($skin_info->extra_vars as $vars) {
                        if($vars->type!='image') continue;

                        $image_obj = $obj->{$vars->name};
                        // Get a variable to delete
                        $del_var = $obj->{"del_".$vars->name};
                        unset($obj->{"del_".$vars->name});
                        if($del_var == 'Y') {
                            FileHandler::removeFile($skin_vars[$vars->name]->value);
                            continue;
                        }
                        // Use the previous data if not uploaded
                        if(!$image_obj['tmp_name']) {
                            $obj->{$vars->name} = $skin_vars[$vars->name]->value;
                            continue;
                        }
                        // Ignore if the file is not successfully uploaded
                        if(!is_uploaded_file($image_obj['tmp_name'])) {
                            unset($obj->{$vars->name});
                            continue;
                        }
                        // Ignore if the file is not an image
                        if(!preg_match("/\.(jpg|jpeg|gif|png)$/i", $image_obj['name'])) {
                            unset($obj->{$vars->name});
                            continue;
                        }
                        // Upload the file to a path
                        $path = sprintf("./files/attach/images/%s/", $module_srl);
                        // Create a directory
                        if(!FileHandler::makeDir($path)) return false;

                        $filename = $path.$image_obj['name'];
                        // Move the file
                        if(!move_uploaded_file($image_obj['tmp_name'], $filename)) {
                            unset($obj->{$vars->name});
                            continue;
                        }
                        // Upload the file
                        FileHandler::removeFile($skin_vars[$vars->name]->value);
                        // Change a variable
                        unset($obj->{$vars->name});
                        $obj->{$vars->name} = $filename;
                    }
                }

           
           $output = $oMobileexAdminModel->insertMobileexMobileSkinVars($module_srl, $obj);

              if($xe_version == '5')  {
				    if(!$output->toBool())
				     {
					   return $output;
				     }
              }
          }
          if($xe_ver > 4) {
			    $this->setMessage('success_saved');
			    $this->setRedirectUrl(Context::get('error_return_url'));
			  } else {
            $this->setLayoutPath('./common/tpl');
            $this->setLayoutFile('default_layout.html');
            $this->setTemplatePath('./modules/module/tpl');
            $this->setMessage('success_saved');
            $this->setTemplateFile("top_refresh.html");
			  }
        }
    }
?>