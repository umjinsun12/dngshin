<?php if(!defined("__XE__"))exit;
$__Context->oDocumentModel = &getModel('document'); ?>
<?php  $__Context->oModuleModel = &getModel('module'); ?>
<?php  $__Context->skin_path = $__Context->tpl_path ?>
<?php  $__Context->skin_topdiv_class = $__Context->map_obj->skin ?>
<!--#Meta:widgets/widget_buplist/skins/default/css/widget.css--><?php $__tmp=array('widgets/widget_buplist/skins/default/css/widget.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php if(Mobile::isMobileCheckByAgent() || $__Context->m==1){ ?>
<!--#Meta:widgets/widget_buplist/skins/default/css/m_widget.css--><?php $__tmp=array('widgets/widget_buplist/skins/default/css/m_widget.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<?php } ?>
<script type="text/javascript" src="<?php echo $__Context->skin_path ?>js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link rel="stylesheet" href="<?php echo $__Context->skin_path ?>js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $__Context->skin_path ?>js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<link rel="stylesheet" href="<?php echo $__Context->skin_path ?>js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $__Context->skin_path ?>js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?php echo $__Context->skin_path ?>js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<link rel="stylesheet" href="<?php echo $__Context->skin_path ?>js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $__Context->skin_path ?>js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true<?php echo $__Context->google_map_key ?>"></script>
<script type="text/javascript" src="//apis.daum.net/maps/maps3.js?apikey=<?php echo $__Context->map_obj->daum_map_key ?>"></script>
<?php if(Mobile::isMobileCheckByAgent() || $__Context->m==1){ ?><div class="daum_roadview" id="daum_roadview" style="width:<?php echo $__Context->map_obj->map_width ?>; height:<?php echo $__Context->map_obj->map_height ?>px; overflow:hidden;"></div><?php } ?>
<div class="<?php echo $__Context->skin_topdiv_class ?>" style="width:<?php echo $__Context->map_obj->map_width ?>; overflow:hidden;">
  <div class="map_canvas" id="map_canvas" style="width:<?php echo $__Context->map_obj->map_width ?>; height:<?php echo $__Context->map_obj->map_height ?>px;"></div>
  <div class="map_list_wrap"<?php if(!(Mobile::isMobileCheckByAgent() || $__Context->m==1)){ ?> style="height:<?php echo $__Context->map_obj->map_height-2 ?>px;"<?php } ?>>
    <ul class="map_list">
      <?php  $__Context->count = 1 ?>
      <?php if($__Context->map_list&&count($__Context->map_list))foreach($__Context->map_list as $__Context->key => $__Context->val){ ?>
        <?php  $__Context->map_document = $__Context->oDocumentModel->getDocument($__Context->val->document_srl) ?>
        <?php  $__Context->map_document_extrakeys = $__Context->oDocumentModel->getExtraKeys($__Context->val->module_srl) ?>
        <?php  $__Context->map_module_info = $__Context->oModuleModel->getModuleInfoByModuleSrl($__Context->val->module_srl) ?>
        <?php  $__Context->map_module_skinvars = $__Context->oModuleModel->getModuleSkinVars($__Context->val->module_srl) ?>
        <?php if($__Context->val->map_latitude && $__Context->val->map_longitude){ ?><li class="list_<?php echo $__Context->map_document->document_srl ?> list<?php echo $__Context->count ?> list" id="<?php echo $__Context->val->document_srl ?>">
          <?php  $__Context->link_thumbnail_width = $__Context->map_obj->thumbnail_width*0.5 ?>
          <?php  $__Context->link_thumbnail_height = $__Context->map_obj->thumbnail_height*0.5 ?>
          <a class="link" href="#map" onclick="markerClickEvent(jQuery(this).parent().attr('id')); return false;">
            <?php if($__Context->map_document->getThumbnail($__Context->map_obj->thumbnail_width,$__Context->map_obj->thumbnail_height)){ ?>
              <span class="thumbnail" style="height:<?php echo $__Context->link_thumbnail_height ?>px;"><img src="<?php echo $__Context->map_document->getThumbnail($__Context->map_obj->thumbnail_width,$__Context->map_obj->thumbnail_height) ?>" style="width:<?php echo $__Context->link_thumbnail_width ?>px; height:<?php echo $__Context->link_thumbnail_height ?>px;" /></span>
            <?php }else{ ?>
              <span class="thumbnail" style="height:<?php echo $__Context->link_thumbnail_height ?>px;"><img src="<?php echo $__Context->skin_path ?>images/noimage.gif" style="width:<?php echo $__Context->link_thumbnail_width ?>px; height:<?php echo $__Context->link_thumbnail_height ?>px;" /></span>
            <?php } ?>
            <span class="title"><?php echo $__Context->map_document->getTitle(25) ?></span>
          </a>
          
          <div class="map_attribute<?php echo $__Context->count ?> map_attribute" id="map_attribute_<?php echo $__Context->map_document->document_srl ?>" style="display:none;">
            
            <span class="map_latitude"><?php echo $__Context->val->map_latitude ?></span>
            <span class="map_longitude"><?php echo $__Context->val->map_longitude ?></span>
            
            <span class="marker_title"><?php echo addslashes($__Context->map_document->getTitle()) ?></span>
            
            <?php  $__Context->map_category = $__Context->oDocumentModel->getCategory($__Context->val->category_srl) ?>
            <?php if($__Context->map_document->getExtraEidValue('marker_icon_url')){ ?>
              <img class="marker_icon" src="<?php echo $__Context->map_document->getExtraEidValue('marker_icon_url') ?>" />
            <?php }else if($__Context->map_document->getExtraEidValue('marker_icons')){ ?>
              <?php  $__Context->marker_url = getFullUrl('').$__Context->skin_path.'marker_icons/'.$__Context->map_document->getExtraEidValue('marker_icons').'.png' ?>
              <?php  $__Context->marker_url = str_replace('/./','/',$__Context->marker_url) ?>
              <img class="marker_icon" src="<?php echo $__Context->marker_url ?>" />
            <?php }else if($__Context->map_category->description){ ?>
              <img class="marker_icon" src="<?php echo $__Context->map_category->description ?>" />
            <?php }else if($__Context->map_module_skinvars['map_marker_icon']->value){ ?>
              <img class="marker_icon" src="<?php echo $__Context->map_module_skinvars['map_marker_icon']->value ?>" />
            <?php } ?>
            
            <div class="info_content_html" id="info_content_html_<?php echo $__Context->map_document->document_srl ?>">
              <div class="map_info_content" id="map_info_content_<?php echo $__Context->map_document->document_srl ?>" style="width:<?php echo $__Context->map_obj->info_content_width ?>px;<?php if($__Context->map_obj->info_content_height){ ?> height:<?php echo $__Context->map_obj->info_content_height ?>px;<?php } ?>">
                <a class="title_area" href="<?php echo getUrl('','document_srl',$__Context->map_document->document_srl) ?>"><span class="title"><?php echo addslashes($__Context->map_document->getTitle($__Context->map_obj->subject_cut_size)) ?></span></a>
                <div class="content_area">
                  <?php if($__Context->map_document->getThumbnail($__Context->map_obj->thumbnail_width,$__Context->map_obj->thumbnail_height)){ ?>
                    <span class="thumbnail" style="height:<?php echo $__Context->map_obj->thumbnail_height ?>px;"><img src="<?php echo $__Context->map_document->getThumbnail($__Context->map_obj->thumbnail_width,$__Context->map_obj->thumbnail_height) ?>" style="width:<?php echo $__Context->map_obj->thumbnail_width ?>px; height:<?php echo $__Context->map_obj->thumbnail_height ?>px;" /></span>
                  <?php }else{ ?>
                    <span class="thumbnail" style="height:<?php echo $__Context->map_obj->thumbnail_height ?>px;"><img src="<?php echo $__Context->skin_path ?>images/noimage.gif" style="width:<?php echo $__Context->map_obj->thumbnail_width ?>px; height:<?php echo $__Context->map_obj->thumbnail_height ?>px;" /></span>
                  <?php } ?>
                  <span class="content"><?php echo addslashes($__Context->map_document->getSummary($__Context->map_obj->content_cut_size)) ?></span>
                </div>
                <?php if($__Context->map_obj->show_info_content_extarvars!='N'){ ?><table class="extarvars" width="<?php echo $__Context->map_obj->info_content_width ?>" border="0" cellspacing="0">
                  <tbody>
                    <?php if($__Context->map_obj->info_content_extar_eids){ ?>
                      <?php if($__Context->map_document_extrakeys&&count($__Context->map_document_extrakeys))foreach($__Context->map_document_extrakeys as $__Context->ekey => $__Context->eval){ ?>
                        <?php if(in_array($__Context->eval->eid,$__Context->map_obj->info_content_extar_eids)){ ?>
                          <?php if($__Context->map_document->getExtraEidValueHTML($__Context->eval->eid)){ ?><tr>
                            <td class="name" border="0" cellspacing="0"><?php echo $__Context->eval->name ?></td>
                            <td class="value" width="100%" border="0" cellspacing="0"><?php echo $__Context->map_document->getExtraEidValueHTML($__Context->eval->eid) ?></td>
                          </tr><?php } ?>
                        <?php } ?>
                      <?php } ?>
                    <?php }else{ ?>
                      <?php if($__Context->map_document_extrakeys&&count($__Context->map_document_extrakeys))foreach($__Context->map_document_extrakeys as $__Context->ekey => $__Context->eval){ ?>
                        <?php if($__Context->eval->eid!='marker_icon_url' && $__Context->eval->eid!='marker_icons' && $__Context->eval->eid!='vr_link' && $__Context->eval->eid!='vr_url'){ ?>
                          <?php if($__Context->map_document->getExtraEidValueHTML($__Context->eval->eid)){ ?><tr>
                            <td class="name" border="0" cellspacing="0"><?php echo $__Context->eval->name ?></td>
                            <td class="value" width="100%" border="0" cellspacing="0"><?php echo $__Context->map_document->getExtraEidValueHTML($__Context->eval->eid) ?></td>
                          </tr><?php } ?>
                        <?php } ?>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table><?php } ?>
                <div class="etc_area">
                  <span class="btn_streetview" onclick="insetRoadView('<?php echo $__Context->val->map_latitude ?>','<?php echo $__Context->val->map_longitude ?>'); return false;" title="Road View"><img src="<?php echo $__Context->skin_path ?>images/daum_mapwalker.png" alt="Road View" style="height:30px;" /></span>
                  <?php if($__Context->map_document->getExtraEidValue('vr_link')){ ?>
                    <?php  $__Context->vr_link = $__Context->map_document->getExtraEidValue('vr_link') ?>
                  <?php }else if($__Context->map_document->getExtraEidValue('vr_url')){ ?>
                    <?php  $__Context->vr_link = $__Context->map_document->getExtraEidValue('vr_url') ?>
                  <?php } ?>
          			  <?php if($__Context->map_document->getExtraEidValue('video_link')){ ?>
                    <?php 
                      $__Context->media_type = str_replace('http://','',$__Context->map_document->getExtraEidValue('video_link'));
                      $__Context->media_type = str_replace('https://','',$__Context->media_type);
                      $__Context->media_type = substr($__Context->media_type, 0, 5);
                     ?>
                    <?php if($__Context->media_type=='youtu'){ ?>
                      <?php 
                        $__Context->youtube_code = $__Context->map_document->getExtraEidValue('video_link');
                        $__Context->youtube_vid = str_replace('http://youtu.be/','',$__Context->youtube_code);
                        $__Context->youtube_vid = str_replace('https://youtu.be/','',$__Context->youtube_vid);
                        $__Context->fancybox_url = 'http://www.youtube.com/embed/'.$__Context->youtube_vid.'?autoplay=0&rel=0&vq=hd720&version=3';
                        $__Context->youtube_autoplay_url = 'http://www.youtube.com/embed/'.$__Context->youtube_vid.'?autoplay=1&rel=0&vq=hd720&version=3';
                        $__Context->media_type = 'video';
                        $__Context->media_type_detail = 'youtube';
                       ?>
                    <?php }else if($__Context->media_type=='vimeo'){ ?>
                      <?php 
                        $__Context->vimeo_code = $__Context->map_document->getExtraEidValue('video_link');
                        $__Context->vimeo_vid = str_replace('http://vimeo.com/','',$__Context->vimeo_code);
                        $__Context->vimeo_vid = str_replace('https://vimeo.com/','',$__Context->vimeo_vid);
                       ?>
                      <?php 
                        $__Context->fancybox_url = 'http://vimeo.com/'.$__Context->vimeo_vid;
                        $__Context->vimeo_play_url = '//player.vimeo.com/video/'.$__Context->vimeo_vid;
                        $__Context->vimeo_autoplay_url = '//player.vimeo.com/video/'.$__Context->vimeo_vid.'?autoplay=0';
                        $__Context->media_type = 'video';
                        $__Context->media_type_detail = 'vimeo';
                       ?>
                    <?php }else{ ?>
                      <?php 
                        $__Context->fancybox_url = $__Context->map_document->getExtraEidValue('video_link');
                        $__Context->media_type = 'iframe';
                       ?>
                    <?php } ?>
                  <?php } ?>
          			  <?php if($__Context->map_document->getExtraEidValue('youtube_link')){ ?>
                    <?php 
                      $__Context->media_type = str_replace('http://','',$__Context->map_document->getExtraEidValue('youtube_link'));
                      $__Context->media_type = str_replace('https://','',$__Context->media_type);
                      $__Context->media_type = substr($__Context->media_type, 0, 5);
                     ?>
                    <?php if($__Context->media_type=='youtu'){ ?>
                      <?php 
                        $__Context->youtube_code = $__Context->map_document->getExtraEidValue('youtube_link');
                        $__Context->youtube_vid = str_replace('http://youtu.be/','',$__Context->youtube_code);
                        $__Context->youtube_vid = str_replace('https://youtu.be/','',$__Context->youtube_vid);
                        $__Context->youtube_fancybox_url = 'http://www.youtube.com/embed/'.$__Context->youtube_vid.'?autoplay=0&rel=0&vq=hd720&version=3';
                        $__Context->youtube_autoplay_url = 'http://www.youtube.com/embed/'.$__Context->youtube_vid.'?autoplay=1&rel=0&vq=hd720&version=3';
                       ?>
                    <?php } ?>
                  <?php } ?>
          			  <?php if($__Context->map_document->getExtraEidValue('vimeo_link')){ ?>
                    <?php 
                      $__Context->media_type = str_replace('http://','',$__Context->map_document->getExtraEidValue('vimeo_link'));
                      $__Context->media_type = str_replace('https://','',$__Context->media_type);
                      $__Context->media_type = substr($__Context->media_type, 0, 5);
                     ?>
                    <?php if($__Context->media_type=='vimeo'){ ?>
                      <?php 
                        $__Context->vimeo_code = $__Context->map_document->getExtraEidValue('vimeo_link');
                        $__Context->vimeo_vid = str_replace('http://vimeo.com/','',$__Context->vimeo_code);
                        $__Context->vimeo_vid = str_replace('https://vimeo.com/','',$__Context->vimeo_vid);
                       ?>
                      <?php 
                        $__Context->vimeo_fancybox_url = 'http://vimeo.com/'.$__Context->vimeo_vid;
                        $__Context->vimeo_play_url = '//player.vimeo.com/video/'.$__Context->vimeo_vid;
                        $__Context->vimeo_autoplay_url = '//player.vimeo.com/video/'.$__Context->vimeo_vid.'?autoplay=0';
                       ?>
                    <?php } ?>
                  <?php } ?>
                  <?php if($__Context->vr_link){ ?><a class="btn_vr" data-fancybox-type="iframe" href="<?php echo $__Context->vr_link ?>"><img src="<?php echo $__Context->skin_path ?>images/icon_vr.png" alt="VR Panorama" style="height:35px;" /></a><?php } ?>
                  <?php if($__Context->youtube_vid){ ?><a class="btn_youtube btn_media" href="<?php echo $__Context->youtube_fancybox_url ?>"><img src="<?php echo $__Context->skin_path ?>images/icon_youtube.png" alt="YouTube" style="height:35px;" /></a><?php } ?>
                  <?php if($__Context->vimeo_vid){ ?><a class="btn_vimeo btn_media" href="<?php echo $__Context->vimeo_fancybox_url ?>"><img src="<?php echo $__Context->skin_path ?>images/icon_vimeo.png" alt="Vimeo" style="height:35px;" /></a><?php } ?>
                </div>
              </div>
            </div>
          </div>
          
        </li><?php } ?>
        <?php  $__Context->map_document = '' ?>
        <?php  $__Context->count++ ?>
      <?php } ?>
    </ul>
    <div class="preload" style="height:<?php echo $__Context->map_obj->map_height-2 ?>px;"></div>
  </div>
  <?php if(!(Mobile::isMobileCheckByAgent() || $__Context->m==1)){ ?><span class="btn_open_map_list">&laquo;</span><?php } ?>
  <div class="preload" style="width:<?php echo $__Context->map_obj->map_width ?>; height:<?php echo $__Context->map_obj->map_height ?>px; padding-bottom:20px;"></div>
</div>
<?php if(!(Mobile::isMobileCheckByAgent() || $__Context->m==1)){ ?><div class="daum_roadview" id="daum_roadview" style="width:<?php echo $__Context->map_obj->map_width ?>; height:<?php echo $__Context->map_obj->map_height ?>px; overflow:hidden;"></div><?php } ?>
<script>
//기본변수 설정
var map;
var markers = Array();
var info_windows = Array();
var latlng_bounds = '';
var latlng_north_east = '';
var latlng_south_west = '';
var lat_north = '';
var lng_east = '';
var lat_south = '';
var lng_west = '';
var current_latlng = '';
//마커 클릭 이벤트 함수
function markerClickEvent(index){
  for(var i in markers) {
    info_windows[i].setMap(null);
  }
  info_windows[index].open(map,markers[index]);
  listScroll(index);
  return false;
}
//로드뷰 출력 함수
function insetRoadView(map_latitude, map_longitude){
  jQuery('#daum_roadview').html('');
  jQuery('#daum_roadview').css('display','none');
  jQuery('#daum_roadview').fadeIn(300);
  var roadviewContainer = document.getElementById('daum_roadview');
  var roadview = new daum.maps.Roadview(roadviewContainer);
  var roadviewClient = new daum.maps.RoadviewClient();
  var position = new daum.maps.LatLng(map_latitude, map_longitude);
  // 특정 위치의 좌표와 가까운 로드뷰의 panoId를 추출하여 로드뷰를 띄운다.
  roadviewClient.getNearestPanoId(position, 300, function(panoId) {
    roadview.setPanoId(panoId, position); //panoId와 중심좌표를 통해 로드뷰 실행
  });
}
//좌측 목록 스크롤 효과 함수
function listScroll(index){
  <?php if(Mobile::isMobileCheckByAgent() || $__Context->m==1){ ?>
    var scroll_top = <?php echo $__Context->map_obj->m_scroll_top ?>;
    var speed = 500; // 스크롤속도
    jQuery('body').animate({scrollTop:scroll_top}, speed);
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list .link').attr('id','');
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list #'+index).children('.link').attr('id','link_on');
  <?php }else{ ?>
    var list_position = jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list #'+index).position();
    var speed = 500; // 스크롤속도
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap').animate({scrollTop:list_position.top+1}, speed);
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list .link').attr('id','');
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list #'+index).children('.link').attr('id','link_on');
  <?php } ?>
  return false;
}
//마커 및 정보박스 설정함수
function remarkerMapList(){
  jQuery('#daum_roadview').html('');
  jQuery('#daum_roadview').css('display','none');
  jQuery('.<?php echo $__Context->skin_topdiv_class ?> .preload').fadeOut(300);
  var count = 1;
  jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list').each(function(docu_srl){
    docu_srl = parseInt(jQuery(this).attr('id'));
    var map_latitude = jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.map_latitude').text();
    var map_longitude = jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.map_longitude').text();
    var marker_title = jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.marker_title').text();
    //현재위치에서 목적지까지 거리계산(위경도 좌표계산방식)
    if(navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        current_latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        var EARTH_R, Rad, radLat1, radLat2, radDist;
        var lat1 = current_latlng.lat();
        var lon1 = current_latlng.lng();
        var lat2 = map_latitude;
        var lon2 = map_longitude;
        var distance, ret;
        EARTH_R = 6371000.0;
        Rad 		= Math.PI/180;
        radLat1 = Rad * lat1;
        radLat2 = Rad * lat2;
        radDist = Rad * (lon1 - lon2);
        distance = Math.sin(radLat1) * Math.sin(radLat2);
        distance = distance + Math.cos(radLat1) * Math.cos(radLat2) * Math.cos(radDist);
        ret 		 = EARTH_R * Math.acos(distance);
		    var rtn = Math.round(Math.round(ret) / 1000);
   	    if(rtn <= 0){
   		    rtn = Math.round(ret) + " m";
   	    } else {
   		    rtn = rtn + " km";
     	  }
     	  jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list_'+docu_srl+' .link').children('.distance').remove();
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list_'+docu_srl+' .link').append('<span class="distance" style="display:inline-block;">('+rtn+')</span>');
      });
    }
    //마커 및 정보창 설정
    if(!markers[docu_srl]){
      //마커 아이콘 설정
      var marker_icon = '';
      if(jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.marker_icon').attr('src')){
        marker_icon = new daum.maps.MarkerImage(
            jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.marker_icon').attr('src'),
            new daum.maps.Size(31, 35)
        );
      }
      //마커 설정
      markers[docu_srl] = new daum.maps.Marker({
        position: new daum.maps.LatLng(map_latitude, map_longitude),
        map: map,
        title: marker_title,
        image: marker_icon
      });
      //정보창 설정
      info_windows[docu_srl] = new daum.maps.InfoWindow({
        map: map,
        position: new daum.maps.LatLng(map_latitude, map_longitude),
        content: jQuery('.<?php echo $__Context->skin_topdiv_class ?> #map_attribute_'+docu_srl).children('.info_content_html').html(),
        removable: true
      });
      info_windows[docu_srl].close();
      //마커 클릭 이벤트
      daum.maps.event.addListener(markers[docu_srl], 'click', function() {
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list .list').each(function(docu_srl){
          docu_srl = parseInt(jQuery(this).attr('id'));
          info_windows[docu_srl].setMap(null);
        });
        info_windows[docu_srl].open(map,markers[docu_srl]);
        listScroll(docu_srl);
      });
    }
    count++;
  });
}
//맵리스트 추출 아작스함수
function ajaxMaplist(){
  var data_add = '';
  if(lat_north) data_add += '&lat_north='+lat_north;
  if(lng_east) data_add += '&lng_east='+lng_east;
  if(lat_south) data_add += '&lat_south='+lat_south;
  if(lng_west) data_add += '&lng_west='+lng_west;
  var url = "<?php echo getFullUrl('') ?>index.php";
  jQuery.ajax({
    type: "POST",
    url: url,
    data: "xenara_ajax=y&mid=<?php echo $__Context->mid ?>"+data_add,
    success: function(data){
      var response = jQuery(data);
      if(response.filter('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').html()){
        var result_msg = response.filter('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').html();
      } else if(response.find('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').html()){
        var result_msg = response.find('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').html();
      }
      if(result_msg){
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').html('');
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').append(result_msg);
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .map_list').fadeIn(500);
        setTimeout(function(){
          remarkerMapList();
        },500);
        return false;
      }
      return false;
    }
  });
}
/* 지도 초기실행 - 시작 */
//현위치 기준으로 지도출력
<?php if($__Context->map_obj->current_type=='Y'){ ?>
  if(navigator.geolocation){
    //현위치를 찾은 경우
    navigator.geolocation.getCurrentPosition(function(position){
      var map_latitude = position.coords.latitude;
      var map_longitude = position.coords.longitude;
      //초기 지도출력
      var container = document.getElementById('map_canvas');
      var options = {
  	      center: new daum.maps.LatLng(map_latitude, map_longitude),
          level: <?php echo $__Context->map_obj->daum_map_zoom ?>
      };
      map = new daum.maps.Map(container, options);
      //현위치 마커
      var current_icon = new daum.maps.MarkerImage(
          '<?php echo $__Context->skin_path ?>images/wifi.png',
          new daum.maps.Size(31, 35)
      );
      var current_marker = new daum.maps.Marker({
          position: new daum.maps.LatLng(position.coords.latitude, position.coords.longitude),
          map: map,
          title: 'Here you are!',
          image: current_icon
      });
      //초기 지도테두리 좌표설정 및 지도마커 표시
      var bounds = map.getBounds();
      var south_west = bounds.getSouthWest();
      var north_east = bounds.getNorthEast();
      lat_north = north_east.getLat();
      lng_east = north_east.getLng();
      lat_south = south_west.getLat();
      lng_west = south_west.getLng();
      ajaxMaplist();
      //지도 위에 지도타입 콘트롤 표시
      var mapTypeControl = new daum.maps.MapTypeControl();
      map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPLEFT);
      //지도 위에 줌 콘트롤 표시
      var zoomControl = new daum.maps.ZoomControl();
      map.addControl(zoomControl, daum.maps.ControlPosition.LEFT);
      //지도 드레그 이벤트 설정
      daum.maps.event.addListener(map, 'dragend', function() {
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
        var bounds = map.getBounds();
        var south_west = bounds.getSouthWest();
        var north_east = bounds.getNorthEast();
        lat_north = north_east.getLat();
        lng_east = north_east.getLng();
        lat_south = south_west.getLat();
        lng_west = south_west.getLng();
        ajaxMaplist();
      });
      //지도 줌 이벤트 설정
      daum.maps.event.addListener(map, 'zoom_changed', function() {
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
        var bounds = map.getBounds();
        var south_west = bounds.getSouthWest();
        var north_east = bounds.getNorthEast();
        lat_north = north_east.getLat();
        lng_east = north_east.getLng();
        lat_south = south_west.getLat();
        lng_west = south_west.getLng();
        ajaxMaplist();
      });
    //현위치를 찾지 못한 경우
    },function(){
      var map_latitude = parseFloat(jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_attribute1').children('.map_latitude').text());
      var map_longitude = parseFloat(jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_attribute1').children('.map_longitude').text());
      //초기 지도출력
      var container = document.getElementById('map_canvas');
      var options = {
  	      center: new daum.maps.LatLng(map_latitude, map_longitude),
          level: <?php echo $__Context->map_obj->daum_map_zoom ?>
      };
      map = new daum.maps.Map(container, options);
      //초기 지도테두리 좌표설정 및 지도마커 표시
      var bounds = map.getBounds();
      var south_west = bounds.getSouthWest();
      var north_east = bounds.getNorthEast();
      lat_north = north_east.getLat();
      lng_east = north_east.getLng();
      lat_south = south_west.getLat();
      lng_west = south_west.getLng();
      ajaxMaplist();
      //지도 위에 지도타입 콘트롤 표시
      var mapTypeControl = new daum.maps.MapTypeControl();
      map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPLEFT);
      //지도 위에 줌 콘트롤 표시
      var zoomControl = new daum.maps.ZoomControl();
      map.addControl(zoomControl, daum.maps.ControlPosition.LEFT);
      //지도 드레그 이벤트 설정
      daum.maps.event.addListener(map, 'dragend', function() {
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
        var bounds = map.getBounds();
        var south_west = bounds.getSouthWest();
        var north_east = bounds.getNorthEast();
        lat_north = north_east.getLat();
        lng_east = north_east.getLng();
        lat_south = south_west.getLat();
        lng_west = south_west.getLng();
        ajaxMaplist();
      });
      //지도 줌 이벤트 설정
      daum.maps.event.addListener(map, 'zoom_changed', function() {
        jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
        var bounds = map.getBounds();
        var south_west = bounds.getSouthWest();
        var north_east = bounds.getNorthEast();
        lat_north = north_east.getLat();
        lng_east = north_east.getLng();
        lat_south = south_west.getLat();
        lng_west = south_west.getLng();
        ajaxMaplist();
      });
    });
  }
//게시글 정렬기즌으로 지도출력
<?php }else{ ?>
  var map_latitude = parseFloat(jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_attribute1').children('.map_latitude').text());
  var map_longitude = parseFloat(jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_attribute1').children('.map_longitude').text());
  //초기 지도출력
  var container = document.getElementById('map_canvas');
  var options = {
    	center: new daum.maps.LatLng(map_latitude, map_longitude),
      level: <?php echo $__Context->map_obj->daum_map_zoom ?>
  };
  map = new daum.maps.Map(container, options);
  //현위치 마커
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var current_icon = new daum.maps.MarkerImage(
          '<?php echo $__Context->skin_path ?>images/wifi.png',
          new daum.maps.Size(31, 35)
      );
      var current_marker = new daum.maps.Marker({
          position: new daum.maps.LatLng(position.coords.latitude, position.coords.longitude),
          map: map,
          title: 'Here you are!',
          image: current_icon
      });
    });
  }
  //초기 지도테두리 좌표설정 및 지도마커 표시
  var bounds = map.getBounds();
  var south_west = bounds.getSouthWest();
  var north_east = bounds.getNorthEast();
  lat_north = north_east.getLat();
  lng_east = north_east.getLng();
  lat_south = south_west.getLat();
  lng_west = south_west.getLng();
  ajaxMaplist();
  //지도 위에 지도타입 콘트롤 표시
  var mapTypeControl = new daum.maps.MapTypeControl();
  map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPLEFT);
  //지도 위에 줌 콘트롤 표시
  var zoomControl = new daum.maps.ZoomControl();
  map.addControl(zoomControl, daum.maps.ControlPosition.LEFT);
  //지도 드레그 이벤트 설정
  daum.maps.event.addListener(map, 'dragend', function() {
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
    var bounds = map.getBounds();
    var south_west = bounds.getSouthWest();
    var north_east = bounds.getNorthEast();
    lat_north = north_east.getLat();
    lng_east = north_east.getLng();
    lat_south = south_west.getLat();
    lng_west = south_west.getLng();
    ajaxMaplist();
  });
  //지도 줌 이벤트 설정
  daum.maps.event.addListener(map, 'zoom_changed', function() {
    jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap .preload').fadeTo(300,0.5);
    var bounds = map.getBounds();
    var south_west = bounds.getSouthWest();
    var north_east = bounds.getNorthEast();
    lat_north = north_east.getLat();
    lng_east = north_east.getLng();
    lat_south = south_west.getLat();
    lng_west = south_west.getLng();
    ajaxMaplist();
  });
<?php } ?>
/* 지도 초기실행 - 끝 */
//우측 목록 애니매이트 효과 설정
var speed = 300;
jQuery('.<?php echo $__Context->skin_topdiv_class ?> .btn_open_map_list').toggle(function(){
  jQuery(this).animate({right:301}, speed);
  jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap').animate({right:0}, speed);
  jQuery(this).html('&raquo;');
},function(){
  jQuery(this).animate({right:0}, speed);
  jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_list_wrap').animate({right:-302}, speed);
  jQuery(this).html('&laquo;');
});
<?php if(Mobile::isMobileCheckByAgent() || $__Context->m==1){ ?>
  var fancybox_width = '100%';
  var fancybox_height = '80%';
<?php }else{ ?>
  var fancybox_width = '80%';
  var fancybox_height = '80%';
<?php } ?>
//VR 팬시박스 설정
jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_canvas .map_info_content .etc_area .btn_vr').fancybox({
	fitToView	: false,
	width		: fancybox_width,
	height		: fancybox_height,
	autoSize	: false,
	closeClick	: false,
	openEffect	: 'none',
	closeEffect	: 'none'
});
//미디어(유튜브,비메오) 팬시박스 설정
jQuery('.<?php echo $__Context->skin_topdiv_class ?> .map_canvas .map_info_content .etc_area .btn_media').fancybox({
	fitToView	: false,
	width		: fancybox_width,
	height		: fancybox_height,
	autoSize	: false,
	closeClick	: false,
	openEffect	: 'none',
	closeEffect	: 'none',
	helpers : {
		media : {}
	}
});
</script>
