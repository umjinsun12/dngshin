<?php
    if(!defined("__ZBXE__")) exit();

    /**
     * @addon_insert_maplatlng.addon.php
     * @author XENARA (kolaskks@naver.com)
     * @brief XENARA 지도 위경도 삽입 애드온
     **/


    $oDB = &DB::getInstance();
    if(!$oDB->isColumnExists("documents","map_latitude")){
      $oDB->addColumn('documents',"map_latitude","float",30);
      $oDB->addIndex("documents","idx_map_latitude", array("map_latitude"));
    }
    if(!$oDB->isColumnExists("documents","map_longitude")){
      $oDB->addColumn('documents',"map_longitude","float",30);
      $oDB->addIndex("documents","idx_map_longitude", array("map_longitude"));
    }


    if($called_position == 'after_module_proc') {
      $oDocumentModel = &getModel('document');

      if($addon_info->map_latitude_eid){
        $map_latitude_eid = $addon_info->map_latitude_eid;
      } else{
        $map_latitude_eid = 'map_latitude';
      }
      if($addon_info->map_longitude_eid){
        $map_longitude_eid = $addon_info->map_longitude_eid;
      } else{
        $map_longitude_eid = 'map_longitude';
      }
      if($addon_info->map_address_eid){
        $map_address_eid = $addon_info->map_address_eid;
      } else{
        $map_address_eid = 'map_address';
      }


      if(Context::get('document_srl')){
        $mapDocument = $oDocumentModel->getDocument(Context::get('document_srl'));
        if($mapDocument->getExtraEidValue($map_latitude_eid) && $mapDocument->getExtraEidValue($map_longitude_eid)){
          $map_obj = '';
          $map_obj->document_srl = Context::get('document_srl');
          $map_obj->map_latitude = $mapDocument->getExtraEidValue($map_latitude_eid);
          $map_obj->map_longitude = $mapDocument->getExtraEidValue($map_longitude_eid);
          $map_output = executeQuery('addons.addon_insert_maplatlng.updateLatitude', $map_obj);
          $map_output = executeQuery('addons.addon_insert_maplatlng.updateLongitude', $map_obj);

          //mysqli DB
          $db_info = Context::getDBInfo();
          if($db_info->master_db["db_type"]=='mysqli'){
            $con = mysqli_connect($db_info->master_db["db_hostname"],$db_info->master_db["db_userid"],$db_info->master_db["db_password"],$db_info->master_db["db_database"]);

            $map_latitude = $mapDocument->getExtraEidValue($map_latitude_eid);
            $sql = "UPDATE ".$db_info->master_db["db_table_prefix"]."documents SET map_latitude='".$map_latitude."' where document_srl='".Context::get('document_srl')."'";
            mysqli_query($con, $sql);

            $map_longitude = $mapDocument->getExtraEidValue($map_longitude_eid);
            $sql = "UPDATE ".$db_info->master_db["db_table_prefix"]."documents SET map_longitude='".$map_longitude."' where document_srl='".Context::get('document_srl')."'";
            mysqli_query($con, $sql);
          }

        } else if($mapDocument->getExtraEidValue($map_address_eid)){
          if(Context::get('map_latitude') && Context::get('map_longitude')){
            $map_obj = '';
            $map_obj->document_srl = Context::get('document_srl');
            $map_obj->map_latitude = Context::get('map_latitude');
            $map_obj->map_longitude = Context::get('map_longitude');
            $map_output = executeQuery('addons.addon_insert_maplatlng.updateLatitude', $map_obj);
            $map_output = executeQuery('addons.addon_insert_maplatlng.updateLongitude', $map_obj);

            //mysqli DB
            $db_info = Context::getDBInfo();
            if($db_info->master_db["db_type"]=='mysqli'){
              $con = mysqli_connect($db_info->master_db["db_hostname"],$db_info->master_db["db_userid"],$db_info->master_db["db_password"],$db_info->master_db["db_database"]);

              $map_latitude = Context::get('map_latitude');
              $sql = "UPDATE ".$db_info->master_db["db_table_prefix"]."documents SET map_latitude='".$map_latitude."' where document_srl='".Context::get('document_srl')."'";
              mysqli_query($con, $sql);

              $map_longitude = Context::get('map_longitude');
              $sql = "UPDATE ".$db_info->master_db["db_table_prefix"]."documents SET map_longitude='".$map_longitude."' where document_srl='".Context::get('document_srl')."'";
              mysqli_query($con, $sql);
            }
            exit();
          }

         if($addon_info->google_map_key){
            $google_map_key = '&key='.$addon_info->google_map_key;
          } else{
            $google_map_key = '';
          }
          $header_content = '';
          $header_content .= '
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=true'.$google_map_key.'"></script>
            <script>
              jQuery(window).load(function(){
                var lat = "";
                var lng = "";
                var map_address = "'.$mapDocument->getExtraEidValue($map_address_eid).'";
                geocoder = new google.maps.Geocoder();
                geocoder.geocode( { "address": map_address}, function(results, status) {
                  if (status == google.maps.GeocoderStatus.OK) {
                    oLatlng = results[0].geometry.location;
                    lat = oLatlng.lat();
                    lng = oLatlng.lng();
                    if(lat && lng){
                      var url = "'.getFullUrl('').'index.php";
                      jQuery.ajax({
                        type: "POST",
                        url: url,
                        data: "mid='.Context::get('mid').'&document_srl='.Context::get('document_srl').'&map_latitude="+lat+"&map_longitude="+lng,
                        success: function(data){
                          return false;
                        }
                      });
                    }
                  } else {
                    //alert("Geocode was not successful for the following reason: " + status);
                  }
                });
              });
            </script>
          ';
          Context::addHtmlHeader($header_content);
        }

      }
    }
?>
