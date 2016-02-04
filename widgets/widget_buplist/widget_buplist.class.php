<?php
    /**
     * @class widget_buplist
     * @author IGRUS (umjinsun12@gmail.com)
     * @brief widget to display maplist
     * @version 0.1
     **/

 


    class widget_buplist extends WidgetHandler {

        function proc($args) {

            $oDocumentModel = &getModel('document');

              //��� ���� ����
            $map_obj->module_srl = $args->module_srls;
            if($args->list_count){
              $map_obj->list_count = $args->list_count;
            } else{
              $map_obj->list_count = 20;
            }
            if($args->page_count){
              $map_obj->page_count = $args->page_count;
            } else{
              $map_obj->page_count = 10;
            }
            if($args->order_target){
              $map_obj->sort_index = $args->order_target;
            } else{
              $map_obj->sort_index = 'regdate';
            }
            if($args->order_type){
              $map_obj->order_type = $args->order_type;
            } else{
              $map_obj->order_type = 'desc';
            }
            if($args->shuffle_type){
              $map_obj->shuffle_type = $args->shuffle_type;
            } else{
              $map_obj->shuffle_type = 'N';
            }
            if($args->show_list){
              $map_obj->show_list = $args->show_list;
            } else{
              $map_obj->show_list = 'Y';
            }



            //���� ���۽� ó������
            if(Context::get('xenara_ajax')=='y'){
              if(Context::get('lat_south'))  $map_obj->min_map_latitude = Context::get('lat_south');
              if(Context::get('lat_north'))  $map_obj->max_map_latitude = Context::get('lat_north');
              if(Context::get('lng_west'))  $map_obj->min_map_longitude = Context::get('lng_west');
              if(Context::get('lng_east'))  $map_obj->max_map_longitude = Context::get('lng_east');
            }


            //��������Ʈ ���� �� ���� ����
            $map_output = executeQueryArray('widgets.widget_maplist.getMapDocumentList', $map_obj);
            $map_list = $map_output->data;


            //������� ��������
            if($map_obj->shuffle_type=='Y'){
              shuffle($map_list);
            }


            //�����⺻ ���� ����
            if($args->map_width){
              $map_obj->map_width = $args->map_width.'px';
            } else{
              $map_obj->map_width = '100%';
            }
            if($args->map_height){
              $map_obj->map_height = $args->map_height;
            } else{
              $map_obj->map_height = '500';
            }
            //����ġ ���� ������ ����
            if($args->current_type){
              $map_obj->current_type = $args->current_type;
            } else{
              $map_obj->current_type = 'N';
            }
            //������� ���
            if(Mobile::isMobileCheckByAgent()){
              if($args->m_map_width){
                $map_obj->map_width = $args->m_map_width;
              } else{
                $map_obj->map_width = '100%';
              }
              if($args->m_map_height){
                $map_obj->map_height = $args->m_map_height;
              } else{
                $map_obj->map_height = '300';
              }
            }


            //�������� ���� ����
            if($args->google_map_key){
              $map_obj->google_map_key = $args->google_map_key;
            }
            if($args->google_markercluster){
              $map_obj->google_markercluster = $args->google_markercluster;
            } else{
              $map_obj->google_markercluster = 'Y';
            }
            if($args->map_zoom){
              $map_obj->map_zoom = $args->map_zoom;
            } else{
              $map_obj->map_zoom = 13;
            }
            if($args->map_lat_range){
              $map_obj->map_lat_range = $args->map_lat_range;
            } else{
              $map_obj->map_lat_range = 1;
            }
            if($args->map_lng_range){
              $map_obj->map_lng_range = $args->map_lng_range;
            } else{
              $map_obj->map_lng_range = 1;
            }


            //�������� ���� ����
            if($args->daum_map_key){
              $map_obj->daum_map_key = $args->daum_map_key;
            }
            if($args->daum_map_zoom){
              $map_obj->daum_map_zoom = $args->daum_map_zoom;
            } else{
              $map_obj->daum_map_zoom = 3;
            }


            //���� �����ڽ� ���� ����
            if($args->info_content_width){
              $map_obj->info_content_width = $args->info_content_width;
            } else{
              $map_obj->info_content_width = 300;
            }
            if($args->info_content_height){
              $map_obj->info_content_height = $args->info_content_height;
            } else{
              $map_obj->info_content_height = '';
            }
            if($args->subject_cut_size){
              $map_obj->subject_cut_size = $args->subject_cut_size;
            }
            if($args->content_cut_size){
              $map_obj->content_cut_size = $args->content_cut_size;
            } else{
              $map_obj->content_cut_size = 100;
            }
            if($args->thumbnail_width){
              $map_obj->thumbnail_width = $args->thumbnail_width;
            } else{
              $map_obj->thumbnail_width = 100;
            }
            if($args->thumbnail_height){
              $map_obj->thumbnail_height = $args->thumbnail_height;
            } else{
              $map_obj->thumbnail_height = 75;
            }
            if($args->show_info_content_extarvars){
              $map_obj->show_info_content_extarvars = $args->show_info_content_extarvars;
            } else{
              $map_obj->show_info_content_extarvars = 'Y';
            }
            if($args->info_content_extar_eids){
              $map_obj->info_content_extar_eids = explode(',',$args->info_content_extar_eids);
            } else{
              $map_obj->info_content_extar_eids = '';
            }

            //������� ���
            if(Mobile::isMobileCheckByAgent()){
              if($args->m_info_content_width){
                $map_obj->info_content_width = $args->m_info_content_width;
              } else{
                $map_obj->info_content_width = 220;
              }
              if($args->m_info_content_height){
                $map_obj->info_content_height = $args->m_info_content_height;
              }
              if($args->m_subject_cut_size){
                $map_obj->subject_cut_size = $args->m_subject_cut_size;
              }
              if($args->m_content_cut_size){
                $map_obj->content_cut_size = $args->m_content_cut_size;
              } else{
                $map_obj->content_cut_size = 100;
              }
              if($args->m_thumbnail_width){
                $map_obj->thumbnail_width = $args->m_thumbnail_width;
              } else{
                $map_obj->thumbnail_width = 80;
              }
              if($args->m_thumbnail_height){
                $map_obj->thumbnail_height = $args->m_thumbnail_height;
              } else{
                $map_obj->thumbnail_height = 50;
              }
            }


            //��Ÿ ����
            if($args->m_scroll_top){
              $map_obj->m_scroll_top = $args->m_scroll_top;
            } else{
              $map_obj->m_scroll_top = 100;
            }

            //��Ų�� ��������
            $map_obj->skin = $args->skin;

            //���ø� ���� ����
            Context::set('map_obj', $map_obj);
            Context::set('colorset', $args->colorset);
            Context::set('map_list', $map_list);


            //���ø� ��ü���� �� ��Ų���� ������
            $oTemplate = &TemplateHandler::getInstance();
            $tpl_path = sprintf('%sskins/%s', $this->widget_path, $args->skin);
            return $oTemplate->compile($tpl_path, "buplist");

        }
    }
?>
