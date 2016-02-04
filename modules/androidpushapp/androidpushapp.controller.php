<?php
class androidpushappController extends androidpushapp
{

	// 기기를 등록하기 위해 필요한 장치입니다.
	function procAndroidpushappRegIn(){

		$vars = Context::getRequestVars();
		$reg_id = strip_tags($vars->reg_id);
		$sort = strip_tags($vars->sort);
		
		$args = new stdClass();
		$args->reg_id = $reg_id;

		$r = executeQueryArray("androidpushapp.getgcmbyid", $args);
		
		if(isset($r->data[0])){
			$args = new stdClass();
			$args->last_login = date('YmdHis');
			$args->reg_id = $reg_id;
			$output = executeQuery("androidpushapp.updateLast", $args);
			if(!$output->toBool()) return $output;			
		}

		$args = new stdClass();		
		$args->regdate = date('YmdHis');
		$args->reg_id = $reg_id;
		$args->sort = $sort;
		$args->setting = "true-true-false-false-false-true-false";

		$output = executeQuery("androidpushapp.insertDevice", $args);
		if(!$output->toBool()) return $output;
		
	}		

	// 기기를 회원정보와 동기화 하기 위해 필요한 장치입니다.
	function procAndroidpushappSync(){		

		$vars = Context::getRequestVars();		
		$reg_id = strip_tags($vars->reg_id);				
		
		$args = new stdClass();		
		$args->member_srl = $vars->member_srl;
		$args->reg_id = $reg_id;		
		if($vars->setting) $args->setting = $vars->setting;

		$output = executeQuery("androidpushapp.updateDevice", $args);
		if(!$output->toBool()) return $output;
		
	}

	// 기기의 설정 동기화 하기 위해 필요한 장치입니다.
	function procAndroidpushappSyncSetting(){

		$vars = Context::getRequestVars();		
		$reg_id = strip_tags($vars->reg_id);
		$setting_push = strip_tags($vars->setting);
		$setting_board = strip_tags($vars->setting_board);
		
		$args = new stdClass();	
		$args->reg_id = $reg_id;
		$args->setting = $setting_push;
		$args->setting_board = $setting_board;

		$output = executeQuery("androidpushapp.updateSetting", $args);
		if(!$output->toBool()) return $output;
		
	}
	

	function triggerAfterInsertDocument(&$obj)
	{		

		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();
		if($config->use != 'Y') return new Object();
		if($config->use_d != 'Y') return new Object();
		if($obj->status == 'TEMP') return new Object();					
		
		if(in_array($obj->module_srl, $config->no_use_module_srls)) return;

		$module=$obj->module_srl;		
		$document_srl = $obj->document_srl;
		$oDocumentModel = getModel('document');
		$oModuleModel = getModel('module');			
		$oDocument = $oDocumentModel->getDocument($document_srl);
		$module_info = $oModuleModel->getModuleInfoByDocumentSrl($document_srl);

		if($module_info->module != 'board' && $module_info->module != 'resource') return new Object();		

		$board_title = $module_info->browser_title;
		$oMemberModel = getModel('member');

		if($oMemberModel->isLogged()){
			$logged_info = Context::get('logged_info');
			$member_srl = $logged_info->member_srl;
		}else{
			$member_srl = "none";
		}
		
		$dmember_srl=$member_srl;
		$cmember_srl="none";
		$ccmember_srl="none";

		$title_gcm=cut_str(strip_tags($obj->title), 200);
		$address_gcm=$obj->document_srl;
		$name_gcm=$obj->nick_name;
		$message_gcm = $title_gcm."(".$name_gcm.")";
		
		$sort_gcm = 1;
		$func="normal";
		if($obj->is_secret == 'Y' || $obj->status == 'SECRET') $func="secret";
		if(in_array($obj->module_srl, $config->only_admin_push_module_srls)) $func="counsel";				
		
		$type="Document";
		$this->pushprocessor($type,$board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);

		return new Object();
	}

	function triggerAfterInsertComment(&$obj)
	{		

		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();
		if($config->use != 'Y') return new Object();
		if($config->use_c != 'Y') return new Object();

		if(in_array($obj->module_srl, $config->no_use_module_srls)) return;			
		
		$oDocumentModel = getModel('document');
		$oModuleModel = getModel('module');
		$document_srl = $obj->document_srl;
		$comment_srl = $obj->comment_srl;
		$module= $obj->module_srl;

		$oDocument = $oDocumentModel->getDocument($document_srl);

		$module_info = $oModuleModel->getModuleInfoByDocumentSrl($document_srl);
		if($module_info->module != 'board' && $module_info->module != 'resource') return new Object();		

		$board_title = $module_info->browser_title;			
		$content = $obj->content;
		$comment_count = $oDocument->get('comment_count');
		$member_srl = $oDocument->get('member_srl');

		if(!$member_srl) {			
			$member_srl = "none";
		}

		$oMemberModel = getModel('member');

		if($oMemberModel->isLogged()){
			$logged_info = Context::get('logged_info');
			$member_srl_w = $logged_info->member_srl;
		}else{
			$member_srl_w = "none";
		}

		$dmember_srl = $member_srl;
		$cmember_srl = $member_srl_w;

		if($comment_count>1){
			$args = new stdClass();			
			$args->document_srl=$document_srl;			
			$output = executeQueryArray('comment.getAllComments',$args);
			foreach($output->data as $data){
				$cmember_srl.="-".$data->member_srl;
			}
		}

		$parent_srl = $obj->parent_srl;
		
		if($parent_srl){

			$oCommentModel = getModel('comment');
			$oComment = $oCommentModel->getComment($parent_srl);
			$ccmember_srl = $oComment->member_srl;			
			
		}else{
			
			$ccmember_srl = "none";
		}

		$title_gcm=cut_str(strip_tags($content), 200);
		if($parent_srl){
			$address_gcm=$document_srl."#comment_".$parent_srl;
		}else{
			$address_gcm=$document_srl."#comment_".$comment_srl;
		}
		$name_gcm=$obj->nick_name;
		$message_gcm = $title_gcm."(".$name_gcm.")";
	
		
		$type="Comment";		

		$sort_gcm=2;
		$func="normal";
		if($parent_srl){
			if($obj->is_secret == 'Y'){	
				$func = "secret_son";
			}else{
				$func = "son";
			}		
			
		}else{
			if($obj->is_secret == 'Y'){	
				$func = "secret";
			}			
		}		

		if(in_array($obj->module_srl, $config->only_admin_push_module_srls)) $func = "counsel";
	
		
		$this->pushprocessor($type,$board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);			
		return new Object();
	}

	function triggerAfterSendMessage(&$trigger_obj)
	{
		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();
		if($config->use != 'Y') return new Object();
		if($config->use_m != 'Y') return new Object();		
		$dmember_srl=$trigger_obj->receiver_srl;
		$oMemberModel = getModel('member');
		$member_info = $oMemberModel->getMemberInfoByMemberSrl($trigger_obj->sender_srl);
		$name_gcm=$member_info->nick_name;
		$title_gcm=cut_str(strip_tags($trigger_obj->title), 200);

		$address_gcm = $trigger_obj->related_srl;			
		
		$message_gcm = $title_gcm."(".$name_gcm.")";
		
		$type="Message";
		$board_title="쪽지";		
		$cmember_srl='none';
		$ccmember_srl='none';
		$module="none";
		$func="none";
		$sort_gcm=3;
		$this->pushprocessor($type,$board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);
		
	}	

	function pushprocessor($type,$board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func){

		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();	
		unset($output);
		unset($output2);
		unset($output3);
		$send_title="";
		$send_title2="";
		$send_title3="";
		
		switch ($sort_gcm){
			case 1 :

				if($func == "normal"){					
					$output = executeQueryArray('androidpushapp.getgcm');
				}elseif($func == "secret" || $func == "counsel"){
					$args = new stdClass();
					$args->module_srl=$module;
					$output = executeQueryArray('androidpushapp.getModuleAdmin',$args);
					if(!$output->data){
						$args = new stdClass();				
						$args->is_admin = "Y";
						$output = executeQueryArray('androidpushapp.getAdminReg',$args);				
					}
				}				
				break;

			case 2 :
				
				if($func == "normal" || $func == "son"){					
					$output = executeQueryArray('androidpushapp.getgcm');									
				}elseif($func == "counsel"){
					$args = new stdClass();
					$args->module_srl=$module;
					$output = executeQueryArray('androidpushapp.getModuleAdmin',$args);
					if(!$output->data){
						$args = new stdClass();				
						$args->is_admin = "Y";
						$output = executeQueryArray('androidpushapp.getAdminReg',$args);				
					}			

				}elseif($func == "secret"){
					$args = new stdClass();
					$args->module_srl=$module;
					$output = executeQueryArray('androidpushapp.getModuleAdmin',$args);
					if(!$output->data){
						$args = new stdClass();				
						$args->is_admin = "Y";
						$output = executeQueryArray('androidpushapp.getAdminReg',$args);				
					}
					$cond = new stdClass();
					$cond->member_srl=$dmember_srl;					
					$output2 = executeQueryArray('androidpushapp.getgcmbymem',$cond);

				}elseif($func == "secret_son"){
					$args = new stdClass();
					$args->module_srl=$module;
					$output = executeQueryArray('androidpushapp.getModuleAdmin',$args);
					if(!$output->data){
						$args = new stdClass();				
						$args->is_admin = "Y";
						$output = executeQueryArray('androidpushapp.getAdminReg',$args);				
					}
					$cond = new stdClass();
					$cond->member_srl=$dmember_srl;					
					$output2 = executeQueryArray('androidpushapp.getgcmbymem',$cond);
					$cond = new stdClass();
					$cond->member_srl=$ccmember_srl;			
					$output3 = executeQueryArray('androidpushapp.getgcmbymem',$cond);
				}
				break;

			case 3 :
				$cond = new stdClass();
				$cond->member_srl=$dmember_srl;
				$output = executeQueryArray('androidpushapp.getgcmbymem',$cond);				
				break;
				
			case 4 :
				$args = new stdClass();				
				$args->is_admin = "Y";
				$output = executeQueryArray('androidpushapp.getAdminReg',$args);				
				break;
			
		}

		$send_title = $this->notify($output, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);

		if($output2->data) $send_title2 = $this->notify($output2, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);

		if($output3->data) $send_title3 = $this->notify($output3, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func);

		$args = new stdClass();

		switch ($sort_gcm){
			case 1 :
				$args->target_url = getNotEncodedFullUrl('', 'document_srl', $address_gcm);
				break;

			case 2:
				$args->target_url = getNotEncodedFullUrl('', 'document_srl', $address_gcm);
				break;

			case 3:
				$args->target_url = getUrl('act','dispAndroidpushappAdminList');
				break;
				
			case 4:
				$args->target_url = getUrl('act','dispAndroidpushappAdminList');
				break;			
		}
		
		$args->target_title = $message_gcm;		
		$args->type = $type;
		$args->push_date = date('YmdHis');
		$args->text = $send_title.$send_title2.$send_title3;
		$args->target_browser = $board_title;
		$args->pushid = md5(date('YmdHis'));
		$output = executeQuery('androidpushapp.insertPush', $args);
		if(!$output->toBool())
		{
			return $output;
		}
	}

	function notify ($output, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$module,$func){
		
		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();

		$api_key_1 = $config->api_key;
		$api_key_2 = $config->api_key2;

		$i=0;			
		$gcmRegIdsW = array();		
		$gcmRegIdsB = array();			


		foreach($output->data as $data){

			$i++;
			$die=false;
			if($data->setting_board && $module!="none"){				
				$setting_board_arr1 = explode("/-",$data->setting_board);
				foreach($setting_board_arr1 as $key){
					$setting_board_arr2 = explode("&#",$key);
					if($setting_board_arr2[1]=="false" && $module==$setting_board_arr2[0]) $die=true;
				}
			}
			if($die) continue;

			if($data->setting){
				$setting = explode("-",$data->setting);
				if($sort_gcm == 1){

					if($data->member_srl == $dmember_srl){
						continue;
					}
					if($setting[0] == "false" && $func != "counsel"){
						continue;
					}				
				
				}elseif($sort_gcm == 2){
					$cmem = explode("-",$cmember_srl);

					if($data->member_srl == $cmem[0]){
						continue;
					}
					$boolean_continue = true;
					if($setting[1] == "true" || $func == "counsel"){
						$boolean_continue = false;
					}else{
						if($setting[2] == "true"){
							if($data->member_srl == $dmember_srl){
								$boolean_continue = false;
							}
						}

						if($setting[3] == "true"){
							if($data->member_srl == $ccmember_srl){
								$boolean_continue = false;
							}
						}

						if($setting[4] == "true"){
							for($tt=0;$tt<sizeof($cmem);$tt++){
								if($data->member_srl == $cmem[$tt]){
									$boolean_continue = false;
								}
							}
						}
					}
					if($boolean_continue){
						continue;
					}
				}elseif($sort_gcm =="3"){					
					if($setting[6] == "false"){
						continue;
					}
				}
			}

			if($data->sort == 'W'){
				$gcmRegIdsW[floor($i/1000)][] = $data->reg_id;
			}elseif($data->sort =='B'){
				$gcmRegIdsB[floor($i/1000)][] = $data->reg_id;
			}			
			
		}
		
		$send_title="";	
		
		if($config->sort_v == 'W' || $config->sort_v == 'WB'){
			$f=1;				
			
			foreach($gcmRegIdsW as $val){

				unset($gcm_result);
				unset($remove_ids);			
				
				$gcm_result = $this->sendPushNotification($val, $board_title, $message_gcm,$dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$api_key_1);
				$jsonArray = json_decode($gcm_result);
				$success_send = $jsonArray->success;
				$error_ids = $jsonArray->failure;
				$canonical_ids = $jsonArray->canonical_ids;
				$total_ids = count($jsonArray->results);

				if(!empty($jsonArray->results)){

					$remove_ids = array();					
					$m=0;

					foreach($jsonArray->results as $key3){

						if(isset($key3->error)){

							if($key3->error == "NotRegistered"){ 
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "InvalidRegistration"){
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "Unavailable"){
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "MismatchSenderId"){
								array_push($remove_ids, $val[$m]);
							}
							
						}

						if(isset($key3->registration_id)) {
							array_push($remove_ids, $val[$m]);
						}

						$m++;

					}						

					if(!empty($remove_ids)){						

						foreach($remove_ids as $val55){							
							$del_reg->reg_id = $val55;
							executeQuery('androidpushapp.deletegcm', $del_reg);
						}
						
					}					
					
					$total_del = $error_ids+$canonical_ids;										
					$send_title .= "웹뷰".$f."번째 발송건 : ".$total_ids."명 발송 요청 중 ".$success_send."명 발송 성공, ".$error_ids."명 에러, ".$canonical_ids."명 중복, ".$total_del."명 삭제<br><br>";					
				}

				$f++;
				
			}
		}

		if($config->sort_v == 'B' || $config->sort_v == 'WB'){

			$g=1;

			foreach($gcmRegIdsB as $val){

				unset($gcm_result);
				unset($remove_ids);			
				
				$gcm_result = $this->sendPushNotification($val, $board_title, $message_gcm,$dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$api_key_2);
				$jsonArray = json_decode($gcm_result);
				$success_send = $jsonArray->success;
				$error_ids = $jsonArray->failure;
				$canonical_ids = $jsonArray->canonical_ids;
				$total_ids = count($jsonArray->results);

				if(!empty($jsonArray->results)){

					$remove_ids = array();					
					$m=0;

					foreach($jsonArray->results as $key3){

						if(isset($key3->error)){

							if($key3->error == "NotRegistered"){
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "InvalidRegistration"){
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "Unavailable"){
								array_push($remove_ids, $val[$m]);
							}
							if($key3->error == "MismatchSenderId"){
								array_push($remove_ids, $val[$m]);
							}
						}

						if(isset($key3->registration_id)) {
							array_push($remove_ids, $val[$m]);
						}
						$m++;
					}						

					if(!empty($remove_ids)){					

						foreach($remove_ids as $val55){
							$del_reg->reg_id = $val55;
							executeQuery('androidpushapp.deletegcm', $del_reg);
						}						
					}					
					
					$total_del = $error_ids+$canonical_ids;										
					$send_title .= "웹브라우저".$g."번째 발송건 : ".$total_ids."명 발송 요청 중 ".$success_send."명 발송 성공, ".$error_ids."명 에러, ".$canonical_ids."명 중복, ".$total_del."명 삭제<br><br>";					
				}

				$g++;
				
			}
		}
		return $send_title;
	}

	public function triggerBeforeDisplay(&$output)
	{
		$logged_info = Context::get('logged_info');
		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();
		
		$args = new stdClass();
		$args->module = "resource";
		$output_c_resource = executeQuery('androidpushapp.getAModuleCount', $args);
		
		$output_b = executeQueryArray('board.getBoardList', $args);
		$setting_board = "";		

		if($output_c_resource->data->count){
			$output_a = executeQueryArray('androidpushapp.getAResourceList', $args);

			foreach($output_a->data as $data){
				if(in_array($data->module_srl, $config->no_use_module_srls) || in_array($data->module_srl, $config->only_admin_push_module_srls)){
				}else{					

					if(preg_match("/XEPUSH/",$_SERVER['HTTP_USER_AGENT'])){
						if($setting_board==""){
							$setting_board = $data->browser_title."&#".$data->module_srl;
						}else{
							$setting_board = $setting_board."/-".$data->browser_title."&#".$data->module_srl;
						}
					}else{
						if($setting_board==""){
							$setting_board = $data->browser_title."k324elv23ul234oenf".$data->module_srl;
						}else{
							$setting_board = $setting_board."fo034kfk0ev0kr4feldkfjsdkaj".$data->browser_title."k324elv23ul234oenf".$data->module_srl;
						}
					}					
				}
			}
		}

		foreach($output_b->data as $data){
			if(in_array($data->module_srl, $config->no_use_module_srls) || in_array($data->module_srl, $config->only_admin_push_module_srls)){
			}else{				
				
				if(preg_match("/XEPUSH/",$_SERVER['HTTP_USER_AGENT'])){
					if($setting_board==""){
						$setting_board = $data->browser_title."&#".$data->module_srl;
					}else{
						$setting_board = $setting_board."/-".$data->browser_title."&#".$data->module_srl;
					}
				}else{
					if($setting_board==""){
						$setting_board = $data->browser_title."k324elv23ul234oenf".$data->module_srl;
					}else{
						$setting_board = $setting_board."fo034kfk0ev0kr4feldkfjsdkaj".$data->browser_title."k324elv23ul234oenf".$data->module_srl;
					}
				}				
			}
		}

		if(preg_match("/XEPUSH/",$_SERVER['HTTP_USER_AGENT'])){
			if($logged_info->member_srl){
				$htmlCode = '<script>
					function callAndroid(){		
						window.myJs.callAndroid("%d","%s","%s");
					}

					function callAndroid_login(){		
						window.myJs_login.callAndroid_login("true");
					}
					</script>';
				$htmlCode = sprintf($htmlCode, $logged_info->member_srl,$logged_info->nick_name,$setting_board);
					
			}else{

				$htmlCode = '<script>
					function callAndroid(){		
						window.myJs.callAndroid(null,null,"%s");
					}

					function callAndroid_login(){		
						window.myJs_login.callAndroid_login("false");
					}					
					</script>';				
				$htmlCode = sprintf($htmlCode, $setting_board);
			}
			Context::addHtmlHeader($htmlCode);
		}elseif($config->sort_v == "B"||$config->sort_v == "WB"){			
			
			$package=$config->package;
			$p_name = explode(".",$package);
			$num_app = sizeof($p_name)-1;
			$appname=$p_name[$num_app];

			if($logged_info->member_srl){
				$htmlCode = '<style type="text/css">#xepushapp {display : block;}</style>				
				<script language="JavaScript">

				function checkApplicationInstall() { 

				 var userAgent = navigator.userAgent;
				 var visitedAt = (new Date()).getTime();

				 if (userAgent.match(/Chrome/)) {
						 
						 setTimeout(function() {
							  location.href = "intent://Setting?member_srl='.$logged_info->member_srl.'&nick_name='.$logged_info->nick_name.'&boardset='.$setting_board.'#Intent;scheme='.$appname.';package='.$package.';end";
						 }, 100);
					} else {
						
						setTimeout(
						   function() {
							  if ((new Date()).getTime() - visitedAt < 200) {
								 location.href = "market://details?id='.$package.'";
							  }
						  }, 50);

						  var iframe = document.createElement("iframe");
						  iframe.style.visibility = "hidden";
						  iframe.src = "'.$appname.'://Setting?member_srl='.$logged_info->member_srl.'&nick_name='.$logged_info->nick_name.'&boardset='.$setting_board.'";
						  document.body.appendChild(iframe);
						  document.body.removeChild(iframe); 
					 }
				}

				</script>';
				
					
			}else{

				$htmlCode = '<style type="text/css">#xepushapp {display : block;}</style>
				<script language="JavaScript">

				function checkApplicationInstall() {

				 var userAgent = navigator.userAgent;
				 var visitedAt = (new Date()).getTime();

				 if (userAgent.match(/Chrome/)) {
						 
						 setTimeout(function() {
							  location.href = "intent://Setting?boardset='.$setting_board.'#Intent;scheme='.$appname.';package='.$package.';end";
						 }, 100);
					} else {
						
						setTimeout(
						   function() {
							  if ((new Date()).getTime() - visitedAt < 200) {
								 location.href = "market://details?id='.$package.'";
							  }
						  }, 50);

						  var iframe = document.createElement("iframe");
						  iframe.style.visibility = "hidden";
						  iframe.src = "'.$appname.'://Setting?boardset='.$setting_board.'";
						  document.body.appendChild(iframe);
						  document.body.removeChild(iframe); 
					 }
				}

				</script>';				
			}
			Context::addHtmlHeader($htmlCode);			
		}			
	}

	function sendPushNotification($devices, $board_title, $message_gcm, $dmember_srl, $cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$api_key) {

		if(is_array($devices)){
			$devices=$devices;
		}else{
			$devices=array($devices);
		}

								
		$url_gcm = 'https://android.googleapis.com/gcm/send';
		$fields_gcm = array(
			'registration_ids'  => $devices,
			'data'=> array( "board" => $board_title, "message" => $message_gcm, "dmember" => $dmember_srl, "cmember" => $cmember_srl, "ccmember" => $ccmember_srl, "sort" => $sort_gcm, "address" => $address_gcm),
		);		
		$headers_gcm = array(
			'Authorization: key=' . $api_key,
			'Content-Type: application/json'
		);
		
		$ch_gcm = curl_init();
		curl_setopt($ch_gcm, CURLOPT_URL, $url_gcm);
		curl_setopt($ch_gcm, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch_gcm, CURLOPT_POST, true );
		curl_setopt($ch_gcm, CURLOPT_HTTPHEADER, $headers_gcm);
		curl_setopt($ch_gcm, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($ch_gcm, CURLOPT_POSTFIELDS, json_encode( $fields_gcm ) );	

		// Execute post
		$result33 = curl_exec($ch_gcm);
		// Close connection
		curl_close($ch_gcm);
		return $result33;

	}

	function procAndroidpushappFiledown(){
		$vars = Context::getRequestVars();		
		$file_srl = strip_tags($vars->file_srl);
		$sid = strip_tags($vars->sid);		

		$logged_info = Context::get('logged_info');

		$oFileModel = getModel('file');
		
		// Get file information from the DB
		$columnList = array('file_srl', 'sid', 'isvalid', 'source_filename', 'module_srl', 'uploaded_filename', 'file_size', 'member_srl', 'upload_target_srl', 'upload_target_type');
		$file_obj = $oFileModel->getFile($file_srl, $columnList);

		// If the requested file information is incorrect, an error that file cannot be found appears
		if($file_obj->file_srl!=$file_srl || $file_obj->sid!=$sid) return $this->stop('msg_file_not_found');

		// Notify that file download is not allowed when standing-by(Only a top-administrator is permitted)
		if($logged_info->is_admin != 'Y' && $file_obj->isvalid!='Y') return $this->stop('msg_not_permitted_download');

		$filename = $file_obj->source_filename;
		$file_size = $file_obj->file_size;
		$uploaded_filename = $file_obj->uploaded_filename;		
		$file_module_config = $oFileModel->getFileModuleConfig($file_obj->module_srl);
		// Not allow the file outlink
		if($file_module_config->allow_outlink == 'N')
		{
			// Handles extension to allow outlink
			if($file_module_config->allow_outlink_format)
			{
				$allow_outlink_format_array = array();
				$allow_outlink_format_array = explode(',', $file_module_config->allow_outlink_format);
				if(!is_array($allow_outlink_format_array)) $allow_outlink_format_array[0] = $file_module_config->allow_outlink_format;

				foreach($allow_outlink_format_array as $val)
				{
					$val = trim($val);
					if(preg_match("/\.{$val}$/i", $filename))
					{
						$file_module_config->allow_outlink = 'Y';
						break;
					}
				}
			}
			// Sites that outlink is allowed
			if($file_module_config->allow_outlink != 'Y')
			{
				$referer = parse_url($_SERVER["HTTP_REFERER"]);
				if($referer['host'] != $_SERVER['HTTP_HOST'])
				{
					if($file_module_config->allow_outlink_site)
					{
						$allow_outlink_site_array = array();
						$allow_outlink_site_array = explode("\n", $file_module_config->allow_outlink_site);
						if(!is_array($allow_outlink_site_array)) $allow_outlink_site_array[0] = $file_module_config->allow_outlink_site;

						foreach($allow_outlink_site_array as $val)
						{
							$site = parse_url(trim($val));
							if($site['host'] == $referer['host'])
							{
								$file_module_config->allow_outlink = 'Y';
								break;
							}
						}
					}
				}
				else $file_module_config->allow_outlink = 'Y';
			}
			if($file_module_config->allow_outlink != 'Y') return $this->stop('msg_not_allowed_outlink');
		}

		// Check if a permission for file download is granted
		$downloadGrantCount = 0;
		if(is_array($file_module_config->download_grant))
		{
			foreach($file_module_config->download_grant AS $value)
				if($value) $downloadGrantCount++;
		}/*

		if(is_array($file_module_config->download_grant) && $downloadGrantCount>0)
		{
			$oMemberModel = getModel('member');
			if(!$oMemberModel->isLogged()) return $this->stop('msg_not_permitted_download');
			
			
			if($logged_info->is_admin != 'Y')
			{				
				$columnList = array('module_srl', 'site_srl');
				$module_info = $oModuleModel->getModuleInfoByModuleSrl($file_obj->module_srl, $columnList);

				if(!$oModuleModel->isSiteAdmin($logged_info, $module_info->site_srl))
				{
					
					$member_groups = $oMemberModel->getMemberGroups($logged_info->member_srl, $module_info->site_srl);

					$is_permitted = true;
					for($i=0;$i<count($file_module_config->download_grant);$i++)
					{
						$group_srl = $file_module_config->download_grant[$i];
						if($member_groups[$group_srl])
						{
							$is_permitted = true;
							break;
						}
					}
					if(!$is_permitted) return $this->stop('msg_not_permitted_download');
				}
			}
		}*/

	
		// Call a trigger (before)
		$output = ModuleHandler::triggerCall('file.downloadFile', 'before', $file_obj);
		if(!$output->toBool()) return $this->stop(($output->message)?$output->message:'msg_not_permitted_download');


		// 다운로드 후 (가상)
		// Increase download_count
		$args = new stdClass();
		$args->file_srl = $file_srl;
		executeQuery('file.updateFileDownloadCount', $args);
		// Call a trigger (after)
		$output = ModuleHandler::triggerCall('file.downloadFile', 'after', $file_obj);

		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE || (strpos($_SERVER['HTTP_USER_AGENT'], 'Windows') !== FALSE && strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE && strpos($_SERVER['HTTP_USER_AGENT'], 'rv:') !== FALSE))
		{
			$filename = rawurlencode($filename);
			$filename = preg_replace('/\./', '%2e', $filename, substr_count($filename, '.') - 1);
		}

		Context::close();

		$fp = fopen($uploaded_filename, 'rb');
		if(!$fp) return $this->stop('msg_file_not_found');

		header("Cache-Control: ");
		header("Pragma: ");
		header("Content-Type: application/octet-stream");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

		header("Content-Length: " .(string)($file_size));
		header('Content-Disposition: attachment; filename="'.$filename.'"');
		header("Content-Transfer-Encoding: binary\n");

		// if file size is lager than 10MB, use fread function (#18675748)
		if(filesize($uploaded_filename) > 1024 * 1024)
		{
			while(!feof($fp)) echo fread($fp, 1024);
			fclose($fp);
		}
		else
		{
			fpassthru($fp);
		}

		exit();

	}	

	function procAndroidpushappPush(){

		$die_web=true;
		$die_b=true;

		$var = Context::getRequestVars();
		$link = $var->link;
		if(!$link){
			$address_gcm="index.php";
		}else{			
			$address_gcm=$link;			
		}

		$message = $var->message;
		$title = $var->title;
		$reg_idsw = $var->reg_idsw;
		if(!$reg_idsw) $die_web=false;
		$regw = json_encode($reg_idsw);
		$reg_idsw = json_decode($regw);

		$reg_idsb = $var->reg_idsb;
		if(!$reg_idsb) $die_b=false;
		$regb = json_encode($reg_idsb);
		$reg_idsb = json_decode($regb);

		$oAndroidpushappModel = getModel('androidpushapp');
		$config = $oAndroidpushappModel->getConfig();

		$api_key_1 = $config->api_key;
		$api_key_2 = $config->api_key2;

		$board_title=$title;
		$dmember_srl="false";
		$cmember_srl="false";
		$ccmember_srl="false";
		$message_gcm=$message;
		
		$sort_gcm = 11;
		$type="push";

		$send_title = '';
		
		if($config->sort_v == 'W' || $config->sort_v == 'WB'){
			if($die_web){

				unset($gcm_result);
				unset($remove_ids);			
				
				$gcm_result = $this->sendPushNotification($reg_idsw, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$api_key_1);				
				$jsonArray = json_decode($gcm_result);
				$success_send = $jsonArray->success;
				$error_ids = $jsonArray->failure;
				$canonical_ids = $jsonArray->canonical_ids;
				$total_ids = count($jsonArray->results);

				if(!empty($jsonArray->results)){

					$remove_ids = array();					
					$m=0;

					foreach($jsonArray->results as $key3){
						if(isset($key3->error)){
							if($key3->error == "NotRegistered"){
								array_push($remove_ids, $reg_idsw[$m]);
							}
							if($key3->error == "InvalidRegistration"){
								array_push($remove_ids, $reg_idsw[$m]);
							}
							if($key3->error == "Unavailable"){
								array_push($remove_ids, $reg_idsw[$m]);
							}
							if($key3->error == "MismatchSenderId"){
								array_push($remove_ids, $reg_idsw[$m]);
							}
						}

						if(isset($key3->registration_id)) {
							array_push($remove_ids, $reg_idsw[$m]);
						}
						$m++;
					}						

					if(!empty($remove_ids)){
						foreach($remove_ids as $val55){						
							$del_reg->reg_id = $val55;
							executeQuery('androidpushapp.deletegcm', $del_reg);
						}					
					}					
					
					$total_del = $error_ids+$canonical_ids;										
					$send_title .= "웹뷰버전 발송건 : ".$total_ids."명 발송 요청 중 ".$success_send."명 발송 성공, ".$error_ids."명 에러, ".$canonical_ids."명 중복, ".$total_del."명 삭제<br><br>";					
				}
			}
			
		}

		if($config->sort_v == 'B' || $config->sort_v == 'WB'){
			if($die_b){
			
				unset($gcm_result);
				unset($remove_ids);			
				
				$gcm_result = $this->sendPushNotification($reg_idsb, $board_title, $message_gcm, $dmember_srl,$cmember_srl,$ccmember_srl,$sort_gcm, $address_gcm,$api_key_2);
				$jsonArray = json_decode($gcm_result);
				$success_send = $jsonArray->success;
				$error_ids = $jsonArray->failure;
				$canonical_ids = $jsonArray->canonical_ids;
				$total_ids = count($jsonArray->results);

				if(!empty($jsonArray->results)){

					$remove_ids = array();					
					$m=0;

					foreach($jsonArray->results as $key3){
						if(isset($key3->error)){
							if($key3->error == "NotRegistered"){
								array_push($remove_ids, $reg_idsb[$m]);
							}
							if($key3->error == "InvalidRegistration"){
								array_push($remove_ids, $reg_idsb[$m]);
							}
							if($key3->error == "Unavailable"){
								array_push($remove_ids, $reg_idsb[$m]);
							}
							if($key3->error == "MismatchSenderId"){
								array_push($remove_ids, $reg_idsb[$m]);
							}
						}
						if(isset($key3->registration_id)) {
							array_push($remove_ids, $reg_idsb[$m]);
						}
						$m++;
					}						

					if(!empty($remove_ids)){
						foreach($remove_ids as $val55){						
							$del_reg->reg_id = $val55;
							executeQuery('androidpushapp.deletegcm', $del_reg);
						}					
					}					
					
					$total_del = $error_ids+$canonical_ids;										
					$send_title .= "웹브라우저 호출 버전 발송건 : ".$total_ids."명 발송 요청 중 ".$success_send."명 발송 성공, ".$error_ids."명 에러, ".$canonical_ids."명 중복, ".$total_del."명 삭제<br><br>";					
				}
			}
		}

		$args = new stdClass();
		$args->target_title = "Push";		
		$args->type = $type;		
		$args->target_url = getUrl('act','dispAndroidpushappAdminList');	
		$args->push_date = date('YmdHis');
		$args->text = $send_title;
		$args->target_browser = $board_title;
		$args->pushid = md5(date('YmdHis'));
		$output = executeQuery('androidpushapp.insertPush', $args);
		if(!$output->toBool())
		{
			return $output;
		}

		$returnUrl = Context::get('success_return_url') ? Context::get('success_return_url') : getNotEncodedUrl('', 'module', 'admin', 'act', 'dispAndroidpushappAdminRegId');
		$this->setRedirectUrl($returnUrl);
	}	
}


