<?php
    /**
     * The view class of the mobileex module
     * @author COMSIN (comsinnet@naver.com)
     **/
    
    require_once(_XE_PATH_.'modules/mobileex/mobileex.comment.item.php');
    	
    class mobileex extends ModuleObject {

        function moduleInstall() {
            
            $oModuleController = &getController('module');
            // Save the default settings for attachments
           
            $oModuleController->insertModuleConfig('mobileex', $config);
            
            // forward insert
            $oModuleController->insertActionForward('mobileex', 'controller', 'mobileFileUpload');
            $oModuleController->insertActionForward('mobileex', 'controller', 'mobileFileDelete');
            $oModuleController->insertActionForward('mobileex', 'controller', 'mobileInsertAddFile');
            $oModuleController->insertActionForward('mobileex', 'controller', 'mobileDeleteAddFile');   
            
            // trigger trigger
            $oModuleController->insertTrigger('document.insertDocument', 'mobileex', 'controller', 'triggerMobileexInsertDocument', 'after');
            $oModuleController->insertTrigger('document.updateDocument', 'mobileex', 'controller', 'triggerMobileexUpdateDocument', 'after');
            $oModuleController->insertTrigger('document.deleteDocument', 'mobileex', 'controller', 'triggerMobileexDeleteDocument', 'after');
            $oModuleController->insertTrigger('file.deleteFile', 'mobileex', 'controller', 'triggerMobileexDeleteAddFile', 'after');
            $oModuleController->insertTrigger('module.deleteModule', 'mobileex', 'controller', 'triggerMobileexDeleteModule', 'after');

           //mobile integrantion search 2012.12.23
            $oModuleController->insertActionForward('mobileex', 'mobile', 'MEIS');


           // mobile comment check punc - ver 0.4
            $oModuleController->insertTrigger('comment.insertComment', 'mobileex', 'controller', 'triggerMobileexInsertComment', 'after');
            $oModuleController->insertTrigger('comment.updateComment', 'mobileex', 'controller', 'triggerMobileexUpdateComment', 'after');
            $oModuleController->insertTrigger('comment.deleteComment', 'mobileex', 'controller', 'triggerMobileexDeleteComment', 'after');
            
           //mobile member_info - var 0.6
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMemberInfo');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexModifyPassword');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexScrappedDocument');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexSavedDocument');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexOwnDocument');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMessages');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMessageView');
           $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexSendMessage');
           


            return new Object();
        }

        /**
         * Check methoda whether successfully installed
		   * @return bool
       **/
       
        function checkUpdate() 
		  {  
		  	
            $oModuleController = &getController('module');
            $oModuleModel = &getModel('module');
        	   $oDB = &DB::getInstance();

            // forward
            if(!$oModuleModel->getActionForward('mobileFileUpload')) return true;
            if(!$oModuleModel->getActionForward('mobileFileDelete')) return true;
            if(!$oModuleModel->getActionForward('mobileInsertAddFile')) return true;
            if(!$oModuleModel->getActionForward('mobileDeleteAddFile')) return true;
            
            // trigger
            if(!$oModuleModel->getTrigger('document.insertDocument', 'mobileex', 'controller', 'triggerMobileexInsertDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.updateDocument', 'mobileex', 'controller', 'triggerMobileexUpdateDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('document.deleteDocument', 'mobileex', 'controller', 'triggerMobileexDeleteDocument', 'after')) return true;
            if(!$oModuleModel->getTrigger('file.deleteFile', 'mobileex', 'controller', 'triggerMobileexDeleteAddFile', 'after')) return true;
            if(!$oModuleModel->getTrigger('module.deleteModule', 'mobileex', 'controller', 'triggerMobileexDeleteModule', 'after')) return true;
          
           //mobile integrantion search 2012.12.23
            if(!$oModuleModel->getActionForward('MEIS')) return true;
          
           // mobile comment check punc - ver 0.4
            if(!$oModuleModel->getTrigger('comment.insertComment', 'mobileex', 'controller', 'triggerMobileexInsertComment', 'after')) return true;
            if(!$oModuleModel->getTrigger('comment.updateComment', 'mobileex', 'controller', 'triggerMobileexUpdateComment', 'after')) return true;
            if(!$oModuleModel->getTrigger('comment.deleteComment', 'mobileex', 'controller', 'triggerMobileexDeleteComment', 'after')) return true;
    
           //mobile member_info - var 0.6
            if(!$oModuleModel->getActionForward('dispMobileexMemberInfo')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexModifyPassword')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexScrappedDocument')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexSavedDocument')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexOwnDocument')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexMessages')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexMessageView')) return true;
            if(!$oModuleModel->getActionForward('dispMobileexSendMessage')) return true;
            
            //add img var 0.6
            if(!$oDB->isColumnExists("mobileex_add_files","rotate")) return true;
            if(!$oDB->isColumnExists("mobileex_add_files","align")) return true;
            
         return false;
        }

        /**
         * Execute update
		   * @return Object
       **/
       
        function moduleUpdate() 
		    {
			
			   $oModuleController = &getController('module');
			   $oModuleModel = &getModel('module');
        	   $oDB = &DB::getInstance();
         
            // forward insert
            if(!$oModuleModel->getActionForward('mobileFileUpload')) $oModuleController->insertActionForward('mobileex', 'controller', 'mobileFileUpload');
            if(!$oModuleModel->getActionForward('mobileFileDelete')) $oModuleController->insertActionForward('mobileex', 'controller', 'mobileFileDelete');
            if(!$oModuleModel->getActionForward('mobileInsertAddFile')) $oModuleController->insertActionForward('mobileex', 'controller', 'mobileInsertAddFile');
            if(!$oModuleModel->getActionForward('mobileDeleteAddFile')) $oModuleController->insertActionForward('mobileex', 'controller', 'mobileDeleteAddFile');
            
            // trigger trigger
		      if(!$oModuleModel->getTrigger('document.insertDocument', 'mobileex', 'controller', 'triggerMobileexInsertDocument', 'after'))
			      $oModuleController->insertTrigger('document.insertDocument', 'mobileex', 'controller', 'triggerMobileexInsertDocument', 'after');
            if(!$oModuleModel->getTrigger('document.updateDocument', 'mobileex', 'controller', 'triggerMobileexUpdateDocument', 'after'))
              $oModuleController->insertTrigger('document.updateDocument', 'mobileex', 'controller', 'triggerMobileexUpdateDocument', 'after');
            if(!$oModuleModel->getTrigger('document.deleteDocument', 'mobileex', 'controller', 'triggerMobileexDeleteDocument', 'after'))
              $oModuleController->insertTrigger('document.deleteDocument', 'mobileex', 'controller', 'triggerMobileexDeleteDocument', 'after');
            if(!$oModuleModel->getTrigger('file.deleteFile', 'mobileex', 'controller', 'triggerMobileexDeleteAddFile', 'after'))
              $oModuleController->insertTrigger('file.deleteFile', 'mobileex', 'controller', 'triggerMobileexDeleteAddFile', 'after');
            if(!$oModuleModel->getTrigger('module.deleteModule', 'mobileex', 'controller', 'triggerMobileexDeleteModule', 'after'))
              $oModuleController->insertTrigger('module.deleteModule', 'mobileex', 'controller', 'triggerMobileexDeleteModule', 'after');

           //mobile integrantion search 2012.12.23
            if(!$oModuleModel->getActionForward('MEIS')) $oModuleController->insertActionForward('mobileex', 'mobile', 'MEIS');
            
            // mobile comment check punc - ver 0.4
            if(!$oModuleModel->getTrigger('comment.insertComment', 'mobileex', 'controller', 'triggerMobileexInsertComment', 'after'))
              $oModuleController->insertTrigger('comment.insertComment', 'mobileex', 'controller', 'triggerMobileexInsertComment', 'after');
            if(!$oModuleModel->getTrigger('comment.updateComment', 'mobileex', 'controller', 'triggerMobileexUpdateComment', 'after'))
              $oModuleController->insertTrigger('comment.updateComment', 'mobileex', 'controller', 'triggerMobileexUpdateComment', 'after');
            if(!$oModuleModel->getTrigger('comment.deleteComment', 'mobileex', 'controller', 'triggerMobileexDeleteComment', 'after'))
              $oModuleController->insertTrigger('comment.deleteComment', 'mobileex', 'controller', 'triggerMobileexDeleteComment', 'after');

            //mobile member_info - var 0.6
             if(!$oModuleModel->getActionForward('dispMobileexMemberInfo')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMemberInfo');
             if(!$oModuleModel->getActionForward('dispMobileexModifyPassword')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexModifyPassword');
             if(!$oModuleModel->getActionForward('dispMobileexScrappedDocument')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexScrappedDocument');
             if(!$oModuleModel->getActionForward('dispMobileexSavedDocument')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexSavedDocument');
             if(!$oModuleModel->getActionForward('dispMobileexOwnDocument')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexOwnDocument');
             if(!$oModuleModel->getActionForward('dispMobileexMessages')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMessages');
             if(!$oModuleModel->getActionForward('dispMobileexMessageView')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexMessageView');
             if(!$oModuleModel->getActionForward('dispMobileexSendMessage')) $oModuleController->insertActionForward('mobileex', 'mobile', 'dispMobileexSendMessage');

            //add img var 0.6
             if(!$oDB->isColumnExists("mobileex_add_files","rotate")) $oDB->addColumn("mobileex_add_files", "rotate", "varchar", 5, "0");
		       if(!$oDB->isColumnExists("mobileex_add_files","align")) $oDB->addColumn('mobileex_add_files',"align","char",6,"center");


            return new Object(0, 'success_updated');
          }

        /**
         * Re-generate the cache file
         * @return void
         **/
        function recompileCache() {
        }
    }
?>
