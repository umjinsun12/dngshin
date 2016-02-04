<?php

    /**
     * @class  mobileexModel
     * @brief  mobileex모듈의 model class
     **/

    class mobileexModel extends mobileex {
        /**
         * Initialization
		 *
		 * @return void
         **/
        function init() {
        }
        
         function getMobileexConfig($module_srl) {
          	 $mobileex_config =  $this->getEachModuleInfo($module_srl);
         	 if(!$mobileex_config) {
         	 	  $oModuleModel = &getModel('module');
         	 	  $mobileex_config = $oModuleModel->getModuleConfig('mobileex');
         	 }
         	 return $mobileex_config;
          }
        
        
        /**
         * file ext check
         **/
        function getAllowedFileType($file_info,$module_srl) {

        	     $oFileModel = &getModel('file');
        	     $mobileex_config = $this->getMobileexConfig($module_srl);
        	     
        	     if($mobileex_config->file_config_use == 'Y') $file_config = $mobileex_config;
        	     else $file_config = $oFileModel->getFileConfig($module_srl);
             
             $logged_info = Context::get('logged_info');
             $allow_filetype->allowed = true;

             // get file_ext
               $file_name = $file_info['name'];
               $file_name_ext = strrchr($file_name,".");
               $allow_filetype->file_ext = $file_name_ext;
               
             // allow file ext check

             $allowed_filetypes = $file_config->allowed_filetypes;
             
             if(!$allowed_filetypes || $allowed_filetypes == '*.*') $allow_filetype->allowed = true;
             else {
             	$allowed_filetypes = str_replace('*', '', $allowed_filetypes); 
             	$allowed_filetypes = str_replace(';', '', $allowed_filetypes); 
             	if(!eregi($file_name_ext,$allowed_filetypes) && $logged_info->is_admin != 'Y') $allow_filetype->allowed = false; 
             	else $allow_filetype->allowed = true;
             }

        	    return $allow_filetype;
        }
        /**
         * file size check
         **/
        function getAllowedFileSize($file_size,$module_srl,$upload_target_srl,$type=null) {
            $mobileex_config = $this->getMobileexConfig($module_srl);
        	    $oFileModel = &getModel('file');
        	    $file_config = $oFileModel->getUploadConfig();

             $logged_info = Context::get('logged_info');
             

             // allowe file size check
             if($logged_info->is_admin == 'Y') {
             	 
                $allow_filesize->allowed_filesize = true;
                $allow_filesize->allowed_attach_size = true;
             
             } else {
             	
                	  if($mobileex_config->file_config_use == 'Y') {
                     $allowed_filesize = (int)$mobileex_config->allowed_filesize * 1024 * 1024; 
                     $allowed_attach_size = (int)$mobileex_config->allowed_attach_size * 1024 * 1024;  
                	  }
                	  else {
                     $allowed_filesize = (int)$file_config->allowed_filesize * 1024 * 1024; 
                     $allowed_attach_size = (int)$file_config->allowed_attach_size * 1024 * 1024;  
                	  }
   
                   // filesize
                   if($allowed_filesize < (int)$file_size) $allow_filesize->allowed_filesize = false;
                   else $allow_filesize->allowed_filesize = true;
                   
                   // atached file
                   $size_args->upload_target_srl = $upload_target_srl;
                   $output = executeQuery('file.getAttachedFileSize', $size_args);
                   $attached_size = (int)$output->data->attached_size + (int)$file_size;
                   if($attached_size > $allowed_attach_size) $allow_filesize->allowed_attach_size = false;
                   else $allow_filesize->allowed_attach_size = true;
                 
             }

             
             return $allow_filesize;
        }
        
        /**
         * upload grant check
         **/
        function getUploadGrant($module_srl,$type) {
        	
        	   // get editor config
        	   $oEditorModel = &getModel('editor');
           $editor_config = $oEditorModel->getEditorConfig($module_srl);
           

        	   if($type == 'document') {
        	   	$mex_config->upload_file_grant = $editor_config->upload_file_grant;
        	   } else {
        	   	$mex_config->upload_file_grant = $editor_config->comment_upload_file_grant;
        	   }
        	   
            // 권한 체크를 위한 현재 로그인 사용자의 그룹 설정 체크
            if(Context::get('is_logged')) {
                $logged_info = Context::get('logged_info');
                $group_list = $logged_info->group_list;
            } else {
                $group_list = array();
            }
            
            // 파일 업로드 권한 체크
            $mex_config->allow_fileupload = false;
            if(count($mex_config->upload_file_grant)) {
                foreach($group_list as $group_srl => $group_info) {
                    if(in_array($group_srl, $mex_config->upload_file_grant)) {
                        $mex_config->allow_fileupload = true;
                        break;
                    }
                }
            } else $mex_config->allow_fileupload = true;
            
            // is admin check
            if($logged_info->is_admin) $mex_config->allow_fileupload = true;
             
             
          return $mex_config->allow_fileupload;
        }

        /**
         * Get Each Module Info
         **/
        function getEachModuleInfo($module_srl) {
            $args->module_srl = $module_srl;
            $output = executeQuery('mobileex.getEachModuleInfo', $args);
            return $output->data;
        }
        

        /**
         * Get Mobile document
         **/
        function getMobileDocument($document_srl) {
            $args->document_srl = $document_srl;
            return executeQueryArray('mobileex.getMobileDocument', $args);
        }

        /**
         * Get Mobile documents
         **/
        function getMobileDocuments($module_srl) {
            $args->module_srl = $module_srl;
            return executeQueryArray('mobileex.getMobileDocuments', $args);
        }
        
        /**
         * Get Mobile comment
         **/
        function getMobileComment($comment_srl) {
            $args->comment_srl = $comment_srl;
            return executeQueryArray('mobileex.getMobileComment', $args);
        }
        
        /**
         * Get Mobile comments
         **/
        function getMobileComments($module_srl) {
            $args->module_srl = $module_srl;
            return executeQueryArray('mobileex.getMobileComments', $args);
        }
        
        /**
         * Get add file
         **/
        function getMobileAddfile($file_srl) {
            $args->file_srl = $file_srl;
            return executeQueryArray('mobileex.getMobileAddfile', $args);
        }

        /**
         * Get add files
         **/
        function getMobileAddfiles($document_srl) {
            $args->upload_target_srl = $document_srl;
            $args->sort_index = 'regdate';
            return executeQueryArray('mobileex.getMobileAddfiles', $args);
        }
        
        /**
         * Get module add file
         **/
        function getMobileModuleAddfiles($module_srl) {
             $args->module_srl = $module_srl;
            return executeQueryArray('mobileex.getMobileModuleAddfiles', $args);
        }
        
        /**
         * Get module add file list
         **/
        function getMobileAddFileList($document_srl) {
             $args->upload_target_srl = $document_srl;
             $output = executeQueryArray('mobileex.getMobileAddfileList', $args);
             
             return $output;
        }
        
        /**
         * get file thumbnail
         **/

        function getFileThumbnail($file_srl,$resize_width, $resize_height, $thumbnail_type = 'ratio') {
            // file_srl check
            if(!$file_srl) return;
            if(!$resize_width && !$resize_height)  return;
            
           // get img file
           $oFileModel = &getModel('file');
           $file = $oFileModel->getFile($file_srl);
           $imgsize = getimagesize($file->uploaded_filename); 
           
           // 가로값만 있을경우..
           if($resize_width && !$resize_height) {
           	  $width = $resize_width;
           	  $height  = ceil(($imgsize[1]/$imgsize[0]) * $resize_width);
           }
           // 새로값만 있을경우.. 가로값을 구해야한다..씨벌..
           elseif(!$resize_width && $resize_height) {
           	  $width = ceil(($imgsize[0]/$imgsize[1]) * $resize_height);
           	  $height = $resize_height;
           }
           // 둘다있으면 그냥 처리..
           else {
           	  $width = $resize_width;
             $height = $resize_height;
           }

            // height check
            if(!$height) $height = $width;

            // thumbnail_type check
            if(!in_array($thumbnail_type, array('crop','ratio'))) $thumbnail_type = 'ratio'; 

            // thumbnail info
            $_thumbnail_path = "m".getNumberingPath($file_srl, 3);
            $thumbnail_path = sprintf('files/cache/thumbnails/%s',$_thumbnail_path);
            $thumbnail_file = sprintf('%s%dx%d.%s.jpg', $thumbnail_path, $width, $height, $thumbnail_type);
            $thumbnail_url  = Context::getRequestUri().$thumbnail_file;

            // thumbnail exist check
            if(file_exists($thumbnail_file)) {
                if(filesize($thumbnail_file)<1) return false;
                else return $thumbnail_url;
            }



           if($file->direct_download!='Y') return false;
           if(!preg_match("/\.(jpg|png|jpeg|gif|bmp)$/i",$file->source_filename)) return false;

           $source_file = $file->uploaded_filename;
           
           if(!file_exists($source_file)) return false;
           else $output = FileHandler::createImageFile($source_file, $thumbnail_file, $width, $height, 'jpg', $thumbnail_type);

          if($output) return $thumbnail_url;
          else FileHandler::writeFile($thumbnail_file, '','w');

          return;
        }
        
        function getImgResizeValue($file,$maxwidth,$maxheight = 0) {
        	  $whgab = $maxwidth - $maxheight;
          $imgsize = getimagesize($file); 

                if($maxwidth > 0 && $maxheight > 0) {
                  if($imgsize[0] > $maxwidth && $imgsize[1] > $maxheight) {
                  	   $gabwidth = $imgsize[0] - $maxwidth;
                  	   $gabheight = $imgsize[1] - $maxheight;
                  	   $gabwh = $gabwidth - $gabheight;

                  	   if($gabwh > 0) $resize_target = 'W';
                  	   elseif($gabwh < 0) $resize_target = 'H';
                  	   else {
                  	   	if($whgab > 0 ) $resize_target = 'H';
                  	   	else $resize_target = 'W';
                  	   }
                  }
                  elseif($imgsize[0] > $maxwidth) $resize_target = 'W';
                  elseif($imgsize[1] > $maxheight) $resize_target = 'H';
                  else $resize_target = '';
                }
                
                elseif($maxwidth > 0) {
                	    if($imgsize[0] > $maxwidth) $resize_target = 'W';
                	    else $resize_target = '';
                }
                elseif($maxheight > 0) {
                	    if($imgsize[1] > $maxheight) $resize_target = 'H';
                	    else $resize_target = '';
                }
                else $resize_target = '';
                
                if($resize_target == 'W') {
                 	   	$img_width = $maxwidth;
                 	   	$img_height = ceil(($imgsize[1] / $imgsize[0]) * $maxwidth);
                }
                elseif($resize_target == 'H') {
                 	   	$img_height = $maxheight;
                 	   	$img_width = ceil(($imgsize[0] / $imgsize[1]) * $maxheight);
                }
                else {
                 	   $img_width = null;
                 	   $img_height = null;
                }
                
                 $resizeimg->width= $img_width;
                 $resizeimg->height = $img_height;
       
                 return $resizeimg;
        }
        
        /**
         * @mobileex integrantion search 0.3
         * @brief 게시글 검색
         **/
        function getDocuments($target, $module_srls_list, $search_target, $search_keyword, $page=1, $list_count = 20) {
            if(is_array($module_srls_list)) $module_srls_list = implode(',',$module_srls_list);

            if($target == 'exclude') {
				$module_srls_list .= ',0'; // exclude 'trash'
				if ($module_srls_list{0} == ',') $module_srls_list = substr($module_srls_list, 1);
            	$args->exclude_module_srl = $module_srls_list;
            } else {
            	$args->module_srl = $module_srls_list;
            	$args->exclude_module_srl = '0'; // exclude 'trash'
            }

            $args->page = $page;
            $args->list_count = $list_count;
            $args->page_count = 10;
            $args->search_target = $search_target;
            $args->search_keyword = $search_keyword;
            $args->sort_index = 'list_order'; 
            $args->order_type = 'asc';
            if(!$args->module_srl) unset($args->module_srl);

            // 대상 문서들을 가져옴
            $oDocumentModel = &getModel('document');

            return $oDocumentModel->getDocumentList($args);
        }

        /**
         * @brief 댓글 검색
         **/
        function getComments($target, $module_srls_list, $search_keyword, $page=1, $list_count = 20) {
            if(is_array($module_srls_list)) $module_srls = implode(',',$module_srls_list);
            else $module_srls = $module_srls_list;
            if($target == 'exclude') $args->exclude_module_srl = $module_srls;
            else $args->module_srl = $module_srls;
            $args->page = $page;
            $args->list_count = $list_count;
            $args->page_count = 10;
            $args->search_target = 'content';
            $args->search_keyword = $search_keyword;
            $args->sort_index = 'list_order'; 
            $args->order_type = 'asc';

            // 대상 문서들을 가져옴
            $oCommentModel = &getModel('comment');
            $output = $oCommentModel->getTotalCommentList($args);
            if(!$output->toBool()|| !$output->data) return $output;
            return $output;
        }

        /**
         * @brief 엮인글 검색
         **/
        function getTrackbacks($target, $module_srls_list, $search_target = "title", $search_keyword, $page=1, $list_count = 20) {
            if(is_array($module_srls_list)) $module_srls = implode(',',$module_srls_list);
            else $module_srls = $module_srls_list;
            if($target == 'exclude') $args->exclude_module_srl = $module_srls;
            else $args->module_srl = $module_srls;
            $args->page = $page;
            $args->list_count = $list_count;
            $args->page_count = 10;
            $args->search_target = $search_target;
            $args->search_keyword = $search_keyword;
            $args->sort_index = 'list_order'; 
            $args->order_type = 'asc';

            // 대상 문서들을 가져옴
            $oTrackbackModel = &getAdminModel('trackback');
            $output = $oTrackbackModel->getTotalTrackbackList($args);
            if(!$output->toBool()|| !$output->data) return $output;
            return $output;
        }

        /**
         * @brief 파일 검색
         **/
        function _getFiles($target, $module_srls_list, $search_keyword, $page, $list_count, $direct_download = 'Y') {
            if(is_array($module_srls_list)) $module_srls = implode(',',$module_srls_list);
            else $module_srls = $module_srls_list;
            if($target == 'exclude') $args->exclude_module_srl = $module_srls;
            else $args->module_srl = $module_srls;
            $args->page = $page;
            $args->list_count = $list_count;
            $args->page_count = 10;
            $args->search_target = 'filename';
            $args->search_keyword = $search_keyword;
            $args->sort_index = 'files.file_srl'; 
            $args->order_type = 'desc';
            $args->isvalid = 'Y';
            $args->direct_download = $direct_download=='Y'?'Y':'N';

            // 대상 문서들을 가져옴
            $oFileAdminModel = &getAdminModel('file');
            $output = $oFileAdminModel->getFileList($args);
            if(!$output->toBool() || !$output->data) return $output;

            $list = array();
            foreach($output->data as $key => $val) {
                $obj = null;
                $obj->filename = $val->source_filename;
                $obj->download_count = $val->download_count;
                if(substr($val->download_url,0,2)=='./') $val->download_url = substr($val->download_url,2);
                $obj->download_url = Context::getRequestUri().$val->download_url;
                $obj->target_srl = $val->upload_target_srl;
                $obj->file_size = $val->file_size;

                // 이미지 
                if(preg_match('/\.(jpg|jpeg|gif|png)$/i', $val->source_filename)) {
                    $obj->type = 'image';

                    $thumbnail_path = sprintf('files/cache/thumbnails/%s',getNumberingPath($val->file_srl, 3));
                    if(!is_dir($thumbnail_path)) FileHandler::makeDir($thumbnail_path);
                    $thumbnail_file = sprintf('%s%dx%d.%s.jpg', $thumbnail_path, 70, 70, 'crop');
                    $thumbnail_url  = Context::getRequestUri().$thumbnail_file;
                    if(!file_exists($thumbnail_file)) FileHandler::createImageFile($val->uploaded_filename, $thumbnail_file, 70, 70, 'jpg', 'crop');
                    $obj->src = sprintf('<img src="%s" alt="%s" width="%d" height="%d" />', $thumbnail_url, htmlspecialchars($obj->filename), 70, 70);

                // 동영상
                } elseif(preg_match('/\.(swf|flv|wmv|avi|mpg|mpeg|asx|asf|mp3)$/i', $val->source_filename)) {
                    $obj->type = 'multimedia';
                    $obj->src = sprintf('<script type="text/javascript">displayMultimedia("%s",80,80);</script>', $obj->download_url);

                // 기타
                } else {
                    $obj->type = 'binary';
                    $obj->src = '';
                }

                $list[] = $obj;
                $target_list[] = $val->upload_target_srl;
            }
            $output->data = $list;

            $oDocumentModel = &getModel('document');
            $document_list = $oDocumentModel->getDocuments($target_list);
            if($document_list) foreach($document_list as $key => $val) {
                foreach($output->data as $k => $v) {
                    if($v->target_srl== $val->document_srl) {
                        $output->data[$k]->url = $val->getPermanentUrl();
                        $output->data[$k]->regdate = $val->getRegdate("Y-m-d H:i");
                        $output->data[$k]->nick_name = $val->getNickName();
                    }
                }
            }

            $oCommentModel = &getModel('comment');
            $comment_list = $oCommentModel->getComments($target_list);
            if($comment_list) foreach($comment_list as $key => $val) {
                foreach($output->data as $k => $v) {
                    if($v->target_srl== $val->comment_srl) {
                        $output->data[$k]->url = $val->getPermanentUrl();
                        $output->data[$k]->regdate = $val->getRegdate("Y-m-d H:i");
                        $output->data[$k]->nick_name = $val->getNickName();
                    }
                }
            }

            return $output;
        }

        /**
         * @brief 멀티미디어 검색
         **/
        function getImages($target, $module_srls_list, $search_keyword, $page=1, $list_count = 20) {
            return $this->_getFiles($target, $module_srls_list, $search_keyword, $page, $list_count);
        }

        /**
         * @brief 첨부파일 검색
         **/
        function getFiles($target, $module_srls_list, $search_keyword, $page=1, $list_count = 20) {
            return $this->_getFiles($target, $module_srls_list, $search_keyword, $page, $list_count, 'N');
        }
        
        /**
         * @brief 모바일 스킨 설정 가져오기
         **/
         
		   function getMobileexMobileSkinVars($module_srl)
		   {
            $oModuleModel = &getModel('module');
            $oMobileexAdminModel = &getAdminModel('mobileex');
            $module_info = $oModuleModel->getModuleInfoByModuleSrl($module_srl);
            if(!$module_info) return;

            $skin = $module_info->mskin;
            $module_path = './modules/'.$module_info->module;
            
            $skin_info = $oModuleModel->loadSkinInfo($module_path, $skin, 'm.skins');
            if(!$skin_info) return;
			    $skin_vars = $oMobileexAdminModel ->getMobileexMobileSkinVars($module_srl);
            if(!$skin_vars) return;
            if(count($skin_info->extra_vars)) {
                 foreach($skin_vars as $val) {
                 	$name = $val->name;
                 	$value =  $val->value;
                 	$new_skin_vars->{$name} = $value;
                 }
            }
            else $new_skin_vars = false;

		     return $new_skin_vars;
        }
        
		   function getModuleMobileSkinVars($module_srl)
		   {
            $args->module_srl = $module_srl;
            $output = executeQueryArray('module.getModuleMobileSkinVars',$args);
            if(!$output->toBool() || !$output->data) return;
            
            $skin_vars = array();
            foreach($output->data as $val) {
              $name = $val->name;
              $value =  $val->value;
              $new_skin_vars->{$name} = $value;
            }
		     return $new_skin_vars;
        }
        
		// 1차 댓글리스트을 가져온다.
		function getMobileexCommentList($document_srl, $last_comment_srl = 0, $count = 10) {
			if (!$count) $count = 10;

			$result = new Object();
			$args->document_srl = $document_srl;
			$args->list_count = $count;

			// 전체 개수
			if (!$last_comment_srl){
				$output = executeQuery('mobileex.getMobileexCommentTotalCount', $args);
				if (!$output->toBool()){
					$result->add('list', array());
					$result->add('total', 0);
					return $result;
				}
				$total = $output->data->count;
			}

			// 정해진 수에 따라 목록을 구해옴
			if ($last_comment_srl){
				$args->last_comment_srl = $last_comment_srl;
			}
			$output = executeQueryArray('mobileex.getMobileexCommentPageList', $args);

			// 쿼리 결과에서 오류가 생기면 그냥 return해 버려~
			if(!$output->toBool()){
				$result->add('list', array());
				$result->add('total', 0);
				return $result;
			}

			$comment_list = $output->data;
			if (!$comment_list) $comment_list = array();
			if (!is_array($comment_list)) $comment_list = array($comment_list);
         
			// 모바일EX용 댓글 아이템을 생성
			$mobileexCommentList = array();
			foreach($comment_list as $comment){
				if (!$comment->comment_srl) continue;
				unset($oMobileexComment);
				$oMobileexComment = new mobileexCommentItem();
				$oMobileexComment->setAttribute($comment);
				if($is_admin) $oMobileexComment->setGrant();

				$mobileexCommentList[$comment->comment_srl] = $oMobileexComment;
			}

			$result->add('list', $mobileexCommentList);
			$result->add('total', $total);

			return $result;
		}
		
		// 대댓글리스트을 가져온다.
		function getMobileexSubCommentList($parent_srl, $page = 0, $count = 20) {
			if (!$count) $count = 20;

			$result = new Object();

			$args->parent_srl = $parent_srl;

			// 페이지가 없으면 제일 뒤 페이지를 구한다.
			if (!$page){
				$output = executeQuery('mobileex.getMobileexSubCommentTotalCount', $args);
				if (!$output->toBool()){
					$result->add('list', array());
					$result->add('page_navigation', new PageHandler(0, 0, 0));
					return $result;
				}
				$comment_count = $output->data->count;
				$page = (int)( ($comment_count-1) / $count) + 1;
			}

			// 정해진 수에 따라 목록을 구해옴
			$args->page = $page;
			$args->list_count = $count;
			$output = executeQueryArray('mobileex.getMobileexSubCommentPageList', $args);

			// 쿼리 결과에서 오류가 생기면 그냥 return
			if(!$output->toBool()) $output;

			$comment_list = $output->data;
			if (!$comment_list) $comment_list = array();
			if (!is_array($comment_list)) $comment_list = array($comment_list);

			// 모바일EX용 댓글 아이템을 생성
			$mobileexCommentList = array();
			foreach($comment_list as $comment){
				if (!$comment->comment_srl) continue;
				unset($oMobileexComment);
				$oMobileexComment = new mobileexCommentItem();
				$oMobileexComment->setAttribute($comment);
				if($is_admin) $oMobileexComment->setGrant();

				$mobileexCommentList[$comment->comment_srl] = $oMobileexComment;
			}

			$result->add('list', $mobileexCommentList);
			$result->add('page_navigation', $output->page_navigation);
			return $result;
		}
		
		// 대댓글 개수 구하기
		function getMobileexSubCommentCount($document_srl,$parent_srl = 0) {
			
			$args->document_srl = $document_srl;
			$args->parent_srl = $parent_srl;
			$output = executeQuery('mobileex.getMobileexSubCommentCount', $args);
			if (!$output->toBool()){
              $sub_comment_count = 0;
			}
			$sub_comment_count= $output->data->count;
			return $sub_comment_count;
		}
		
		// 대상댓글 정보 구하기
		function getMobileexComment($category_srl) {
			$oCommentModel = &getModel('comment');
			$parent_comment_info = $oCommentModel->getComment($category_srl);

			unset($oMobileexComment);
			$oMobileexComment = new mobileexCommentItem();
			$oMobileexComment->setAttribute($parent_comment_info);
			if($is_admin) $oMobileexComment->setGrant();

			return $oMobileexComment;;
		}
		

		

    }
?>
