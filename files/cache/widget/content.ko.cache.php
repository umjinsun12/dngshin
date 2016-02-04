<?php if(!defined("__XE__")) exit(); $widget_info->widget = "content";$widget_info->path = "./widgets/content/";$widget_info->title = "Content 위젯";$widget_info->description = "게시판, 코멘트, 첨부파일 등 Content를 출력하는 위젯입니다.";$widget_info->version = "1.7";$widget_info->date = "20131127";$widget_info->homepage = "";$widget_info->license = "";$widget_info->license_link = "";$widget_info->widget_srl = $widget_srl;$widget_info->widget_title = $widget_title;$widget_info->author[0]->name = "NAVER";$widget_info->author[0]->email_address = "developers@xpressengine.com";$widget_info->author[0]->homepage = "http://xpressengine.com/";$widget_info->extra_var_count = "12";$widget_info->extra_var->content_type->group = "추출 대상";$widget_info->extra_var->content_type->name = "추출대상";$widget_info->extra_var->content_type->type = "select";$widget_info->extra_var->content_type->value = $vars->content_type;$widget_info->extra_var->content_type->description = "";$widget_info->extra_var->content_type->options["document"] = "게시물";$widget_info->extra_var->content_type->options["comment"] = "댓글";$widget_info->extra_var->content_type->options["image"] = "첨부이미지";$widget_info->extra_var->content_type->options["trackback"] = "트랙백";$widget_info->extra_var->content_type->options["rss"] = "피드 (RSS/ATOM)";$widget_info->extra_var->module_srls->group = "추출 대상";$widget_info->extra_var->module_srls->name = "대상 페이지";$widget_info->extra_var->module_srls->type = "module_srl_list";$widget_info->extra_var->module_srls->value = $vars->module_srls;$widget_info->extra_var->module_srls->description = "선택한 페이지에 등록된 글을 대상으로 합니다.";$widget_info->extra_var->list_type->group = "추출 대상";$widget_info->extra_var->list_type->name = "내용형태";$widget_info->extra_var->list_type->type = "select";$widget_info->extra_var->list_type->value = $vars->list_type;$widget_info->extra_var->list_type->description = "";$widget_info->extra_var->list_type->options["normal"] = "제목";$widget_info->extra_var->list_type->options["image_title"] = "이미지+제목";$widget_info->extra_var->list_type->options["image_title_content"] = "이미지+제목+내용";$widget_info->extra_var->list_type->options["gallery"] = "갤러리";$widget_info->extra_var->tab_type->group = "추출 대상";$widget_info->extra_var->tab_type->name = "탭형태";$widget_info->extra_var->tab_type->type = "select";$widget_info->extra_var->tab_type->value = $vars->tab_type;$widget_info->extra_var->tab_type->description = "";$widget_info->extra_var->tab_type->options["none"] = "없음";$widget_info->extra_var->tab_type->options["tab_top"] = "상단 탭형";$widget_info->extra_var->tab_type->options["tab_left"] = "왼쪽 탭형";$widget_info->extra_var->markup_type->group = "추출 대상";$widget_info->extra_var->markup_type->name = "HTML 출력 방식";$widget_info->extra_var->markup_type->type = "select";$widget_info->extra_var->markup_type->value = $vars->markup_type;$widget_info->extra_var->markup_type->description = "TABLE(표)태그와 UL(목록형) 태그를 선택하여 출력하게 할 수 있습니다. (기본은 TABLE입니다)";$widget_info->extra_var->markup_type->options["table"] = "Table";$widget_info->extra_var->markup_type->options["list"] = "UL (list)";$widget_info->extra_var->list_count->group = "추출 대상";$widget_info->extra_var->list_count->name = "목록수";$widget_info->extra_var->list_count->type = "text";$widget_info->extra_var->list_count->value = $vars->list_count;$widget_info->extra_var->list_count->description = "출력될 목록의 수를 정할 수 있습니다. (기본 5개)";$widget_info->extra_var->cols_list_count->group = "추출 대상";$widget_info->extra_var->cols_list_count->name = "가로 이미지 수";$widget_info->extra_var->cols_list_count->type = "text";$widget_info->extra_var->cols_list_count->value = $vars->cols_list_count;$widget_info->extra_var->cols_list_count->description = "출력될 가로 이미지의 수를 정할 수 있습니다. (기본 5개)";$widget_info->extra_var->page_count->group = "추출 대상";$widget_info->extra_var->page_count->name = "페이지 수";$widget_info->extra_var->page_count->type = "select";$widget_info->extra_var->page_count->value = $vars->page_count;$widget_info->extra_var->page_count->description = "페이지수 2이상일 경우 이전/다음 버튼이 나타납니다.";$widget_info->extra_var->page_count->options["1"] = "1";$widget_info->extra_var->page_count->options["2"] = "2";$widget_info->extra_var->page_count->options["3"] = "3";$widget_info->extra_var->subject_cut_size->group = "추출 대상";$widget_info->extra_var->subject_cut_size->name = "제목 글자수";$widget_info->extra_var->subject_cut_size->type = "text";$widget_info->extra_var->subject_cut_size->value = $vars->subject_cut_size;$widget_info->extra_var->subject_cut_size->description = "제목 글자수를 지정할 수 있습니다. (0또는 비우면 자르지 않습니다)";$widget_info->extra_var->content_cut_size->group = "추출 대상";$widget_info->extra_var->content_cut_size->name = "내용 글자수";$widget_info->extra_var->content_cut_size->type = "text";$widget_info->extra_var->content_cut_size->value = $vars->content_cut_size;$widget_info->extra_var->content_cut_size->description = "";$widget_info->extra_var->nickname_cut_size->group = "추출 대상";$widget_info->extra_var->nickname_cut_size->name = "닉네임 글자수";$widget_info->extra_var->nickname_cut_size->type = "text";$widget_info->extra_var->nickname_cut_size->value = $vars->nickname_cut_size;$widget_info->extra_var->nickname_cut_size->description = "";$widget_info->extra_var->new_window->group = "추출 대상";$widget_info->extra_var->new_window->name = "링크";$widget_info->extra_var->new_window->type = "select";$widget_info->extra_var->new_window->value = $vars->new_window;$widget_info->extra_var->new_window->description = "";$widget_info->extra_var->new_window->options[""] = "현재창에서 열기";$widget_info->extra_var->new_window->options["Y"] = "새창에서 열기";$widget_info->extra_var_count = "7";$widget_info->extra_var->option_view->group = "목록 상세 설정";$widget_info->extra_var->option_view->name = "표시항목 및 순서";$widget_info->extra_var->option_view->type = "select-multi-order";$widget_info->extra_var->option_view->value = $vars->option_view;$widget_info->extra_var->option_view->description = "";$widget_info->extra_var->option_view->options["title"] = "제목";$widget_info->extra_var->option_view->init_options["title"] = true;$widget_info->extra_var->option_view->options["thumbnail"] = "섬네일";$widget_info->extra_var->option_view->options["regdate"] = "등록일";$widget_info->extra_var->option_view->init_options["regdate"] = true;$widget_info->extra_var->option_view->options["nickname"] = "글쓴이";$widget_info->extra_var->option_view->init_options["nickname"] = true;$widget_info->extra_var->option_view->options["content"] = "내용";$widget_info->extra_var->show_browser_title->group = "목록 상세 설정";$widget_info->extra_var->show_browser_title->name = "게시판 이름 표시";$widget_info->extra_var->show_browser_title->type = "select";$widget_info->extra_var->show_browser_title->value = $vars->show_browser_title;$widget_info->extra_var->show_browser_title->description = "";$widget_info->extra_var->show_browser_title->options["Y"] = "출력";$widget_info->extra_var->show_browser_title->options["N"] = "출력하지 않음";$widget_info->extra_var->show_comment_count->group = "목록 상세 설정";$widget_info->extra_var->show_comment_count->name = "댓글수 표시";$widget_info->extra_var->show_comment_count->type = "select";$widget_info->extra_var->show_comment_count->value = $vars->show_comment_count;$widget_info->extra_var->show_comment_count->description = "";$widget_info->extra_var->show_comment_count->options["Y"] = "출력";$widget_info->extra_var->show_comment_count->options["N"] = "출력하지 않음";$widget_info->extra_var->show_trackback_count->group = "목록 상세 설정";$widget_info->extra_var->show_trackback_count->name = "엮인글수 표시";$widget_info->extra_var->show_trackback_count->type = "select";$widget_info->extra_var->show_trackback_count->value = $vars->show_trackback_count;$widget_info->extra_var->show_trackback_count->description = "";$widget_info->extra_var->show_trackback_count->options["Y"] = "출력";$widget_info->extra_var->show_trackback_count->options["N"] = "출력하지 않음";$widget_info->extra_var->show_category->group = "목록 상세 설정";$widget_info->extra_var->show_category->name = "분류 표시";$widget_info->extra_var->show_category->type = "select";$widget_info->extra_var->show_category->value = $vars->show_category;$widget_info->extra_var->show_category->description = "";$widget_info->extra_var->show_category->options["Y"] = "출력";$widget_info->extra_var->show_category->options["N"] = "출력하지 않음";$widget_info->extra_var->show_icon->group = "목록 상세 설정";$widget_info->extra_var->show_icon->name = "아이콘 표시";$widget_info->extra_var->show_icon->type = "select";$widget_info->extra_var->show_icon->value = $vars->show_icon;$widget_info->extra_var->show_icon->description = "";$widget_info->extra_var->show_icon->options["Y"] = "출력";$widget_info->extra_var->show_icon->options["N"] = "출력하지 않음";$widget_info->extra_var->duration_new->group = "목록 상세 설정";$widget_info->extra_var->duration_new->name = "new 표시 시간 (hours)";$widget_info->extra_var->duration_new->type = "text";$widget_info->extra_var->duration_new->value = $vars->duration_new;$widget_info->extra_var->duration_new->description = "새로 등록된 게시물의 new 표시시간을 정할 수 있습니다. (시간 단위)";$widget_info->extra_var_count = "2";$widget_info->extra_var->order_target->group = "정렬";$widget_info->extra_var->order_target->name = "정렬 대상";$widget_info->extra_var->order_target->type = "select";$widget_info->extra_var->order_target->value = $vars->order_target;$widget_info->extra_var->order_target->description = "등록된 순서 또는 변경된 순서로 정렬을 할 수 있습니다.";$widget_info->extra_var->order_target->options["regdate"] = "최신 등록순";$widget_info->extra_var->order_target->options["update_order"] = "최근 변경순";$widget_info->extra_var->order_type->group = "정렬";$widget_info->extra_var->order_type->name = "정렬 방법";$widget_info->extra_var->order_type->type = "select";$widget_info->extra_var->order_type->value = $vars->order_type;$widget_info->extra_var->order_type->description = "정렬대상을 내림차순 또는 올림차순으로 정렬할 수 있습니다.";$widget_info->extra_var->order_type->options["desc"] = "내림차순";$widget_info->extra_var->order_type->options["asc"] = "올림차순";$widget_info->extra_var_count = "3";$widget_info->extra_var->thumbnail_type->group = "썸네일";$widget_info->extra_var->thumbnail_type->name = "썸네일 생성 방법";$widget_info->extra_var->thumbnail_type->type = "select";$widget_info->extra_var->thumbnail_type->value = $vars->thumbnail_type;$widget_info->extra_var->thumbnail_type->description = "썸네일 생성 방법을 선택할 수 있습니다. (crop : 꽉 채우기, ratio : 비율 맞추기)";$widget_info->extra_var->thumbnail_type->options["crop"] = "Crop (채우기)";$widget_info->extra_var->thumbnail_type->options["ratio"] = "Ratio (비율 맞추기)";$widget_info->extra_var->thumbnail_width->group = "썸네일";$widget_info->extra_var->thumbnail_width->name = "이미지 가로크기";$widget_info->extra_var->thumbnail_width->type = "text";$widget_info->extra_var->thumbnail_width->value = $vars->thumbnail_width;$widget_info->extra_var->thumbnail_width->description = "출력될 이미지의 가로크기를 정할 수 있습니다. (기본 100)";$widget_info->extra_var->thumbnail_height->group = "썸네일";$widget_info->extra_var->thumbnail_height->name = "이미지 세로크기";$widget_info->extra_var->thumbnail_height->type = "text";$widget_info->extra_var->thumbnail_height->value = $vars->thumbnail_height;$widget_info->extra_var->thumbnail_height->description = "이미지의 세로 크기를 지정할 수 있습니다. (기본 75)";$widget_info->extra_var_count = "5";$widget_info->extra_var->rss_url0->group = "RSS 설정";$widget_info->extra_var->rss_url0->name = "피드(RSS/ATOM) 주소";$widget_info->extra_var->rss_url0->type = "text";$widget_info->extra_var->rss_url0->value = $vars->rss_url0;$widget_info->extra_var->rss_url0->description = "피드 주소는 타입이 지원하는 문서 형식일 경우에만 등록 됩니다.
                (지원 문서 형식 : RSS 2.0, RSS 1.0, ATOM 1.0)";$widget_info->extra_var->rss_url1->group = "RSS 설정";$widget_info->extra_var->rss_url1->name = "피드(RSS/ATOM) 주소";$widget_info->extra_var->rss_url1->type = "text";$widget_info->extra_var->rss_url1->value = $vars->rss_url1;$widget_info->extra_var->rss_url1->description = "";$widget_info->extra_var->rss_url2->group = "RSS 설정";$widget_info->extra_var->rss_url2->name = "피드(RSS/ATOM) 주소";$widget_info->extra_var->rss_url2->type = "text";$widget_info->extra_var->rss_url2->value = $vars->rss_url2;$widget_info->extra_var->rss_url2->description = "";$widget_info->extra_var->rss_url3->group = "RSS 설정";$widget_info->extra_var->rss_url3->name = "피드(RSS/ATOM) 주소";$widget_info->extra_var->rss_url3->type = "text";$widget_info->extra_var->rss_url3->value = $vars->rss_url3;$widget_info->extra_var->rss_url3->description = "";$widget_info->extra_var->rss_url4->group = "RSS 설정";$widget_info->extra_var->rss_url4->name = "피드(RSS/ATOM) 주소";$widget_info->extra_var->rss_url4->type = "text";$widget_info->extra_var->rss_url4->value = $vars->rss_url4;$widget_info->extra_var->rss_url4->description = ""; ?>