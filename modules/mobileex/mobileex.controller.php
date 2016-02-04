<?php
    /**
     * @class  mobileexController
     * @brief  mobileex모듈의 controller class
     **/

    class mobileexController extends mobileex {

        /**
         * @brief 초기화
         **/
        function init() {
        	
                  // xe core version check
                  if(preg_match('/^1.7/', __ZBXE_VERSION__)) $this->xe_ver = 7;
                  elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $this->xe_ver = 5;
                  elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $this->xe_ver = 4;

        }

        /**
         * @brief file upload
         **/
        function mobileFileUpload() {
         $oFileModel = &getModel('file');
         $oFileController = &getController('file');
         $oMobileexModel = &getModel('mobileex');
         $mobileex_config = $oMobileexModel->getMobileexConfig($this->module_srl);

 			 // after upload set template
 			 $this->setTemplatePath($this->module_path.'tpl');
 			 $this->setTemplateFile("after_upload");

          // file lang load
          Context::loadLang('./modules/file/lang');

         $module_srl = $this->module_srl;
         $file_info = Context::get('Filedata');
         $upload_type = Context::get('upload_type');
         $upload_target_srl = intval(Context::get('uploadTargetSrl'));
         if(!$upload_target_srl) $upload_target_srl = intval(Context::get('upload_target_srl'));

         // mobile document check 
         if($upload_target_srl && Context::get('document_srl')) {
             $mobile_check = $oMobileexModel->getMobileDocument($upload_target_srl);
             if(!$mobile_check->data) {
             	Context::set('msg', Context::getLang('msg_not_mobile_document'));
             	return;
             }
         }
         
         if(!$upload_target_srl) $upload_target_srl = getNextSequence();
			
			// file exist check
			if(!$file_info['tmp_name'] || !is_uploaded_file($file_info['tmp_name']))
			{
				Context::set('msg', Context::getLang('msg_no_file'));
				return;
			}
        
        // grant check
        $allow_fileupload = $oMobileexModel->getUploadGrant($module_srl,$upload_type);
			if(!$allow_fileupload)
			{
				Context::set('msg', Context::getLang('msg_not_fileupload_grant'));
				return;
			}

			// file ext check
			$allow_filetype = $oMobileexModel->getAllowedFileType($file_info,$module_srl);
			if(!$allow_filetype->allowed) {
				$msg = strtoupper(str_replace('.', '', $allow_filetype->file_ext))." ".Context::getLang('msg_not_allowed_filetype');
            Context::set('msg', $msg);
				return;
			}
			
        // get file type
        $imglist = "GIF|PNG|JPG|JPEG";
        if( !eregi(strtoupper(str_replace('.', '', $allow_filetype->file_ext)),$imglist) ) $is_img = 'N';
        else $is_img = 'Y';
			
    		$img_resize_width = (int)$mobileex_config->img_resize_width;
          $img_resize_height = (int)$mobileex_config->img_resize_height;
          
         if($img_resize_width > 0 || $img_resize_height > 0) $img_resize_use = true;
         else $img_resize_use = false;
    			
          if($is_img == 'N' || ($is_img == 'Y' && !$img_resize_use)) {
         			// file size check
         			$allow_filesize = $oMobileexModel->getAllowedFileSize(filesize($file_info['tmp_name']),$module_srl,$upload_target_srl,$upload_type);
         			if(!$allow_filesize->allowed_filesize || !$allow_filesize->allowed_attach_size) {
                    if(!$allow_filesize->allowed_filesize) Context::set('msg', Context::getLang('msg_not_allowed_filesize'));
         				else if(!$allow_filesize->allowed_attach_size) Context::set('msg', Context::getLang('msg_not_allowed_attach_size'));
         				return;
         			}
          }
          
         //insert file
			// A workaround for Firefox upload bug
			if (preg_match('/^=\?UTF-8\?B\?(.+)\?=$/i', $file_info['name'], $match)) {
				$file_info['name'] = base64_decode(strtr($match[1], ':', '/'));
			}

             // upload path
            if(preg_match("/\.(jpe?g|gif|png|wm[va]|mpe?g|avi|swf|flv|mp[1-4]|as[fx]|wav|midi?|moo?v|qt|r[am]{1,2}|m4v)$/i", $file_info['name'])) {
                // direct 파일에 해킹을 의심할 수 있는 확장자가 포함되어 있으면 바로 삭제함
                $file_info['name'] = preg_replace('/\.(php|phtm|html?|cgi|pl|exe|jsp|asp|inc)/i', '$0-x',$file_info['name']);
                $file_info['name'] = str_replace(array('<','>'),array('%3C','%3E'),$file_info['name']);

                $path = sprintf("./files/attach/images/%s/%s", $module_srl,getNumberingPath($upload_target_srl,3));

				// special character to '_'
				// change to md5 file name. because window php bug. window php is not recognize unicode character file name - by cherryfilter
				$ext = substr(strrchr($file_info['name'],'.'),1);
				//$_filename = preg_replace('/[#$&*?+%"\']/', '_', $file_info['name']);
				$_filename = md5(crypt(rand(1000000,900000), rand(0,100))).'.'.$ext;
                $filename  = $path.$_filename;
                $idx = 1;
                while(file_exists($filename)) {
                    $filename = $path.preg_replace('/\.([a-z0-9]+)$/i','_'.$idx.'.$1',$_filename);
                    $idx++;
                }
                $direct_download = 'Y';
            } else {
                $path = sprintf("./files/attach/binaries/%s/%s", $module_srl, getNumberingPath($upload_target_srl,3));
                $filename = $path.md5(crypt(rand(1000000,900000), rand(0,100)));
                $direct_download = 'N';
            }

            // make dir
            if(!FileHandler::makeDir($path)) {
				  Context::set('msg', Context::getLang('msg_not_permitted_create'));
				  return;
			   }

            // move file
            if(!@move_uploaded_file($file_info['tmp_name'], $filename)) {
            	      $re_name = md5(crypt(rand(1000000,900000).$file_info['name']));
                    $filename = $path.$re_name.'.'.$ext;
                    if(!@move_uploaded_file($file_info['tmp_name'], $filename)) {
				          Context::set('msg', Context::getLang('msg_file_upload_error'));
				          return;
			          }
            }
            // image resize
            if($is_img == 'Y' && $img_resize_use) {
   
                 $resizeimg = $oMobileexModel->getImgResizeValue($filename,$img_resize_width,$img_resize_height);
    
                 if($resizeimg->width || $resizeimg->height ) {
                 
               	$resize_target_width = $resizeimg->width;
               	$resize_target_height = $resizeimg->height;
   
                 $img_ext = '.'.$ext;
                 $resize_path = str_replace($img_ext,"",$filename); 
                 $resize_file = $resize_path.'.'.$ext;
                 $resize_url  = Context::getRequestUri().$resize_file;
                          
                 // resize
                 $source_file = $filename;
                 $resize_img = FileHandler::createImageFile($source_file, $resize_file, $resize_target_width, $resize_target_height, $ext, 'ratio');
                 
          			$allow_filesize = $oMobileexModel->getAllowedFileSize(@filesize($filename),$module_srl,$upload_target_srl,$upload_type);
             			if(!$allow_filesize->allowed_filesize || !$allow_filesize->allowed_attach_size) {
                        FileHandler::removeFile($filename);
                        if(!$allow_filesize->allowed_filesize) Context::set('msg', Context::getLang('msg_not_allowed_filesize'));
             				else if(!$allow_filesize->allowed_attach_size) Context::set('msg', Context::getLang('msg_not_allowed_attach_size'));
             				return;
             			}
                 }
                 
            }

            // get member info
            $oMemberModel = &getModel('member');
            $member_srl = $oMemberModel->getLoggedMemberSrl();

            // file info
            $args->file_srl = getNextSequence();
            $args->upload_target_srl = $upload_target_srl;
            $args->module_srl = $module_srl;
            $args->direct_download = $direct_download;
            $args->source_filename = $file_info['name'];
            $args->uploaded_filename = $filename;
            $args->download_count = $download_count;
            $args->file_size = @filesize($filename);
            $args->comment = NULL;
            $args->member_srl = $member_srl;
            $args->sid = md5(rand(rand(1111111,4444444),rand(4444445,9999999)));

            $output = executeQuery('file.insertFile', $args);
            if(!$output->toBool()) {
				  Context::set('msg', Context::getLang('msg_file_upload_error'));
				  return;
			   }
            $_SESSION['__XE_UPLOADING_FILES_INFO__'][$args->file_srl] = true;
            
            $output->add('file_srl', $args->file_srl);
            $output->add('file_size', $args->file_size);
            $output->add('sid', $args->sid);
            $output->add('direct_download', $args->direct_download);
            $output->add('source_filename', $args->source_filename);
            $output->add('upload_target_srl', $upload_target_srl);
            $output->add('uploaded_filename', $args->uploaded_filename);
        
       
        // add file insert 
        if($mobileex_config->addfile_auto == 'Y' && $is_img == 'Y')  {
        	   $args->module_srl = $module_srl;
           $args->upload_target_srl = $output->get('upload_target_srl');
           $args->file_srl = $output->get('file_srl');
          	executeQuery('mobileex.insertMobileAddFile', $args);
        }
        

        if($is_img != 'Y') $img_href = './modules/editor/tpl/images/files.gif';
        else {
        	$img_href = $output->get('uploaded_filename');
        	// create thumb
   		$preview_thumb = $oMobileexModel->getFileThumbnail($output->get('file_srl'),$width = 100, $height = 100, $thumbnail_type = 'crop');
   		if(!$preview_thumb) $preview_thumb = './modules/editor/tpl/images/files.gif';
   		$img_href = $preview_thumb;

           if($mobileex_config->addfile_thumb_use == 'Y'){
              $addfile_max_size =(int)$mobileex_config->addfile_max_size;
          		// max_thumb
          		$max_thumb = $oMobileexModel->getFileThumbnail($value->file_srl,$width = $addfile_max_size, $height = '', $thumbnail_type = '');
          		if(!$max_thumb) $max_thumb = './modules/editor/tpl/images/files.gif';
      	   }
        }
        // get file size convert for kb
        $file_size = (int)$output->get('file_size')/1024;
        $file_size = round($file_size,1);

        // set uploaded file info
        Context::set('module_srl',$module_srl); 
        Context::set('file_srl',$output->get('file_srl')); 
        Context::set('upload_target_srl',$output->get('upload_target_srl')); // if temp document
        Context::set('source_filename',$output->get('source_filename')); 
        Context::set('file_size',$file_size); 
        Context::set('is_img',$is_img);
        Context::set('img_href',$img_href);
        }
        
        function mobileFileDelete() {

            $oFileController = &getController('file');
            $oFileModel = &getModel('file');

			   // after delete set template
			   $this->setTemplatePath($this->module_path.'tpl');
			   $this->setTemplateFile("after_delete");

            $file_srl = Context::get('file_srl');
            $upload_target_srl = Context::get('upload_target_srl');
            
            if(!$this->module_srl || !$file_srl) {
            	 if(!$this->module_srl) Context::set('msg', Context::getLang('msg_no_file'));
            	 else Context::set('msg', Context::getLang('msg_file_upload_error'));
            	 return;
            }

            $logged_info = Context::get('logged_info');

            $args->file_srl = $file_srl;
            $output = executeQuery('file.getFile', $args);
            if(!$output->toBool() || !$output->data) {
            	Context::set('msg', Context::getLang('msg_not_file_exist')); 
            	return;
            }
            
            $file_info = $output->data;
            
            $file_grant = $oFileModel->getFileGrant($file_info, $logged_info); 
            if(!$file_grant->is_deletable) {
            	Context::set('msg', Context::getLang('msg_not_permitted_delete')); 
              return;
            }
             
            // delete file
            if($file_info && $file_grant->is_deletable) $output = $oFileController->deleteFile($file_srl);
            $output = $oFileController->deleteFile($file_srl);
            Context::set('file_srl',$file_srl); 
      
        }

        /**
         * @brief add file for document
         **/
         
        function mobileInsertAddFile() {

   			// set template
   			$this->setTemplatePath($this->module_path.'tpl');
   			$this->setTemplateFile("insert_add_file");
         
           $module_srl = $this->module_srl;
   			$add_file_srl = Context::get('add_file_srl');
   			$upload_target_srl = intval(Context::get('uploadTargetSrl'));
           if(!$upload_target_srl) $upload_target_srl = intval(Context::get('upload_target_srl'));
           
           if(!$upload_target_srl || !$upload_target_srl) {
           	     Context::set('msg', Context::getLang('msg_invalid_document'));
           	     return;
           }
           
           $args->module_srl = $module_srl;
           $args->upload_target_srl = $upload_target_srl;
           $args->file_srl = $add_file_srl;
           
           $output = executeQuery('file.getFile', $args);
           if(!$output->toBool() || !$output->data) {
            	Context::set('msg', Context::getLang('msg_not_file_exist')); 
            	return;
           }
           
           executeQuery('mobileex.insertMobileAddFile', $args);
           Context::set('file_srl',$args->file_srl); 
        }

        /**
         * @brief delete file for document
         **/
         
        function mobileDeleteAddFile() {
        	
  			   // set template
   			$this->setTemplatePath($this->module_path.'tpl');
   			$this->setTemplateFile("delete_add_file");
         
           $module_srl = $this->module_srl;
   			$add_file_srl = Context::get('add_file_srl');
   			$upload_target_srl = intval(Context::get('uploadTargetSrl'));
           if(!$upload_target_srl) $upload_target_srl = intval(Context::get('upload_target_srl'));
           
           if(!$upload_target_srl || !$upload_target_srl) {
           	     Context::set('msg', Context::getLang('msg_invalid_document')); 
           	     return;
           }
           
           $args->module_srl = $module_srl;
           $args->upload_target_srl = $upload_target_srl;
           $args->file_srl = $add_file_srl;
           
           $output = executeQuery('file.getFile', $args);
           if(!$output->toBool() || !$output->data) {
            	Context::set('msg', Context::getLang('msg_not_file_exist'));
            	return;
           }
           
           executeQuery('mobileex.deleteMobileAddFile', $args);
           Context::set('file_srl',$args->file_srl); 
        }
        
        /**
         * @brief 본문 첨부이미지 설정변경
         **/
         
        function mobileUpdateAddFile() {
           // 파일정보 체크
            if(!Context::get('file_srl') || (!Context::get('rotate') && !Context::get('align'))) return new Object(-1, 'msg_not_logged');
            $args->file_srl = Context::get('file_srl');
            $args->rotate = Context::get('rotate');
            $args->align = Context::get('align');
            
            // 파일있나 체크
            $output = executeQuery('file.getFile', $args);
            if(!$output->toBool() || !$output->data) return new Object(-1, 'msg_not_logged');
            
            // 정보 업데이트
            $output = executeQuery('mobileex.updateMobileAddFile', $args);
            if(!$output->toBool()) return $output;

        }

        /**
         * @brief delete addfile
         **/
         
        function triggerMobileexDeleteAddFile(&$obj) {

            $module_srl = $obj->module_srl;
            $member_srl = $obj->member_srl;
            
            $oMobileexModel = &getModel('mobileex');
         
            $del_file_srl = $oMobileexModel->getMobileAddfile($obj->file_srl);
            if(!$del_file_srl->toBool()) return;
            
            $args->file_srl = $obj->file_srl;
            executeQuery('mobileex.deleteMobileAddFile', $args);

            return new Object();
        }
        
        
        /**
         * @brief mobile document insert
         **/
        function triggerMobileexInsertDocument(&$obj) {
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;

        	    $args = $obj;
        	    
        	    if($is_mobile) { 
        	    	$args->is_mobile = 	'Y';
              executeQuery('mobileex.insertMobileDocument', $args);
        	    }
        	    else return;
        	    
            return new Object();
        }
        
        /**
         * @brief mobile document modify
         **/
        function triggerMobileexUpdateDocument(&$obj) {
        	    $oMobileexModel = &getModel('mobileex');
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;
             
            $args = $obj;
            
            // mobile check
            $output = $oMobileexModel->getMobileDocument($args->document_srl);
            if(!$output->toBool()||!$output->data) return;
             
        	    if($is_mobile) {
        	    	$args->is_mobile = 	'Y';
        	    	// update mobile document
              executeQuery('mobileex.updateMobileDocument', $args);
        	    }
        	    else {
        	    	// delete mobile document
        	    	executeQuery('mobileex.deleteMobileDocument', $args);

        	    	// delete addfile fot document
              $output = $oMobileexModel->getMobileAddfiles($args->document_srl);
              if($output->data)  {
            	 $args->upload_target_srl = $args->document_srl;
        	       executeQuery('mobileex.deleteMobileAddFiles', $args);
        	      }
        	    }
            return new Object();
        }
        
        /**
         * @brief mobile document delete
         **/
        function triggerMobileexDeleteDocument(&$trigger_obj) {
        	    $oMobileexModel = &getModel('mobileex');
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;
             
             $args = $trigger_obj;
            
            
            $output = $oMobileexModel->getMobileDocument($args->document_srl);
            if($output->data) {
        	     executeQuery('mobileex.deleteMobileDocument', $args);
        	    }
        	    
            $output = $oMobileexModel->getMobileAddfiles($args->document_srl);
            if($output->data) {
            	$args->upload_target_srl = $args->document_srl;
        	     executeQuery('mobileex.deleteMobileAddFiles', $args);
        	    }
        	    
            return new Object();
        }
        
        /**
         * @brief delete mobile document and add file  for module
         **/
         
        function triggerMobileexDeleteModule(&$trigger_obj) {
        	    $oMobileexModel = &getModel('mobileex');
        	    $oMobileexAdminModel = &getAdminModel('mobileex');
        	    
             $args->module_srl = $trigger_obj->module_srl;

            
            // delete mobile document
            $output = $oMobileexModel->getMobileDocuments($args->module_srl);
            if($output->data) {
        	     executeQuery('mobileex.deleteMobileDocuments', $args);
        	    }
        	    
            // delete add file comment add - 2013.01.20
            $output = $oMobileexModel->getMobileComments($args->module_srl);
            if($output->data) {
        	     executeQuery('mobileex.deleteMobileComments', $args);
        	    }
        	    
            // delete add file document
            $output = $oMobileexModel->getMobileModuleAddfiles($args->module_srl);
            if($output->data) {
        	     executeQuery('mobileex.deleteMobileModuleAddfiles', $args);
        	    }
        	    
        	    // delete each module config
             $output = $oMobileexModel->getEachModuleInfo($args->module_srl);
              if($output) {
        	      executeQuery('mobileex.deleteEachModuleConfig', $args);
        	     }
 
             // delete mobile skin config
             $output = $oMobileexAdminModel->getMobileexMobileSkinVars($args->module_srl);
              if($output) {
        	      $oMobileexAdminModel->deleteMobileexMobileSkinVars($args->module_srl);
        	     }

            return new Object();
        }
        
        /**
         * @brief mobile comment insert
         **/
        function triggerMobileexInsertComment(&$obj) {
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;

        	    $args = $obj;
        	    
        	    if($is_mobile) { 
        	    	$args->is_mobile = 	'Y';
              executeQuery('mobileex.insertMobileComment', $args);
        	    }
        	    else return;
        	    
            return new Object();
        }
        
        /**
         * @brief mobile comment modify
         **/
        function triggerMobileexUpdateComment(&$obj) {
        	    $oMobileexModel = &getModel('mobileex');
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;
             
            $args = $obj;
            
            // mobile check
            $output = $oMobileexModel->getMobileComment($args->comment_srl);
            if(!$output->toBool()||!$output->data) {
            	if($is_mobile) {
        	       	$args->is_mobile = 	'Y';
                 executeQuery('mobileex.insertMobileComment', $args);
            	} 
            	else {
            		return;
            	}
            } 
            else { 
         	    if($is_mobile) {
         	    	$args->is_mobile = 	'Y';
         	    	// update mobile document
                  executeQuery('mobileex.updateMobileComment', $args);
         	    }
         	    else {
         	    	 // delete mobile document
         	    	 executeQuery('mobileex.deleteMobileComment', $args);
         	    }
        	   }
        	   
           return new Object();
        }
        
        /**
         * @brief mobile comment delete
         **/
        function triggerMobileexDeleteComment(&$comment) {
        	    $oMobileexModel = &getModel('mobileex');
             $oMobile =& Mobile::getInstance();
    	       $is_mobile = $oMobile->ismobile;
             $args = $comment;

            $output = $oMobileexModel->getMobileComment($args->comment_srl);
            if($output->data) {
        	       executeQuery('mobileex.deleteMobileComment', $args);
        	    }
        	    
            return new Object();
        }
        
        /**
         * 패스워드 변경
		   * 
         **/
        function procMobileexModifyPassword() {
            if(!Context::get('is_logged')) return $this->stop('msg_not_logged');
            
            // 필수 정보들을 미리 추출
            $current_password = trim(Context::get('current_password'));
            $password = trim(Context::get('password'));
            
            // 로그인한 유저의 정보를 가져옴
            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;
            
            // member model 객체 생성
            $oMemberModel = &getModel('member');
            
            if($this->xe_ver > 4) {
                // member_srl 에 따른 정보 가져옴
    			   $columnList = array('member_srl', 'password');
                $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl, 0, $columnList);
                // 현재 비밀번호가 맞는지 확인
                if(!$oMemberModel->isValidPassword($member_info->password, $current_password, $member_srl)) return new Object(-1, 'invalid_password');
            } else {
                // member_srl 에 따른 정보 가져옴
                $member_info = $oMemberModel->getMemberInfoByMemberSrl($member_srl);
    
                // 현재 비밀번호가 맞는지 확인
                if(!$oMemberModel->isValidPassword($member_info->password, $current_password)) return new Object(-1, 'invalid_password');
            }

            // 이전 비밀번호와 같은지 확인
            if ($current_password == $password) return new Object(-1, 'invalid_new_password');

            $oMemberController = &getController('member');
            
            // Execute insert or update depending on the value of member_srl
            $args->member_srl = $member_srl;
            $args->password = $password;
            $output = $oMemberController->updateMemberPassword($args);
            if(!$output->toBool()) return $output;

            $this->add('member_srl', $args->member_srl);
            $this->setMessage('success_updated');

        }
        
        /**
         * Delete 쪽지제거
         **/
        function procMobileexDeleteMessage() {

            // 회원정보,로그인 체크
            if(!Context::get('is_logged')) return new Object(-1, 'msg_not_logged');
            $logged_info = Context::get('logged_info');
            $member_srl = $logged_info->member_srl;
            
            // 쪽지번호 체크
            $message_srl = Context::get('message_srl');
            if(!$message_srl) return new Object(-1,'msg_invalid_request');
            
            // Get the message
            $oCommunicationModel = &getModel('communication');
            $message = $oCommunicationModel->getSelectedMessage($message_srl);
            if(!$message) return new Object(-1,'msg_invalid_request');
            // Check a message type if 'S' or 'R'
            if($message->sender_srl == $member_srl && $message->message_type == 'S') {
                if(!$message_srl) return new Object(-1, 'msg_invalid_request');
            } elseif($message->receiver_srl == $member_srl && $message->message_type == 'R') {
                if(!$message_srl) return new Object(-1, 'msg_invalid_request');
            }
            // Delete
            $args->message_srl = $message_srl;
            $output = executeQuery('communication.deleteMessage', $args);
            if(!$output->toBool()) return $output;

        }
        
       /**
         * @brief 쪽지 발송
         **/
        function procMobileexSendMessage() {
            // 로그인 정보 체크
            if(!Context::get('is_logged')) return new Object(-1, 'msg_not_logged');
            $logged_info = Context::get('logged_info');
            
            // 변수 검사
            $receiver_srl = Context::get('receiver_srl');
            $receiver_user_id = Context::get('receiver_user_id');
            
            $oMemberModel = &getModel('member');
            
            if($receiver_user_id) {
            	if($this->xe_ver > 4) {
            	$columnList = array('member_srl');
            	$receiver_info = $oMemberModel->getMemberInfoByUserID($receiver_user_id,$columnList); 
              } else {
              $receiver_info = $oMemberModel->getMemberInfoByUserID($receiver_user_id); 
              }
            }
            
            if(!$receiver_srl) $receiver_srl = $receiver_info->member_srl;
            
            // 마지막으로 받는이가 없으면..에러출력..
            if(!$receiver_srl) return new Object(-1, 'msg_not_exists_member');
            
            $title = trim(Context::get('title'));
            if(!$title) return new Object(-1, 'msg_title_is_null');
            
            $content = Context::get('content');
            
            $content = str_replace("\r\n", "\n", $content);
            $content = str_replace("\r", "\n", $content);
            $content = trim($content);
            if(!$content) return new Object(-1, 'msg_content_is_null');
            

            $send_mail = Context::get('send_mail');
            if($send_mail != 'Y') $send_mail = 'N';

            // 받을 회원이 있는지에 대한 검사

            $oCommunicationModel = &getModel('communication');
            $receiver_member_info = $oMemberModel->getMemberInfoByMemberSrl($receiver_srl);
            if($receiver_member_info->member_srl != $receiver_srl) return new Object(-1, 'msg_not_exists_member');

            // 받을 회원의 쪽지 수신여부 검사 (최고관리자이면 패스)
            if($logged_info->is_admin != 'Y') {
                if($receiver_member_info->allow_message == 'F') {
                    if(!$oCommunicationModel->isFriend($receiver_member_info->member_srl)) return new object(-1, 'msg_allow_message_to_friend');
                } elseif($receiver_member_info->allow_messge == 'N') {
                    return new object(-1, 'msg_disallow_message');
                }
            }
            
            $oCommunicationController = &getController('communication');
            
            // 쪽지 발송
            $output = $oCommunicationController->sendMessage($logged_info->member_srl, $receiver_srl, $title, $content);

            // 메일로도 발송
            if($output->toBool() && $send_mail == 'Y') {
                $view_url = Context::getRequestUri();
                $content = sprintf("%s<br /><br />From : <a href=\"%s\" target=\"_blank\">%s</a>",$content, $view_url, $view_url);
                $oMail = new Mail();
                $oMail->setTitle($title);
                $oMail->setContent($content);
                $oMail->setSender($logged_info->user_name, $logged_info->email_address);
                $oMail->setReceiptor($receiver_member_info->user_name, $receiver_member_info->email_address);
                $oMail->send();
            }
            
            
            return $output;
        }
    }
?>
