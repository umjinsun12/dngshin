<?php
    /**
     * @file	aroundmap.view.php
     * @class	aroundmapView
     * @brief	Aroundmap View
     * @author	ChoiHeeChul, KimJinHwan, ParkSunYoung
     **/

    class aroundmapView extends aroundmap {

        /**
         * @brief 초기화
         **/
        function init() {
        }
        
	/**
	 * @brief 주변지도 입력폼 디스플레이
	 **/
        function dispBoardWrite () {
            $this->setTemplateFile('list');
        }
        
	/**
	 * @brief 주소 검색에 쓰이는 함수
	 * @return JSON형태의 검색된 주소 리스트
	 **/
        function dispQueryAddress()
	{
	    $oModuleModel = &getModel('module');
            $module_config = $oModuleModel->getModuleConfig('aroundmap');
	    
	    $naver_api_key = $module_config->naver_api_key;
	    $yahoo_api_key = $module_config->yahoo_api_key;
	    
	    $address = Context::Get("address");
	    $address = urlencode($address);
	    
	    // build JSON result as following
	    // $result = '{ "api_type":"yahoo" , "items":[ {"address":"address sample", "lat":36.5459,"lon":128.71},{"address":"address sample2", "lat":36.5459,"lon":128.75}  ]  } ';

	    $type = "";
	    
	    // YAHOO API
	    if( $yahoo_api_key != NULL && $yahoo_api_key != "" ) {
		$url = 'http://kr.open.gugi.yahoo.com/service/poi.php?appid='.$yahoo_api_key.'&encoding=utf-8&q='.$address.'&results=100';
		$type = "yahoo";
	    } else if( $naver_api_key != NULL && $naver_api_key != "" ) {  // NAVER API if you cannot use yahoo api.
		$url = 'http://map.naver.com/api/geocode.php?key='.$naver_api_key.'&encoding=utf-8&coord=latlng&query='.$address;
		$type = "naver";
	    }
	    
	    if( $type != "" ) $result = $this->getAddressByJSON( $url, $type );
	    
	    header ("Content-type: application/json; charset=UTF-8");
	    header ("Pragma: no-cache");
            echo $result;
            exit;

	}
	
	/**
	 * @brief 검색된 주소 리스트(XML)를 JSON으로 변환
	 * @param $url 검색 api의 주소
	 * @param $type 검색 api의 타입(yahoo, naver)
	 * @return JSON형태의 검색된 주소 리스트
	 **/
	function getAddressByJSON($url, $type) {
	    $xml_doc = $this->xmlAPIRequest($url);
	    $result = '{ "api_type":"'.$type.'"';
	    
	    $bYahoo = ($type=="yahoo");
	    
	    $item = $bYahoo?$xml_doc->resultset->locations->item:$xml_doc->geocode->item;
	    if(!is_array($item)) $item = array($item);
	    $item_count = count($item);
	    
	    $item_body = $bYahoo ? $item[0]->name->body : $item[0]->address->body;

	    if($item_count && $item_body != "" ) {
		$result .= ', "items":[';
		for($i=0;$i<$item_count;$i++) {
		    
		    $input_obj = '';
		    $input_obj = $item[$i];
		    
		    if ($i!=0) $result .= ", ";
		    
		    if($bYahoo)
		    {
			$formatted_address = $input_obj->name->body;
			$lat = $input_obj->latitude->body;
			$lon = $input_obj->longitude->body;			
		    } else {
			$formatted_address =  $input_obj->address->body;
			$lat = $input_obj->point->y->body;
			$lon = $input_obj->point->x->body;
		    }
		    
		    $result .= '{"address":"'.$formatted_address.'", ';
		    $result .= '"lat":' . $lat . ', "lon":' . $lon . '}';
		}
		$result .= ']';
	    }
	    $result .= '}';
	    
	    return $result;
	}
        
	/**
	 * @brief uri에 해당되는 xml파일을 파싱한다
	 * @param $uri 파싱할 xml 파일
	 * @param $headers HTTP 프로토콜 헤더(default = null)
	 * @return 파싱된 데이터
	 **/
        function xmlAPIRequest($uri, $headers = null) {
		$xml = '';
		$xml = FileHandler::getRemoteResource($uri, null, 3, 'GET', 'application/xml', $headers);

		$xml = preg_replace("/<\?xml([.^>]*)\?>/i", "", $xml);

		$oXmlParser = new XmlParser();
		$xml_doc = $oXmlParser->parse($xml);

		return $xml_doc;
	}
    }
?>