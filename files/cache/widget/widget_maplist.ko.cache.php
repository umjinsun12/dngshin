<?php if(!defined("__XE__")) exit(); $widget_info->widget = "widget_maplist";$widget_info->path = "./widgets/widget_maplist/";$widget_info->title = "XENARA 맵리스트 위젯";$widget_info->description = "게시판의 게시글을 맵리스트로 출력하는 위젯입니다.";$widget_info->version = "0.1";$widget_info->date = "20141000";$widget_info->homepage = "";$widget_info->license = "";$widget_info->license_link = "";$widget_info->widget_srl = $widget_srl;$widget_info->widget_title = $widget_title;$widget_info->author[0]->name = "XENARA";$widget_info->author[0]->email_address = "kolaskks@naver.com";$widget_info->author[0]->homepage = "http://xenara.co.kr/";$widget_info->extra_var_count = "6";$widget_info->extra_var->module_srls->group = "목록 설정";$widget_info->extra_var->module_srls->name = "대상 모듈";$widget_info->extra_var->module_srls->type = "module_srl_list";$widget_info->extra_var->module_srls->value = $vars->module_srls;$widget_info->extra_var->module_srls->description = "선택하신 모듈에 등록된 글을 대상으로 합니다.";$widget_info->extra_var->list_count->group = "목록 설정";$widget_info->extra_var->list_count->name = "목록수";$widget_info->extra_var->list_count->type = "text";$widget_info->extra_var->list_count->value = $vars->list_count;$widget_info->extra_var->list_count->description = "출력될 목록의 수를 입력하세요.(기본: 20)";$widget_info->extra_var->order_target->group = "목록 설정";$widget_info->extra_var->order_target->name = "정렬 대상";$widget_info->extra_var->order_target->type = "select";$widget_info->extra_var->order_target->value = $vars->order_target;$widget_info->extra_var->order_target->description = "등록된 순서 또는 변경된 순서로 정렬을 할 수 있습니다.";$widget_info->extra_var->order_target->options["regdate"] = "등록순";$widget_info->extra_var->order_target->options["update_order"] = "변경순";$widget_info->extra_var->order_target->options["readed_count"] = "조회순";$widget_info->extra_var->order_target->options["voted_count"] = "추천순";$widget_info->extra_var->order_type->group = "목록 설정";$widget_info->extra_var->order_type->name = "정렬 방법";$widget_info->extra_var->order_type->type = "select";$widget_info->extra_var->order_type->value = $vars->order_type;$widget_info->extra_var->order_type->description = "정렬대상을 내림차순 또는 올림차순으로 정렬할 수 있습니다.";$widget_info->extra_var->order_type->options["desc"] = "내림차순";$widget_info->extra_var->order_type->options["asc"] = "올림차순";$widget_info->extra_var->shuffle_type->group = "목록 설정";$widget_info->extra_var->shuffle_type->name = "무작위 정렬유무";$widget_info->extra_var->shuffle_type->type = "select";$widget_info->extra_var->shuffle_type->value = $vars->shuffle_type;$widget_info->extra_var->shuffle_type->description = "무작위 정렬유무를 선택하세요. 목록이 무작위로 정렬됩니다.";$widget_info->extra_var->shuffle_type->options["N"] = "무작위 정렬 안함";$widget_info->extra_var->shuffle_type->options["Y"] = "무작위 정렬";$widget_info->extra_var->show_list->group = "목록 설정";$widget_info->extra_var->show_list->name = "목록 출력유무";$widget_info->extra_var->show_list->type = "select";$widget_info->extra_var->show_list->value = $vars->show_list;$widget_info->extra_var->show_list->description = "목록 출력유무를 선택하세요.";$widget_info->extra_var->show_list->options["Y"] = "출력";$widget_info->extra_var->show_list->options["N"] = "출력 안함";$widget_info->extra_var_count = "5";$widget_info->extra_var->map_width->group = "지도기본 설정";$widget_info->extra_var->map_width->name = "지도 가로크기";$widget_info->extra_var->map_width->type = "text";$widget_info->extra_var->map_width->value = $vars->map_width;$widget_info->extra_var->map_width->description = "지도 가로크기를 입력하세요. (기본: 100%)";$widget_info->extra_var->map_height->group = "지도기본 설정";$widget_info->extra_var->map_height->name = "지도 세로크기";$widget_info->extra_var->map_height->type = "text";$widget_info->extra_var->map_height->value = $vars->map_height;$widget_info->extra_var->map_height->description = "지도 세로크기를 입력하세요. (기본: 500)";$widget_info->extra_var->m_map_width->group = "지도기본 설정";$widget_info->extra_var->m_map_width->name = "모바일 지도 가로크기";$widget_info->extra_var->m_map_width->type = "text";$widget_info->extra_var->m_map_width->value = $vars->m_map_width;$widget_info->extra_var->m_map_width->description = "모바일 지도 가로크기를 입력하세요. (기본: 100%)";$widget_info->extra_var->m_map_height->group = "지도기본 설정";$widget_info->extra_var->m_map_height->name = "모바일 지도 세로크기";$widget_info->extra_var->m_map_height->type = "text";$widget_info->extra_var->m_map_height->value = $vars->m_map_height;$widget_info->extra_var->m_map_height->description = "모바일 지도 세로크기를 입력하세요. (기본: 300)";$widget_info->extra_var->current_type->group = "지도기본 설정";$widget_info->extra_var->current_type->name = "현위치 기준 목록출력 유무";$widget_info->extra_var->current_type->type = "select";$widget_info->extra_var->current_type->value = $vars->current_type;$widget_info->extra_var->current_type->description = "현위치 기준으로 목록을 출력할 것인지를 선택하세요. 단, GPS가능지역이어야 합니다.";$widget_info->extra_var->current_type->options["N"] = "현위치 기준 출력안함";$widget_info->extra_var->current_type->options["Y"] = "현위치 기준 출력";$widget_info->extra_var_count = "14";$widget_info->extra_var->info_content_width->group = "지도 정보박스 설정";$widget_info->extra_var->info_content_width->name = "정보박스 가로크기";$widget_info->extra_var->info_content_width->type = "text";$widget_info->extra_var->info_content_width->value = $vars->info_content_width;$widget_info->extra_var->info_content_width->description = "지도 정보박스 가로크기를 입력하세요. (기본: 300)";$widget_info->extra_var->info_content_height->group = "지도 정보박스 설정";$widget_info->extra_var->info_content_height->name = "정보박스 세로크기";$widget_info->extra_var->info_content_height->type = "text";$widget_info->extra_var->info_content_height->value = $vars->info_content_height;$widget_info->extra_var->info_content_height->description = "정보박스 세로크기를 입력하세요.";$widget_info->extra_var->subject_cut_size->group = "지도 정보박스 설정";$widget_info->extra_var->subject_cut_size->name = "정보박스 제목 글자수";$widget_info->extra_var->subject_cut_size->type = "text";$widget_info->extra_var->subject_cut_size->value = $vars->subject_cut_size;$widget_info->extra_var->subject_cut_size->description = "정보박스 제목 글자수를 입력하세요. (0또는 비워주시면 자르지 않습니다.)";$widget_info->extra_var->content_cut_size->group = "지도 정보박스 설정";$widget_info->extra_var->content_cut_size->name = "정보박스 내용 글자수";$widget_info->extra_var->content_cut_size->type = "text";$widget_info->extra_var->content_cut_size->value = $vars->content_cut_size;$widget_info->extra_var->content_cut_size->description = "정보박스 내용 글자수를 입력하세요. (기본: 100)";$widget_info->extra_var->thumbnail_width->group = "지도 정보박스 설정";$widget_info->extra_var->thumbnail_width->name = "정보박스 썸네일 가로크기";$widget_info->extra_var->thumbnail_width->type = "text";$widget_info->extra_var->thumbnail_width->value = $vars->thumbnail_width;$widget_info->extra_var->thumbnail_width->description = "출력될 썸네일의 가로크기를 입력하세요. (기본: 100)";$widget_info->extra_var->thumbnail_height->group = "지도 정보박스 설정";$widget_info->extra_var->thumbnail_height->name = "정보박스 썸네일 세로크기";$widget_info->extra_var->thumbnail_height->type = "text";$widget_info->extra_var->thumbnail_height->value = $vars->thumbnail_height;$widget_info->extra_var->thumbnail_height->description = "썸네일의 세로크기를 입력하세요. (기본: 75)";$widget_info->extra_var->show_info_content_extarvars->group = "지도 정보박스 설정";$widget_info->extra_var->show_info_content_extarvars->name = "정보박스 하단 사용자정의 출력유무";$widget_info->extra_var->show_info_content_extarvars->type = "select";$widget_info->extra_var->show_info_content_extarvars->value = $vars->show_info_content_extarvars;$widget_info->extra_var->show_info_content_extarvars->description = "정보박스 하단 사용자정의 출력유무를 선택하세요.";$widget_info->extra_var->show_info_content_extarvars->options["Y"] = "출력";$widget_info->extra_var->show_info_content_extarvars->options["N"] = "출력안함";$widget_info->extra_var->info_content_extar_eids->group = "지도 정보박스 설정";$widget_info->extra_var->info_content_extar_eids->name = "정보박스 사용자정의 지정출력";$widget_info->extra_var->info_content_extar_eids->type = "text";$widget_info->extra_var->info_content_extar_eids->value = $vars->info_content_extar_eids;$widget_info->extra_var->info_content_extar_eids->description = "정보박스에 출력할 사용자정의이름(eid)을 입력하세요. 정보박스에 지정한 사용자정의만 출력합니다. 여러개일 경우 콤마(,)로 구분하여 입력하세요. 입력하지 않을 경우 전체를 출력합니다.";$widget_info->extra_var->m_info_content_width->group = "지도 정보박스 설정";$widget_info->extra_var->m_info_content_width->name = "모바일 정보박스 가로크기";$widget_info->extra_var->m_info_content_width->type = "text";$widget_info->extra_var->m_info_content_width->value = $vars->m_info_content_width;$widget_info->extra_var->m_info_content_width->description = "모바일 지도 정보박스 가로크기를 입력하세요. (기본: 220)";$widget_info->extra_var->m_info_content_height->group = "지도 정보박스 설정";$widget_info->extra_var->m_info_content_height->name = "모바일 정보박스 세로크기";$widget_info->extra_var->m_info_content_height->type = "text";$widget_info->extra_var->m_info_content_height->value = $vars->m_info_content_height;$widget_info->extra_var->m_info_content_height->description = "모바일 정보박스 세로크기를 입력하세요.";$widget_info->extra_var->m_subject_cut_size->group = "지도 정보박스 설정";$widget_info->extra_var->m_subject_cut_size->name = "모바일 정보박스 제목 글자수";$widget_info->extra_var->m_subject_cut_size->type = "text";$widget_info->extra_var->m_subject_cut_size->value = $vars->m_subject_cut_size;$widget_info->extra_var->m_subject_cut_size->description = "정보박스 제목 글자수를 입력하세요. (0또는 비워주시면 자르지 않습니다.)";$widget_info->extra_var->m_content_cut_size->group = "지도 정보박스 설정";$widget_info->extra_var->m_content_cut_size->name = "모바일 정보박스 내용 글자수";$widget_info->extra_var->m_content_cut_size->type = "text";$widget_info->extra_var->m_content_cut_size->value = $vars->m_content_cut_size;$widget_info->extra_var->m_content_cut_size->description = "정보박스 내용 글자수를 입력하세요. (기본: 100)";$widget_info->extra_var->m_thumbnail_width->group = "지도 정보박스 설정";$widget_info->extra_var->m_thumbnail_width->name = "모바일 정보박스 썸네일 가로크기";$widget_info->extra_var->m_thumbnail_width->type = "text";$widget_info->extra_var->m_thumbnail_width->value = $vars->m_thumbnail_width;$widget_info->extra_var->m_thumbnail_width->description = "모바일 출력될 썸네일의 가로크기를 입력하세요. (기본: 80)";$widget_info->extra_var->m_thumbnail_height->group = "지도 정보박스 설정";$widget_info->extra_var->m_thumbnail_height->name = "모바일 정보박스 썸네일 세로크기";$widget_info->extra_var->m_thumbnail_height->type = "text";$widget_info->extra_var->m_thumbnail_height->value = $vars->m_thumbnail_height;$widget_info->extra_var->m_thumbnail_height->description = "모바일 썸네일의 세로크기를 입력하세요. (기본: 50)";$widget_info->extra_var_count = "5";$widget_info->extra_var->google_map_key->group = "구글지도 설정(구글스킨)";$widget_info->extra_var->google_map_key->name = "구글지도 API KEY";$widget_info->extra_var->google_map_key->type = "text";$widget_info->extra_var->google_map_key->value = $vars->google_map_key;$widget_info->extra_var->google_map_key->description = "구글지도 API KEY를 입력하세요. (필수)";$widget_info->extra_var->google_markercluster->group = "구글지도 설정(구글스킨)";$widget_info->extra_var->google_markercluster->name = "마커클러스터 적용유무";$widget_info->extra_var->google_markercluster->type = "select";$widget_info->extra_var->google_markercluster->value = $vars->google_markercluster;$widget_info->extra_var->google_markercluster->description = "마커클러스터 적용유무를 선택하세요. 적용할 경우, 서로 가까운 마커는 그룹화되어 나타납니다.";$widget_info->extra_var->google_markercluster->options["Y"] = "적용";$widget_info->extra_var->google_markercluster->options["N"] = "적용 안함";$widget_info->extra_var->map_zoom->group = "구글지도 설정(구글스킨)";$widget_info->extra_var->map_zoom->name = "지도 줌번호";$widget_info->extra_var->map_zoom->type = "text";$widget_info->extra_var->map_zoom->value = $vars->map_zoom;$widget_info->extra_var->map_zoom->description = "지도 줌번호를 입력하세요. 0~18 사이의 숫자를 입력하세요. (기본: 13)";$widget_info->extra_var->map_lat_range->group = "구글지도 설정(구글스킨)";$widget_info->extra_var->map_lat_range->name = "지도 위도 초기범위";$widget_info->extra_var->map_lat_range->type = "text";$widget_info->extra_var->map_lat_range->value = $vars->map_lat_range;$widget_info->extra_var->map_lat_range->description = "지도 위도 초기범위를 입력하세요. 숫자만 입력하세요. (기본: 1)";$widget_info->extra_var->map_lng_range->group = "구글지도 설정(구글스킨)";$widget_info->extra_var->map_lng_range->name = "지도 경도 초기범위";$widget_info->extra_var->map_lng_range->type = "text";$widget_info->extra_var->map_lng_range->value = $vars->map_lng_range;$widget_info->extra_var->map_lng_range->description = "지도 경도 초기범위를 입력하세요. 숫자만 입력하세요. (기본: 1)";$widget_info->extra_var_count = "2";$widget_info->extra_var->daum_map_key->group = "다음지도 설정(다음스킨)";$widget_info->extra_var->daum_map_key->name = "다음지도 API KEY";$widget_info->extra_var->daum_map_key->type = "text";$widget_info->extra_var->daum_map_key->value = $vars->daum_map_key;$widget_info->extra_var->daum_map_key->description = "다음지도 API KEY를 입력하세요. (필수)";$widget_info->extra_var->daum_map_zoom->group = "다음지도 설정(다음스킨)";$widget_info->extra_var->daum_map_zoom->name = "지도 줌번호";$widget_info->extra_var->daum_map_zoom->type = "text";$widget_info->extra_var->daum_map_zoom->value = $vars->daum_map_zoom;$widget_info->extra_var->daum_map_zoom->description = "지도 줌번호를 입력하세요. 1~14 사이의 숫자를 입력하세요. (기본: 3)";$widget_info->extra_var_count = "1";$widget_info->extra_var->m_scroll_top->group = "기타 설정";$widget_info->extra_var->m_scroll_top->name = "모바일 목록 스크롤 상단위치";$widget_info->extra_var->m_scroll_top->type = "text";$widget_info->extra_var->m_scroll_top->value = $vars->m_scroll_top;$widget_info->extra_var->m_scroll_top->description = "모바일 목록을 클릭 시 스크롤이동 상단위치를 입력하세요. 지원하는 스킨에만 적용가능합니다. (기본: 100)"; ?>