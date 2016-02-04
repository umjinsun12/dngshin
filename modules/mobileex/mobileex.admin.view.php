<?php
    /**
     * The admin view class of the mobileex module
     * @author COMSIN (comsinnet@naver.com)
     **/

    class mobileexAdminView extends mobileex {

	/**
	 * Cofiguration of mobileex module
	 *
	 * @var object module config
	 */
        var $config = null;
        var $default_config = null;
        
        /**
         * Initialization
		 * @return void
         **/
         
        function init() {
            // Get configurations (using module model object)
            $oModuleModel = &getModel('module');
            $this->config = $oModuleModel->getModuleConfig('mobileex');
            if($this->config) {
            	Context::set('config',$this->config);
            }
            else {
            $default_config->file_config_use = 'N';
            $default_config->allowed_filesize = '2';
            $default_config->allowed_attach_size = '2';
            $default_config->allowed_filetypes = '*.*';
            $default_config->addfile_use = 'Y';
            $default_config->addfile_thumb_use = 'Y';
            $default_config->addfile_thumb_size = '800';
            $default_config->addfile_view_type = 'F';
            $default_config->addfile_auto = 'N';
            $default_config->pcimg_view = 'Y';
            $default_config->addfile_min_size = '120';
            $default_config->addfile_btn = 'Y';
            $default_config->img_resize_width = '0';
            $default_config->img_resize_height = '0';
            $default_config->pcmode_addfile_view = 'Y';
            Context::set('config',$default_config);
           }
            
            $this->setTemplatePath($this->module_path."/tpl/");
            
            // xe core version check
            $xe_ver = 5;
            if(preg_match('/^1.7/', __ZBXE_VERSION__)) $xe_ver = 7;
            elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $xe_ver = 5;
            elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $xe_ver = 4;
            
            Context::set('xe_ver',$xe_ver);
        }

        /**
         * 모바일EX 기본설정
         **/
         
        function dispMobileexAdminConfig() {
            $oModuleModel = &getModel('module');
            
		    	$mskin_list = $oModuleModel->getSkins($this->module_path, "m.skins");
			   Context::set('mskin_list', $mskin_list);
            // Get a list of module categories
            $module_categories = $oModuleModel->getModuleCategories();
            // Generated mid Wanted list
            $obj->site_srl = 0;
            $mid_list = $oModuleModel->getMidList($obj);
            Context::set('mid_list',$module_categories); //maybe not used
             
			   $security = new Security();
			   $security->encodeHTML('mskin_list..title');
			   
            // sample code
            Context::set('sample_code', htmlspecialchars('<form action="{getUrl()}" method="get"><input type="hidden" name="vid" value="{$vid}" /><input type="hidden" name="mid" value="{$mid}" /><input type="hidden" name="act" value="MEIS" /><input type="text" name="is_keyword" class="inputTypeText" value="{$is_keyword}" /><span class="button"><input type="submit" value="{$lang->cmd_search}" /></span></form>') );

            $this->setTemplateFile("index");
        }
       
        /**
         *모바일EX 설정 모듈 리스트
         **/
         
        function dispMobileexAdminModuleList() {
            // 등록된 board 모듈을 불러와 세팅
            $args->sort_index = "module_srl";
            $args->page = Context::get('page');
            $args->list_count = 20;
            $args->page_count = 10;
            $args->s_module_category_srl = Context::get('module_category_srl');

			   $s_mid = Context::get('s_mid');
			   if($s_mid) $args->s_mid = $s_mid;

			   $s_browser_title = Context::get('s_browser_title');
			   if($s_browser_title) $args->s_browser_title = $s_browser_title;

            $output = executeQueryArray('board.getBoardList', $args);
            ModuleModel::syncModuleToSite($output->data);

            // module model 객체 생성 
            $oModuleModel = &getModel('module');
            // 모듈 카테고리 목록을 구함
            $module_category = $oModuleModel->getModuleCategories();
            Context::set('module_category', $module_category);			
            
            $oMobileexModel = &getModel('mobileex');
            $oMobileexAdminModel = &getAdminModel('mobileex');
            $board_list = $output->data;
            $new_board_list = array();
            foreach($board_list as $no => $val) {
                $exist_each_config =  $oMobileexModel->getEachModuleInfo($val->module_srl);
                if($exist_each_config) $val->exist_each_config = true;
                else $val->exist_each_config = false;
                $exist_mskin_config =  $oMobileexAdminModel->getMobileexMobileSkinVars($val->module_srl);
                if(count($exist_mskin_config))  $val->exist_mskin_config = true;
                else $val->exist_mskin_config = false;
                $new_board_list[$no] = $val;
            }

            // 템플릿에 쓰기 위해서 context::set
            Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('board_list', $new_board_list);
            Context::set('page_navigation', $output->page_navigation);
			
			$security = new Security();
			$security->encodeHTML('board_list..browser_title','board_list..mid');

            // 템플릿 파일 지정
            $this->setTemplateFile('module_list');
        }

        /**
         * 모듈별 모바일EX 설정 페이지
         **/
         
        function dispMobileexAdminEachConfig() {
        	
            // module_srl이 있으면 미리 체크하여 존재하는 모듈이면 module_info 세팅
            $module_srl = Context::get('module_srl');

            $oModuleModel = &getModel('module');
            // module_srl이 넘어오면 해당 모듈의 정보를 미리 구해 놓음
            if($module_srl) {
                $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
                if(!$module_info) {
                    Context::set('module_srl','');
                    $this->act = 'list';
                } else {
                    ModuleModel::syncModuleToSite($module_info);
                    $this->module_info = $module_info;
                    Context::set('module_info',$module_info);
                }
            }
            
            if($module_info && $module_info->module != 'board') return $this->stop("msg_invalid_request");
            
            $oMobileexModel = &getModel('mobileex');
            
            $each_config = $oMobileexModel->getEachModuleInfo($module_srl);

            if($each_config) {
             	Context::set('each_config',$each_config);
            }
            else {
            	Context::set('each_config',$this->config);
            }

            $this->setTemplateFile("each_config");

        }

        /**
         * @brief 게시판 삭제 화면 출력
         **/
        function dispMobileexAdminModuleDelete() {
            if(!Context::get('module_srl')) return $this->dispBoardAdminContent();
            if(!in_array($this->module_info->module, array('admin', 'board','blog','guestbook'))) {
                return $this->alertMessage('msg_invalid_request');
            }

            // module_srl이 있으면 미리 체크하여 존재하는 모듈이면 module_info 세팅
            $module_srl = Context::get('module_srl');

            $oModuleModel = &getModel('module');
            // module_srl이 넘어오면 해당 모듈의 정보를 미리 구해 놓음
            if($module_srl) {
                $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
                if(!$module_info) {
                    Context::set('module_srl','');
                    $this->act = 'list';
                } else {
                    ModuleModel::syncModuleToSite($module_info);
                    $this->module_info = $module_info;
                    Context::set('module_info',$module_info);
                }
            }

            $oDocumentModel = &getModel('document');

            Context::set('module_info',$module_info);
			
			   $security = new Security();
			   $security->encodeHTML('module_info..mid','module_info..module');			

            // 템플릿 파일 지정
            $this->setTemplateFile('module_delete');
        }
        
        /**
         * 모바일 스킨 정보 및 확장설정변수 설정 페이지 컴파일
         **/
        function dispMobileexAdminMobileSkinInfo() {
             // get the grant infotmation from admin module 
            $module_srl = Context::get('module_srl');
            $oMobileexAdminModel = &getAdminModel('mobileex');
            $skin_content = $oMobileexAdminModel->getMobileexMobileSkinHTML($module_srl);
            Context::set('skin_content', $skin_content);

            $this->setTemplateFile('mskin_info');
        }


    }
?>
