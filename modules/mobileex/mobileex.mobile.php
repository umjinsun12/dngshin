<?php

require_once(_XE_PATH_.'modules/mobileex/mobileex.view.php');

class mobileexMobile extends mobileexView {
	
	         var $target_mid = array();
            var $mskin = 'default';
      		function init()
      		{
                 
                  $template_path = sprintf("%sm.skins/%s/",$this->module_path, $this->module_info->mskin);
                  if(!is_dir($template_path)||!$this->module_info->mskin) {
                      $this->module_info->mskin = 'default';
                      $template_path = sprintf("%sm.skins/%s/",$this->module_path, $this->module_info->mskin);
                  }
                  $this->setTemplatePath($template_path);
                  
                  // xe core version check
                  if(preg_match('/^1.7/', __ZBXE_VERSION__)) $this->xe_ver = 7;
                  elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $this->xe_ver = 5;
                  elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $this->xe_ver = 4;

                  Context::set('xe_ver', $this->xe_ver);
                  
                  $oMemberModel = &getModel('member');
                  $this->member_config = $oMemberModel->getMemberConfig();
      

      		}
		
        /**
         * @brief mobileex integrantion search
         **/
         
        function MEIS() {
            $oFile = &getClass('file');
            $oModuleModel = &getModel('module');

            // 권한 체크
            if(!$this->grant->access) return new Object(-1,'msg_not_permitted');

            $config = $oModuleModel->getModuleConfig('mobileex');
            if(!$this->grant->access) return new Object(-1,'msg_not_permitted');
            
            // if(!$config->use_mobile || $config->use_mobile != 'Y') return new Object(-1,'msg_invalid_request'); 
            
            $target = $config->target;
            if(!$target) $target = 'include';
            $module_srl_list = explode(',',$config->target_module_srl);

            // 검색어 변수 설정
            $is_keyword = Context::get('is_keyword');

            // 페이지 변수 설정
            $page = (int)Context::get('page');
            if(!$page) $page = 1;

            // 검색탭에 따른 검색
            $where = Context::get('where');

            // integration search model객체 생성
            if($is_keyword) {
                $oIS = &getModel('mobileex');
                switch($where) {
                    case 'document' :
                            $search_target = Context::get('search_target');
                            if(!in_array($search_target, array('title','content','title_content','tag'))) $search_target = 'title';
                            Context::set('search_target', $search_target);

                            $output = $oIS->getDocuments($target, $module_srl_list, $search_target, $is_keyword, $page, 10);
                            Context::set('output', $output);
                            $this->setTemplateFile("document", $page);
                        break;
                    case 'comment' :
                            $output = $oIS->getComments($target, $module_srl_list, $is_keyword, $page, 10);
                            Context::set('output', $output);
                            $this->setTemplateFile("comment", $page);
                        break;
                    case 'trackback' :
                            $search_target = Context::get('search_target');
                            if(!in_array($search_target, array('title','url','blog_name','excerpt'))) $search_target = 'title';
                            Context::set('search_target', $search_target);

                            $output = $oIS->getTrackbacks($target, $module_srl_list, $search_target, $is_keyword, $page, 10);
                            Context::set('output', $output);
                            $this->setTemplateFile("trackback", $page);
                        break;
                    case 'multimedia' :
                            $output = $oIS->getImages($target, $module_srl_list, $is_keyword, $page,20);
                            Context::set('output', $output);
                            $this->setTemplateFile("multimedia", $page);
                        break;
                    case 'file' :
                            $output = $oIS->getFiles($target, $module_srl_list, $is_keyword, $page, 20);
                            Context::set('output', $output);
                            $this->setTemplateFile("file", $page);
                        break;
                    default :
                            $output['document'] = $oIS->getDocuments($target, $module_srl_list, 'title', $is_keyword, $page, 4);
                            $output['comment'] = $oIS->getComments($target, $module_srl_list, $is_keyword, $page, 4);
                            $output['trackback'] = $oIS->getTrackbacks($target, $module_srl_list, 'title', $is_keyword, $page, 4);
                            $output['multimedia'] = $oIS->getImages($target, $module_srl_list, $is_keyword, $page, 4);
                            $output['file'] = $oIS->getFiles($target, $module_srl_list, $is_keyword, $page, 4);
                            Context::set('search_result', $output);
                            $this->setTemplateFile("index", $page);
                        break;
                }
            } else {
                $this->setTemplateFile("no_keywords");
            }
        }


        /**
         * @brief 모바일EX용 맴버정보 스킨
         **/
        function dispMobileexMemberInfo() {
        	
            $oMemberModel = &getModel('member');
            $logged_info = Context::get('logged_info');
            
            // 비회원일 경우 정보 열람 중지
            if(!$logged_info->member_srl) return $this->stop('msg_not_permitted');

            $member_srl = Context::get('member_srl');
            if(!$member_srl && Context::get('is_logged')) {
                $member_srl = $logged_info->member_srl;
            } elseif(!$member_srl) {
                return $this->dispMemberSignUpForm();
            }
       
            $site_module_info = Context::get('site_module_info');
            // 1.5 이상
            if($this->xe_ver > 4) {
			    $columnList = array('member_srl', 'user_id', 'email_address', 'user_name', 'nick_name', 'homepage', 'blog', 'birthday', 'regdate', 'last_login', 'extra_vars');
            $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl, $site_module_info->site_srl, $columnList);
            }
            // 1.4
            else {
             $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl, $site_module_info->site_srl);
             unset($member_info->email_address);
            }
            unset($member_info->password);
            unset($member_info->email_id);
            unset($member_info->email_host);


           // 1.5 이상
           if($this->xe_ver > 4) {
       			if($logged_info->is_admin != 'Y' && ($member_info->member_srl != $logged_info->member_srl))
       			{
       				$start = strpos($member_info->email_address, '@')+1;
       				$replaceStr = str_repeat('*', (strlen($member_info->email_address) - $start));
       				$member_info->email_address = substr_replace($member_info->email_address, $replaceStr, $start);
       			}
           }
           
            if(!$member_info->member_srl) return $this->dispMemberSignUpForm();
			   
			   
			   // 1.5 이상
			   if($this->xe_ver > 4) {
			   	 Context::set('memberInfo', get_object_vars($member_info));
			      $extendForm = $oMemberModel->getCombineJoinForm($member_info);
               unset($extendForm->find_member_account);
               unset($extendForm->find_member_answer);
               Context::set('extend_form_list', $extendForm);

			     $this->_getDisplayedMemberInfo($member_info, $extendForm, $this->member_config);
			     $this->setTemplateFile('member_info');
			     
			    } else { 
              Context::set('member_info', $member_info);
              Context::set('extend_form_list', $oMemberModel->getCombineJoinForm($member_info));
              if ($member_info->member_srl == $logged_info->member_srl)
               Context::set('openids', $oMemberModel->getMemberOpenIDByMemberSrl($member_srl));
               $this->setTemplateFile('member_info_');
			   }


        }
        
		function _getDisplayedMemberInfo($memberInfo, $extendFormInfo, $memberConfig)
		{
			$displayDatas = array();
			foreach($memberConfig->signupForm as $no=>$formInfo)
			{
				if(!$formInfo->isUse)
				{
					continue;
				}

				if($formInfo->name == 'password' || $formInfo->name == 'find_account_question')
				{
					continue;
				}

				if($memberInfo->member_srl != $logged_info->member_srl && $formInfo->isPublic != 'Y')
				{
					continue;
				}
				
				$item = $formInfo;
				
				if($formInfo->isDefaultForm)
				{
					$item->title = Context::getLang($formInfo->name);
					$item->value = $memberInfo->{$formInfo->name};

					if($formInfo->name == 'profile_image' && $memberInfo->profile_image)
					{
						$target = $memberInfo->profile_image;
						$item->value = '<img src="'.$target->src.'" />';
					}
					elseif($formInfo->name == 'image_name' && $memberInfo->image_name)
					{
						$target = $memberInfo->image_name;
						$item->value = '<img src="'.$target->src.'" />';
					}
					elseif($formInfo->name == 'image_mark' && $memberInfo->image_mark)
					{
						$target = $memberInfo->image_mark;
						$item->value = '<img src="'.$target->src.'" />';
					}
					elseif($formInfo->name == 'birthday' && $memberInfo->birthday)
					{
						$item->value = zdate($item->value, 'Y-m-d');
					}
				}
				else
				{
					$item->title = $extendFormInfo[$formInfo->member_join_form_srl]->column_title;
					$orgValue = $extendFormInfo[$formInfo->member_join_form_srl]->value;
					if($formInfo->type=='tel' && is_array($orgValue))
					{
						$item->value = implode('-', $orgValue);
					}
					elseif($formInfo->type=='kr_zip' && is_array($orgValue))
					{
						$item->value = implode(' ', $orgValue);
					}
					elseif($formInfo->type=='checkbox' && is_array($orgValue))
					{
						$item->value = implode(", ",$orgValue);
					}
					elseif($formInfo->type=='date')
					{
						$item->value = zdate($orgValue, "Y-m-d");
					}
					else
					{
						$item->value = nl2br($orgValue);
					}
				}

				$displayDatas[] = $item;
			}

			Context::set('displayDatas', $displayDatas);
			return $displayDatas;
		}

        /**
         * @brief 패스워드 변경
         **/
        function dispMobileexModifyPassword() {

            $oMemberModel = &getModel('member');
            // 로그인 되어 있지 않을 경우 로그인 되어 있지 않다는 메세지 출력
            if(!$oMemberModel->isLogged()) return $this->stop('msg_not_logged');

            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;
            
            if($this->xe_ver > 4) {
            	 Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            	
                $memberConfig = $this->member_config;
    			     $columnList = array('member_srl', 'user_id');
                $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl, 0, $columnList);
                Context::set('member_info',$member_info);
    
        			if($memberConfig->identifier == 'user_id')
        			{
        				Context::set('identifier', 'user_id');
        				Context::set('formValue', $member_info->user_id);
        			}
        			else
        			{
        				Context::set('identifier', 'email_address');
        				Context::set('formValue', $member_info->email_address);
        			}
                // 템플릿 파일 지정
                $this->setTemplateFile('modify_password');
           }
           else {
            Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
            Context::addJsFile("./common/js/x.js", true, '', -100000);
            Context::addJsFile("./common/js/common.js", true, '', -100000);
            Context::addJsFile("./common/js/js_app.js", true, '', -100000);
            Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
            Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl);
            Context::set('member_info',$member_info);
            
            // 템플릿 파일 지정
            $this->setTemplateFile('modify_password_');
          }
        }

        /**
         * @brief 스크랩리스트
         **/
        function dispMobileexScrappedDocument() {
            $oMemberModel = &getModel('member');
            // 로그인체크
            if(!$oMemberModel->isLogged()) return $this->stop('msg_not_logged');
            
            // 버전별 js로드
            if($this->xe_ver > 4) {
               Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            }
            else {
               Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
               Context::addJsFile("./common/js/x.js", true, '', -100000);
               Context::addJsFile("./common/js/common.js", true, '', -100000);
               Context::addJsFile("./common/js/js_app.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            }
            
            $logged_info = Context::get('logged_info');
            $args->member_srl = $logged_info->member_srl;
            $args->page = (int)Context::get('page');
            $args->list_count = 5;
            $output = executeQuery('member.getScrapDocumentList', $args);
            Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('document_list', $output->data);
            Context::set('page_navigation', $output->page_navigation);
         
            $this->setTemplateFile('scrapped_list');
        }
        
        /**
         * @brief  저장함보기
         **/
        function dispMobileexSavedDocument() {
            $oMemberModel = &getModel('member');
            // 로그인 체크
            if(!$oMemberModel->isLogged()) return $this->stop('msg_not_logged');

            // 버전별 js로드
            if($this->xe_ver > 4) {
               Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            }
            else {
               Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
               Context::addJsFile("./common/js/x.js", true, '', -100000);
               Context::addJsFile("./common/js/common.js", true, '', -100000);
               Context::addJsFile("./common/js/js_app.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            }
            
            $logged_info = Context::get('logged_info');
            
            $args->page = (int)Context::get('page');
		       if($this->xe_ver > 4) {
		       	$args->member_srl = $logged_info->member_srl;
		       	$args->statusList = array('TEMP');
		       } else {
		       	$args->module_srl = $logged_info->member_srl;
		       }
            $args->list_count = 5;
            
            $oDocumentModel = &getModel('document');
            $output = $oDocumentModel->getDocumentList($args, true);
            Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('document_list', $output->data);
            Context::set('page_navigation', $output->page_navigation);

            $this->setTemplateFile('saved_list');
        }
        
        /**
         * @brief  작성글보기
         **/
        function dispMobileexOwnDocument() {
            $oMemberModel = &getModel('member');
            // 로그인 체크
            if(!$oMemberModel->isLogged()) return $this->stop('msg_not_logged');

            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;

            $module_srl = Context::get('module_srl');
            Context::set('module_srl',Context::get('selected_module_srl'));
            Context::set('search_target','member_srl');
            Context::set('search_keyword',$member_srl);


            $oDocumentAdminView = &getAdminView('document');
            $oDocumentAdminView->dispDocumentAdminList();

            Context::set('module_srl', $module_srl);
            $this->setTemplateFile('document_list');
        }
        
        /**
         * Display  쪽지함
         **/
        function dispMobileexMessages() {
            // 로그인이 되어 있지 않으면 오류 표시
            if(!Context::get('is_logged')) return $this->stop('msg_not_logged');
            $logged_info = Context::get('logged_info');

            // 버전별 js로드
            if($this->xe_ver > 4) {

               Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            }
            else {
               Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
               Context::addJsFile("./common/js/x.js", true, '', -100000);
               Context::addJsFile("./common/js/common.js", true, '', -100000);
               Context::addJsFile("./common/js/js_app.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            }

            // 변수 설정
            $message_srl = Context::get('message_srl');
            $message_type = Context::get('message_type');
            if(!in_array($message_type, array('R','S','T'))) {
                $message_type = 'R';
                Context::set('message_type', $message_type);
            }

            $oCommunicationModel = &getModel('communication');
            
            if($this->xe_ver > 4) {
                // message_srl이 있으면 내용 추출
                if($message_srl) {
    				     $columnList = array('message_srl', 'sender_srl', 'receiver_srl', 'message_type', 'title', 'content', 'readed', 'regdate');
                    $message = $oCommunicationModel->getSelectedMessage($message_srl, $columnList);
                    if($message->message_srl == $message_srl && ($message->receiver_srl == $logged_info->member_srl || $message->sender_srl == $logged_info->member_srl) ) {
    					   stripEmbedTagForAdmin($message->content, $message->sender_srl);
    					   Context::set('message', $message);
    				    }
                }
                // 목록 추출
    			    $columnList = array('message_srl', 'readed', 'title', 'member.member_srl', 'member.nick_name', 'message.regdate', 'readed_date');
                $output = $oCommunicationModel->getMessages($message_type, $columnList);
           } else {
                // message_srl이 있으면 내용 추출
                if($message_srl) {
                    $message = $oCommunicationModel->getSelectedMessage($message_srl);
                    if($message->message_srl == $message_srl && ($message->receiver_srl == $logged_info->member_srl || $message->sender_srl == $logged_info->member_srl) ) {
    					    stripEmbedTagForAdmin($message->content, $message->sender_srl);
    					    Context::set('message', $message);
    				     }
               }
                // 목록 추출
                $output = $oCommunicationModel->getMessages($message_type);
           }

            // set a template file
            Context::set('total_count', $output->total_count);
            Context::set('total_page', $output->total_page);
            Context::set('page', $output->page);
            Context::set('message_list', $output->data);
            Context::set('page_navigation', $output->page_navigation);
            
            if($this->xe_ver > 4) {
			      $oSecurity = new Security();
			      $oSecurity->encodeHTML('message_list..nick_name');
            }
            
            $this->setTemplateFile('messages');

        }
        
        /**
         * Display  쪽지함
         **/
        function dispMobileexMessageView() {
            // 로그인이 되어 있지 않으면 오류 표시
            if(!Context::get('is_logged')) return $this->stop('msg_not_logged');
            if(!Context::get('message_srl')) return $this->stop('msg_not_message_srl');

            // 변수 설정
            $logged_info = Context::get('logged_info');
            $message_srl = Context::get('message_srl');

            // 버전별 js로드
            if($this->xe_ver > 4) {

               Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            }
            else {
               Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
               Context::addJsFile("./common/js/x.js", true, '', -100000);
               Context::addJsFile("./common/js/common.js", true, '', -100000);
               Context::addJsFile("./common/js/js_app.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            }

            $oCommunicationModel = &getModel('communication');
            
            if($this->xe_ver > 4) {
                // message_srl이 있으면 내용 추출
    				     $columnList = array('message_srl', 'sender_srl', 'receiver_srl', 'message_type', 'title', 'content', 'readed', 'regdate');
                    $message = $oCommunicationModel->getSelectedMessage($message_srl, $columnList);
                    if($message->message_srl == $message_srl && ($message->receiver_srl == $logged_info->member_srl || $message->sender_srl == $logged_info->member_srl) ) {
    					   stripEmbedTagForAdmin($message->content, $message->sender_srl);
    					   
               // 전체 목록 추출
    			   $columnList = array('message_srl', 'readed', 'title', 'member.member_srl', 'member.nick_name', 'message.regdate', 'readed_date');
              $total_count = $oCommunicationModel->getMessages($message->message_type, $columnList);
    					   
    				      }
           } else {
                // message_srl이 있으면 내용 추출
                    $message = $oCommunicationModel->getSelectedMessage($message_srl);
                    if($message->message_srl == $message_srl && ($message->receiver_srl == $logged_info->member_srl || $message->sender_srl == $logged_info->member_srl) ) {
    					    stripEmbedTagForAdmin($message->content, $message->sender_srl);
    				     }
    				   // 전체 목록 추출
                $total_count = $oCommunicationModel->getMessages($message->message_type);
           }
           
           // 닉네임 가져오기
           if($message->sender_srl != $logged_info->member_srl) {
              $args->member_srl = $message->sender_srl;
              $sender_info = executeQuery('member.getMemberInfoByMemberSrl', $args);
              $message->sender_name = $sender_info->data->nick_name;
           }
           if($message->receiver_srl != $logged_info->member_srl) {
              $args->member_srl = $message->receiver_srl;
              $receiver_info = executeQuery('member.getMemberInfoByMemberSrl', $args);
              $message->receiver_name = $receiver_info->data->nick_name;
           }

            // set a template file
            
            Context::set('logged_info', $logged_info);
            Context::set('message', $message);
            Context::set('total_count', $total_count->total_count);
            
            $this->setTemplateFile('message_read');

        }
        
        /**
         * Display 쪽지보내기
         **/
        function dispMobileexSendMessage() {
            // 로그인 체크
            if(!Context::get('is_logged')) return $this->stop('msg_not_logged');
            $logged_info = Context::get('logged_info');

            // 버전별 js로드
            if($this->xe_ver > 4) {
               Context::addJsFile("./common/js/jquery.min.js", true, '', -10000011);
               Context::addJsFile("./common/js/xe.min.js", true, '', -100000);
            }
            else {
               Context::addJsFile("./common/js/jquery.js", true, '', -10000011);
               Context::addJsFile("./common/js/x.js", true, '', -100000);
               Context::addJsFile("./common/js/common.js", true, '', -100000);
               Context::addJsFile("./common/js/js_app.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_handler.js", true, '', -100000);
               Context::addJsFile("./common/js/xml_js_filter.js", true, '', -100000);
            }
            
            $oCommunicationModel = &getModel('communication');
            $oMemberModel = &getModel('member');
			   // 보내는사람 체크
            $receiver_srl = Context::get('receiver_srl');

		    	// check receiver and sender are same
            if($logged_info->member_srl == $receiver_srl) return $this->stop('msg_cannot_send_to_yourself');
            // get message_srl of the original message if it is a reply
            $message_srl = Context::get('message_srl');
            if($message_srl) {
                $source_message = $oCommunicationModel->getSelectedMessage($message_srl);
                if($source_message->message_srl == $message_srl && $source_message->sender_srl == $receiver_srl) {
                    $source_message->title = "[re] ".$source_message->title;
                    $source_message->content = "\r\n<br />\r\n<br /><div style=\"padding-left:5px; border-left:5px solid #DDDDDD;\">".trim($source_message->content)."</div>";
                    Context::set('source_message', $source_message);
                }
            }
            
            if($receiver_srl) {
             $receiver_info = $oMemberModel->getMemberInfoByMemberSrl($receiver_srl);
		        if(!$receiver_info) return $this->stop('msg_invalid_request');
             	Context::set('receiver_info', $receiver_info);
            }


            $this->setTemplateFile('send_message');
        }
        
        /**
         * @brief 코멘트 리스트 컴파일
         **/
         
    		function getMobileexCommentList() {
    			$document_srl = Context::get('document_srl');
    			$targetModule = Context::get('target_module'); 
    			$targetSkin = Context::get('skin_name'); 
    			$last_comment_srl = Context::get('last_comment_srl'); // 추가해야함
    			$view_count = Context::get('view_count'); // 추가해야함
	
    			if(!$last_comment_srl) $last_comment_srl = 0; //기본값
    			if(!$view_count) $view_count = 5; //기본값
    			
    			if(!$document_srl) return new Object(-1, "msg_invalid_request");
    			if(!$targetModule) return new Object(-1, "msg_invalid_request");
    			if(!$targetSkin) return new Object(-1, "msg_invalid_request");
    			
    			$oDocumentModel =& getModel('document');
			   $oDocument = $oDocumentModel->getDocument($document_srl);
			   if(!$oDocument->isExists()) return new Object(-1, "msg_invalid_request");
			   Context::set('oDocument', $oDocument);
    			
    			$oMobileexModel = &getModel('mobileex');
    			$comment_list = $oMobileexModel->getMobileexCommentList($document_srl, $last_comment_srl, $view_count);
    			if(!$comment_list) return new Object(-1, "msg_invalid_request");
			   Context::set('comment_list', $comment_list->get('list'));
			   Context::set('total', $comment_list->get('total'));
    			
    			$templatePath = sprintf('./modules/%s/m.skins/%s/compile', $targetModule, $targetSkin);
    			
    			$oTemplate = new TemplateHandler;
    			$html = $oTemplate->compile($templatePath, "comment_list.html");
    			$this->add("html", $html);
    		}

        /**
         * @brief 서브 코멘트 리스트 컴파일
         **/
         
    		function getMobileexSubCommentList() {
    			$document_srl = Context::get('document_srl');
    			$targetModule = Context::get('target_module'); 
    			$targetSkin = Context::get('skin_name'); 
    			$paginate = Context::get('paginate'); // 추가해야함
    			$view_count = Context::get('view_count'); // 추가해야함
    			$up_category = Context::get('up_category'); // 추가해야함

    			if(!$paginate) $paginate = 1; //기본값
    			if(!$view_count) $view_count = 20; //기본값
    			
    			if(!$up_category) return new Object(-1, "msg_invalid_request");
    			if(!$document_srl) return new Object(-1, "msg_invalid_request");
    			if(!$targetModule) return new Object(-1, "msg_invalid_request");
    			if(!$targetSkin) return new Object(-1, "msg_invalid_request");
    			
    			$oDocumentModel =& getModel('document');
			   $oDocument = $oDocumentModel->getDocument($document_srl);
			   if(!$oDocument->isExists()) return new Object(-1, "msg_invalid_request");
			   Context::set('oDocument', $oDocument);
           
    			$oMobileexModel = &getModel('mobileex');
    			$comment_list = $oMobileexModel->getMobileexSubCommentList($up_category, $paginate, $view_count);
    			if(!$comment_list) return new Object(-1, "msg_invalid_request");
			   Context::set('comment_list', $comment_list->get('list'));
			   Context::set('total', $comment_list->get('total'));
    			
    			$templatePath = sprintf('./modules/%s/m.skins/%s/compile', $targetModule, $targetSkin);
    			
    			$oTemplate = new TemplateHandler;
    			$html = $oTemplate->compile($templatePath, "comment_sub_list.html");
    			$this->add("html", $html);
    		}

}


?>
