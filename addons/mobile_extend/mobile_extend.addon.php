<?php
    if(!defined("__ZBXE__")) exit();

    /**
     * @file mobile_extend.addon.php
     * @author COMSIN (comsinnet@naver.com)
     * @brief 모바일 확장 에드온 - 모바일확장모듈의 정보를 받아 실행
     **/
      
   if($called_position != "after_module_proc" || Context::getResponseMethod()=="XMLRPC" || $this->module == 'page' || $this->module == 'admin') return;
     
   // get mobileex model
   $oMobileexModel = &getModel('mobileex');
   $mobileex_config = $oMobileexModel->getMobileexConfig($this->module_srl);

   // mobileex module check
   if(!$mobileex_config) return;

   $document_list = Context::get('document_list');
   $document_srl = Context::get('document_srl');
   $comment_srl = Context::get('comment_srl');
		
   // xe core version check 1.7 추가체크대응

    if(preg_match('/^1.7/', __ZBXE_VERSION__)) $xe_version = 7;
    elseif(preg_match('/^1.5/', __ZBXE_VERSION__)) $xe_version = 5;
    elseif(preg_match('/^1.4/', __ZBXE_VERSION__)) $xe_version = 4;

    Context::set('xe_version',$xe_version);
    
    // mobile check
    $oMobile =&Mobile::getInstance();
    $is_mobile = $oMobile->ismobile;
    if($is_mobile) {
    	$muploader_active = 'Y';
    	Context::set('is_mobile',$is_mobile);
    }
              
   // set mobileex config
   if($mobileex_config) Context::set('mobileex_config',$mobileex_config);
      
   // set mobileex mskin config
   $mobileex_mskin_vars = $oMobileexModel->getMobileexMobileSkinVars($this->module_srl);
   if($mobileex_mskin_vars) Context::set('mobileex_mskin_config',$mobileex_mskin_vars);

   // lang load
   Context::loadLang('./modules/mobileex/lang');

   $icon_path = sprintf('%s%s',getUrl(), 'modules/mobileex/tpl/images/');
   // set mobile icon
   $mobile_image = sprintf('<img src="%sicon_mobile.png" alt="is_mobile_write" title="is_mobile_write" style="margin:0 2px 0 2px;" class="is_mobile_icon"/>', $icon_path);
   // set pc icon
   $pc_image = sprintf('<img src="%sicon_pc.png" alt="is_mobile_write" title="is_mobile_write" style="margin:0 2px 0 2px;" class="is_mobile_icon"/>', $icon_path);
     
     // set mobile document info
		if($document_list) {
			foreach($document_list as $key => $val) {
            $document_info = $oMobileexModel->getMobileDocument($val->document_srl);
            if(!$document_info->toBool()||!$document_info->data) {
            	$document_list[$key]->is_mobile = $pc_image;
            	//$document_list[$key]->printExtraImages() = $document_list[$key]->printExtraImages().$pc_image;
            }
            else { 
            	$document_list[$key]->is_mobile = $mobile_image;
            	//$document_list[$key]->printExtraImages() = $document_list[$key]->printExtraImages().$mobile_image;
            }
		   }
      }

    if($document_srl) {
    	
        $doc_mobile_check = $oMobileexModel->getMobileDocument($document_srl);
        if($doc_mobile_check->data) Context::set('is_mobile_docment','Y');
        else $muploader_active = 'N';
        
        // 코멘트수정값이 있나없나 체크
        $oComment = Context::get('oComment');
        $comment_mode = 'N'; // 우선 코멘트모드는 없는걸로~
    	  
    	  //게시물보기인경우 시작
    	  if(!$oComment) {
           // 모바일글인지 체크

           $addfile_min_size =(int)$mobileex_config->addfile_min_size;
           if(!$addfile_min_size) $addfile_min_size = 120;
           $addfile_thumb_size =(int)$mobileex_config->addfile_thumb_size;
           if(!$addfile_thumb_size) $addfile_thumb_size = 700;
    
          // 모바일글의 처리
        	  if($doc_mobile_check->data) { 
        	 	 //  use addfile
        	 	 if($mobileex_config->addfile_use == 'Y') {
        	 	 	  if($is_mobile || (!$is_mobile && $mobileex_config->pcmode_addfile_view == 'Y')) {
                     	  
                     	  $add_file_list = $oMobileexModel->getMobileAddFileList($document_srl);
                        $addFileList = array();
                        $addFileSrls = array();
                        
                        // make addfile list (with thumb)
                         if(is_array($add_file_list->data)) {
                         	
                 					foreach($add_file_list->data as $key=>$value)
                 					{
                 						$file = $value;
                 						$preview_thumb = $oMobileexModel->getFileThumbnail($value->file_srl,100, 100, 'crop');
                 						if(!$preview_thumb) $preview_thumb = './modules/editor/tpl/images/files.gif';
                 						$file->preview_thumb = $preview_thumb;
                 						unset($preview_thumb);
                 						// min_thumb
                 						
                 						if($mobileex_config->addfile_thumb_use == 'Y'){
                 							// 90도 회전시킨 이미지일경우.. 가로세로 동일하게..크롭으로..처리
                 							if($value->rotate == '-90' || $value->rotate == '90') {
                 								 $imgsize = getimagesize($value->uploaded_filename); 
                                         if(($imgsize[0]-$imgsize[1]) > 0 ) $addfile_thumb_size = $imgsize[0];
                                         else $addfile_thumb_size = $imgsize[1];
                  								 $max_thumb = $oMobileexModel->getFileThumbnail($value->file_srl,$addfile_thumb_size,$addfile_thumb_size,'crop');
                 							}
                 							else {
                     						// 회전없을경우.
                     						$max_thumb = $oMobileexModel->getFileThumbnail($value->file_srl,$addfile_thumb_size);
                     					   }
                     						if(!$max_thumb) $max_thumb = './modules/editor/tpl/images/files.gif';
                     						$file->max_thumb = $max_thumb;
                     						unset($max_thumb);
                 					   }
                 					   else {
                 							// 90도 회전시킨 이미지일경우.. 가로세로 동일하게..크롭으로..처리
                 							if($value->rotate == '-90' || $value->rotate == '90') {
                 								 $imgsize = getimagesize($value->uploaded_filename); 
                                         if(($imgsize[0]-$imgsize[1]) > 0 ) $addfile_thumb_size = $imgsize[0];
                                         else $addfile_thumb_size = $imgsize[1];
                  								 $max_thumb = $oMobileexModel->getFileThumbnail($value->file_srl,$addfile_thumb_size,$addfile_thumb_size,'crop');
                  								 $file->max_thumb = $max_thumb;
                  								 unset($max_thumb);
                 							}
                 					   	else {
                 					   	$file->max_thumb =  $value->uploaded_filename;
                 					      }
                 					   } 
                 						
                 						// 정보에 가로,세로 사이즈도 넣자..
                 						$thumb_size = getimagesize($file->max_thumb); 
                 						$file->width = $thumb_size[0];
                 						$file->height = $thumb_size[1];

                 						array_push($addFileList, $file);
                 						array_push($addFileSrls, $file->file_srl);
                 				 }
                 			}
                 			
                 			// set addfile list
                 			 if(count($addFileList) > 0) {
                 			 	Context::set('add_file_list',$addFileList);
                 			 	Context::set('add_file_srls',$addFileSrls);
                 			 }
                 			 
                     		// addfile view start set
                     		 	 if($mobileex_config->addfile_view_type=='F') {
                     		 	 	$addfile_begin_width = '100%';
                     		 	 	$addfile_begin_height = 'auto';
                     		 	 }
                     		 	 else {
                     		 	 	$addfile_begin_width = $addfile_min_size.'px';
                     		 	 	$addfile_begin_height = $addfile_min_size.'px';
                     		 	 }

                     		 
                     		 Context::set('addfile_begin_width',$addfile_begin_width);
                     		 Context::set('addfile_begin_height',$addfile_begin_height);
         			  }
         			}
         			else $add_file_srls = '';
         			
         		   if(Context::get('act') && $is_mobile) {
             			// make  uploadfile_list
             			$oFileModel = &getModel('file');
             			$uploaded_file_list = $oFileModel->getFiles($document_srl);
             			
             			$uploaded_list = array();
             			
             			foreach($uploaded_file_list as $key => $uploaded_file) {
             				 
             				  $up_file = $uploaded_file;
             				  if(in_array($uploaded_file->file_srl,$addFileSrls))	$up_file->is_added = 'Y';
             				  else $up_file->is_added = 'N';
             				  
                        $img_ext = substr($uploaded_file->source_filename, -4);
                        $img_ext = strtolower($img_ext);
                        $ext_img = in_array($img_ext,array('.jpg','jpeg','.gif','.png'));
                        if($ext_img) 	{
                        	$up_file->preview_thumb = $oMobileexModel->getFileThumbnail($uploaded_file->file_srl,100,100, $thumbnail_type = 'crop');
                        	$up_file->img_ext = 'Y';
                        }
                        else $up_file->img_ext = 'N';
                        
                        $up_file->size = sprintf("%.1f",$uploaded_file->file_size/1024).'KB';
                        
                        if(!$up_file->preview_thumb) $up_file->preview_thumb = './modules/editor/tpl/images/files.gif';
                        array_push($uploaded_list, $up_file);
             			}
             			
             			// set uploadfile_list
             			if(count($uploaded_list) > 0 ) Context::set('uploaded_list',$uploaded_list);
         		  }
    
        }
        // PC글일경우 처리
        else { 
               	 if($mobileex_config->pcimg_view == 'Y' && !Context::get('act') ) { 
               	 	  
               	 	  if($is_mobile || (!$is_mobile && $mobileex_config->pcmode_addfile_view == 'Y')) {
                  	 	  $args->document_srl = $document_srl;
                          $document_info= executeQuery('document.getDocument', $args);
                  	 	  $document_info = $document_info->data;
                  	 	  if($document_info->uploaded_count > 0 && !preg_match("!<img!is", $document_info->content) ) { 
                  	 	  	 
                  	 	  	 $oFileModel = &getModel('file');
                  	 	  	 $uploaded_file_list = $oFileModel->getFiles($document_srl);
                  	 	  	 
                               if(count($uploaded_file_list)) {
                               	$addPcFileList = array();
       
                                   foreach($uploaded_file_list as $key => $pcfile) {
                                   	 
                                     if($pcfile->direct_download == 'Y' && preg_match("/\.(jpg|png|jpeg|gif)$/i",$pcfile->source_filename) &&  file_exists($pcfile->uploaded_filename) ) {
                                   	 
                                   	$file = $pcfile;
                   						if($mobileex_config->addfile_thumb_use == 'Y'){
                       						// max_thumb
                       						$max_thumb = $oMobileexModel->getFileThumbnail($pcfile->file_srl,$addfile_thumb_size);
                       						if(!$max_thumb) $max_thumb = './modules/editor/tpl/images/files.gif';
                       						$file->max_thumb = $max_thumb;
                       						unset($max_thumb);
                   					   }
                   					   else 	$file->max_thumb =  $pcfile->uploaded_filename;
                   					   array_push($addPcFileList, $file);
                   					  }
                                  }
                                  
                          			// set add pcfile list
                          			 if(count($addPcFileList) > 0)	Context::set('add_pcfile_list',$addPcFileList);
                                  
                             		// addfile view start set
                             		 if($mobileex_config->addfile_btn=='Y') {
                             		 	 if($mobileex_config->addfile_view_type=='F') $addfile_begin_width = '100%';
                             		 	 else $addfile_begin_width = $addfile_min_size.'px';
                             		 }
                             		 else $addfile_begin_width = '100%';
          
                             		 Context::set('addfile_begin_width',$addfile_begin_width);
                               }
                  	 	  }
               	 	 }
               	}
           }

           // addfile_view js load
           if($xe_version > 4) Context::addJsFile("./common/js/jquery.min.js", false, "", -10000001); // 0.6 add
           else Context::addJsFile("./common/js/jquery.js", false, "", -1000001); // 0.6 add

           Context::addJsFile("./modules/mobileex/tpl/js/jquery.rotate.min.2.2.js", false, "", 1000000); // 0.6 add
           Context::addJsFile("./modules/mobileex/tpl/js/mobileex_addfile_view.js", false, "", 1000000);
        } 
        
        
        //여기까지 코멘트수정이 아닌경우 - 즉 게시물보기인경우
        //여기서부턴 코멘트 수정일 겨우
        else {
        	    if($comment_srl) {
            	    $cmt_mobile_check = $oMobileexModel->getMobileComment($comment_srl);
            	    if($cmt_mobile_check->data) $comment_mode = 'M';
                 else $comment_mode = 'P';
        	    } else $comment_mode = 'N';
        	    
        }

    } // 문서정보가 있을경우 끝
    
    
    Context::set('comment_mode',$comment_mode); // 코멘트모드 셋
    Context::set('muploader_active',$muploader_active); //업로더 활성화 정보 셋
    // 모바일 ex 정보를 뿌려주자~~
    
         $oTemplate_ = &TemplateHandler::getInstance();
         $script_code = "<script type=\"text/javascript\">";
         $script_code .= "var addFileUse='".$mobileex_config->addfile_use."';";
          $script_code .= "var addFileAuto='".$mobileex_config->addfile_auto."';";
          $script_code .= "var addfileThumbUse='".$mobileex_config->addfile_thumb_use."';";
          $script_code .= "var addfileBtn='".$mobileex_config->addfile_btn."';";
          $script_code .= "var addfileMinSize='".$addfile_min_size."';";
          if($mobileex_config->addfile_use == 'Y' && count($addFileList) > 0 ){
           // add img
           $output_ = $oTemplate_->compile('./modules/mobileex/tpl', 'addimg_view');
           	$AddFileInfo = "var mobileAddFileInfo='%s';";
           	$script_code .= sprintf($AddFileInfo, trim($output_));
           	unset($output_);
           	
           	// 첨부파일 설정정보를 자바로 변환
           	$afn = 1;
           	$add_file_config_info = "";
           	foreach($addFileList as $key => $add_file) {
           		$add_file_config_info .= "{ 'file_srl' : '".$add_file->file_srl."', 'rotate': '".$add_file->rotate."', 'align' : '".$add_file->align."', 'width' : '".$add_file->width."', 'height' : '".$add_file->height."' }";
           		if($afn < count($addFileList)) $add_file_config_info .= ',';
           	   $afn++;
           	}
           	
           	$script_code .= 'var addfileConfigInfo =['.$add_file_config_info.'];';
           	
          }
          else {
          	$script_code .= 'var addfileConfigInfo =[];';
          	$script_code .= "var mobileAddFileInfo='N';";
          }
          
           if($mobileex_config->pcimg_view == 'Y' && count($addPcFileList) > 0){
         // pc img
           $output_ = $oTemplate_->compile('./modules/mobileex/tpl', 'pcimg_view');
           	$AddPcFileInfo = "var pcAddFileInfo='%s';";
           	$script_code .= sprintf($AddPcFileInfo, trim($output_));
           	unset($output_);
           }
           else $script_code .= "var pcAddFileInfo='N';";
           
        // 코멘트수정코드
        $script_code .= "var cmtModify='".$comment_mode."';";
        $script_code .= " </script>";
        Context::addHtmlFooter($script_code);
        Context::addCssFile('./modules/mobileex/tpl/css/mobileex_addon.css');
        $con = Context::getInstance();

?>
