<?php
    /**
     * @file   aroundmap.controller.php
     * @class  aroundmap
     * @author ChoiHeeChul, KimJinHwan, ParkSunYoung
     * @brief  Controller class of Aroundmap module
     **/

    class aroundmapController extends aroundmap {
	/// aroundmap 모듈의 옵션값
	var $module_config = null;
        /**
         * @brief 초기화 
         **/
        function init() {
	    
	}
	
	/**
	 * @brief xe 게시판 템플릿(입력,수정폼,보기)에 주변지도모듈을 삽입한다.
	 * @param $content 삽입할 게시판의 컨텐츠
	 * @return 
	 */
	function triggerAroundmapInsert(&$content) {
	    // 현재의 액션/모듈번호 값 가져오기
	    $act = Context::get('act');
	    $module_info = Context::get("module_info");
	    $module_srl = $module_info->module_srl;
	    
	    $oModuleModel = &getModel('module');
	    $this->module_config = $oModuleModel->getModuleConfig('aroundmap');
	    
	    // aroundmap모듈이 사용가능한 상태 인지 확인
	    if( !$this->isAroundmapEnable($act, $module_srl) ) return new Object();
	    
	    // aroundmap모듈에 필요한 값 저장
	    $document_srl = Context::get( 'document_srl' );
	    $output = $this->setAroundmapValues($document_srl);
	    
	    // 템플릿 파일에 aroundmap 모듈 삽입
	    if ($act == 'dispBoardWrite') {	// 쓰기/수정 페이지
		$content = preg_replace_callback('(<!-- 파일 업로드 영역 -->)','aroundmapController::insertWriteMap',$content);
	    } else {	// 보기 페이지
		// Use Sphinx if useSphinx is checked, or use mysql.
		if (strcmp($this->module_config->useSphinx, 'true') == 0) {
		    $aroundmapList = $this->getAroundmapListSphinx( $document_srl, $output->data->lat, $output->data->lon );
		}
		else {
		    $aroundmapList = $this->getAroundmapListMysql( $document_srl, $output->data->lat, $output->data->lon );
		}
		Context::set( 'aroundmapList', $aroundmapList );
		Context::Set('full_url', getFullUrl(''));
		$content = preg_replace_callback('/<\!--AfterDocument\(([0-9]*),([0-9\-]*)\)-->/i','aroundmapController::insertViewMap',$content);
	    }
	    
	    return new Object();
	}
	
	/**
	 * @brief Aroundmap 모듈이 사용가능한지 체크
	 * @param $act 현재페이지의 액션 값
	 * @param $module_srl 현재 게시판의 번호
	 * @return true/false
	 */
	function isAroundmapEnable($act, $module_srl) {
	    // 현재의 액션이 쓰기(수정), 보기 페이지인지 확인
	    if ($act != 'dispBoardWrite' && $act != 'dispBoardContent' && $act != null) return false;
	    
	    // 현재 페이지가 HTML페이지인지 확인
	    if(Context::getResponseMethod()!='HTML') return false;
	    
	    // 현재 모듈이 aroundmap에 적용된 모듈인지 확인
	    if( !$module_srl || !$this->isModuleEnable($module_srl) ) return false;
	    
	    return true;
	}
	
	/**
	 * @brief Aroundmap 모듈에 필요한 데이터를 세팅한다.
	 * @return 글 정보가 있을때, 해당글의 DB데이터
	 */
	function setAroundmapValues($document_srl) {
	    // Naver/Yahoo api key 저장
	    Context::set('naver_api_key', $this->module_config->naver_api_key);
	    Context::set('yahoo_api_key', $this->module_config->yahoo_api_key);
	    
	    // 글 번호가 있으면, 해당글의 DB데이터를 가져와서 저장한다.
	    $output = null;
            if( $document_srl ) {
    	        $args->document_srl = $document_srl;
	        $output = executeQuery( 'aroundmap.getDocumentsAroundmap', $args );
	    
	        if( $output->toBool() ) {
	    	    Context::set( 'aroundmapData', $output->data );
	        }
            } else {
                Context::set( 'aroundmapData', null );
		Context::set( 'aroundmapList', null );
            }
	    
	    return $output;
	}
	
	/**
	 * @brief triggerAroundmapInsert 함수에서 호출,실제로 map_write.html을 게시판 쓰기 템플릿에 삽입한다.
	 * @param $matches 삽입할 위치 (ex) <!-- 파일 업로드 영역 -->
	 * @return 최종 삽입된 컨텐츠
	 */
	function insertWriteMap($matches)
	{
	    $tpl_path = $this->module_path.'tpl';
	    $tpl_file = 'map_write.html';

            $oTemplate = &TemplateHandler::getInstance();

            $mapcontent = $oTemplate->compile($tpl_path, $tpl_file);

	    return $mapcontent.$matches[0];
	}
	
	/**
	 * @brief triggerAroundmapInsert 함수에서 호출,실제로 map_view.html을 게시판 보기템플릿에 삽입한다.
	 * @param $matches 삽입할 위치 (ex) 파일 업로드 영역
	 * @return 최종 삽입된 컨텐츠
	 */
	function insertViewMap($matches)
	{
	    
	    $tpl_path = $this->module_path.'tpl';
	    $tpl_file = 'map_view.html';

            $oTemplate = &TemplateHandler::getInstance();

            $mapcontent = $oTemplate->compile($tpl_path, $tpl_file);

	    return $mapcontent.$matches[0];
	}
	
	/**
	 * @brief 위치 기반 Sphinx 검색 부분 (외부/내부 호출용..)
	 * @param $document_srl 문서 번호
	 * @param $lat 위도
	 * @param $lon 경도
	 * @return 검색된 결과 리스트
	 */
	function getSphinxSearchedResult($document_srl,$lat,$lon)
	{
	    $s = new SphinxClient;
	    
	    $oModuleModel = &getModel('module');
	    $config = $oModuleModel->getModuleConfig('aroundmap');
	    
	    $s->setServer($config->serverName, $config->serverPort);
	    
	    $s->setLimits(0,10);
	    $s->setMatchMode(SPH_MATCH_ALL);
	    $s->SetSortMode(SPH_SORT_EXTENDED, '@geodist ASC');
	    $s->setFilter("document_srl",array($document_srl),true);
	    $s->SetFilterFloatRange("@geodist",0,10000);
	    $s->setMaxQueryTime(3);
	    $s->setGeoAnchor("lat","lon",(float)deg2rad($lat),(float)deg2rad($lon));
	    $result = $s->query("","idx_aroundmap");
	    
	    $ret = array();
	    
	    if ($result[total_found] > 0)
	    {
		$ret = $result[matches];
	    }
	    
	    return $ret;
	}
	
	/**
	 * @brief 현재글 ($document_srl) 을 제외한 lat,lon 좌표 주변의 지표들을 찍어준다.
	 * @param $document_srl 문서 번호
	 * @param $lat 위도
	 * @param $lon 경도
	 * @return 검색된 결과(현재 위치  주변의 지표) 리스트
	 */
	function getAroundmapListSphinx($document_srl,$lat,$lon)
	{
	    $output = $this->getSphinxSearchedResult($document_srl,$lat,$lon);

	    $ret = array();
	    
	    if(count($output) > 0)
	    {
		$args = null;
		$args->aroundmap_srl = implode(',',array_keys($output));
		
		$output = executeQuery('aroundmap.getAroundmapList',$args);
		
		if( !is_array($output->data) ) {
		    $array[] = $output->data;
		    $ret = $array;
		} else {
		    $ret = $output->data;
		}

	    }
	    
	    return $ret;
	    
	}

	/**
	 * @brief triggerAroundmapInsert에서 호출하는 함수. 단, sphinx 모듈 사용하지 않을시에만, \n
	 * DB에 등록된 좌표들을 기준으로 거리를 계산하여 결과 값 리턴해준다.\n
	 * @param $document_srl 문서 번호
	 * @param $lat 위도
	 * @param $lon 경도
	 * @return 현재 위치  주변의 지표를 거리로 계산한 지표 리스트
	 */
	function getAroundmapListMysql($document_srl, $lat, $lon) {
	    
		$db_info = Context::getDBInfo();
	    $sql = "select *, (sqrt((69.1 * abs($lat - lat)) * (69.1 * abs($lat - lat)) + (53 * abs($lon - lon)) * (53 * abs($lon - lon)))) * 1.609344 as distance from " . $db_info->db_table_prefix . "_aroundmap having document_srl != ".$document_srl." order by distance ASC limit 10";
	    $mysqlObj = new DBMysql();
	    $result = $mysqlObj->_query($sql);
	    $output = $mysqlObj->_fetch($result);
	
	    
	    if( !is_array($output) ) {
		$array[] = $output;
		return $array;
	    } else {
		return $output;
	    }
	}
	
	/**
	 * @brief triggerUpdateAroundmap에서 호출하는 함수. DB에 주변지도 정보를 입력한다.
	 * @param $obj aroundmap이 적용되어 있는 게시판 정보  
	 */
	function triggerInsertAroundmap(&$obj) {
	    if( !$this->isModuleEnable($obj->module_srl) ) return new Object();
	    
	    $args->document_srl = $obj->document_srl;
	    $args->member_srl = $obj->member_srl;
	    $args->module_srl = $obj->module_srl;
	    $args->marker_title = Context::Get("marker_title");
	    $args->lon = Context::Get("lon");
	    $args->lat = Context::Get("lat");
	    $args->map_size = Context::Get("map_size");
	    
	    $output = executeQuery('aroundmap.insertAroundmap', $args);
	    
	    if(!$output->toBool()) return $output;
	    
	    return new Object();
	}

	/**
	 * @brief DB에서 기존의 주변지도 정보를 삭제 후, 등록한다.
	 * @param $obj aroundmap이 적용되어 있는 게시판 정보  
	 */
	function triggerUpdateAroundmap(&$obj) {
	    if( !$this->isModuleEnable($obj->module_srl) ) return new Object();
	    
	    $args->document_srl = $obj->document_srl;
	    $output = executeQuery( 'aroundmap.deleteAroundmap', $args );
	    if( !$output->toBool() ) return $output;
	    
	    $this->triggerInsertAroundmap( $obj );
	    
	    return new Object();	    
	}
	
	/**
	 * @brief DB에서 기존의 주변지도 정보를 삭제한다.
	 * @param $obj aroundmap이 적용되어 있는 게시판 정보  
	 */
	function triggerDeleteAroundmap(&$obj) {
	    if( !$this->isModuleEnable($obj->module_srl) ) return new Object();
	    
	    $document_srl = $obj->document_srl;
            if(!$document_srl) return new Object();

            $args->document_srl = $document_srl;
            return executeQuery('aroundmap.deleteAroundmap', $args);
	    
    	    return new Object();
	}
	
	/**
	 * @brief 특정 게시판에서 aroundmap 모듈이 적용되어 있는지 확인한다.
	 * @param $module_srl 게시판 번호
	 * @return true/false
	 */
	function isModuleEnable($module_srl) {
	    $oAroundmapModel = &getModel('aroundmap');
	    if(!$oAroundmapModel->isAppliedModules($module_srl)) return false;
	    if(!$oAroundmapModel->isApiKeyExists()) return false;
	    
	    return true;
	}
    }
?>
