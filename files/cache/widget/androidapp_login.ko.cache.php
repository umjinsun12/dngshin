<?php if(!defined("__XE__")) exit(); $widget_info->widget = "androidapp_login";$widget_info->path = "./widgets/androidapp_login/";$widget_info->title = "안드로이드푸시앱연동 로그인 위젯";$widget_info->description = "안드로이드푸시 앱 첫 화면 로그인 페이지입니다. 다른 용도로 사용불가합니다.";$widget_info->version = "1.3";$widget_info->date = "20150714";$widget_info->homepage = "";$widget_info->license = "";$widget_info->license_link = "";$widget_info->widget_srl = $widget_srl;$widget_info->widget_title = $widget_title;$widget_info->author[0]->name = "단희아빠";$widget_info->author[0]->email_address = "ubfspringx@naver.com";$widget_info->author[0]->homepage = "http://xepushapp.com/";$widget_info->extra_var_count = "3";$widget_info->extra_var->app_name->group = "";$widget_info->extra_var->app_name->name = "앱 명칭";$widget_info->extra_var->app_name->type = "text";$widget_info->extra_var->app_name->value = $vars->app_name;$widget_info->extra_var->app_name->description = "";$widget_info->extra_var->top_text->group = "";$widget_info->extra_var->top_text->name = "상단에 보일 텍스트";$widget_info->extra_var->top_text->type = "text";$widget_info->extra_var->top_text->value = $vars->top_text;$widget_info->extra_var->top_text->description = "상단에 보일 텍스트를 선택해주세요. 소셜로그인 스킨에서는 입력해도 보이지 않습니다. 예) 로그인을 해주세요. 지금 로그인을 하시면 쪽지와 필요한 댓글만 알림받으실 수 있습니다.";$widget_info->extra_var->social_text->group = "";$widget_info->extra_var->social_text->name = "소셜로그인 버튼에 보일 텍스트";$widget_info->extra_var->social_text->type = "text";$widget_info->extra_var->social_text->value = $vars->social_text;$widget_info->extra_var->social_text->description = "소셜로그인 스킨을 사용할 경우만 입력해주세요. 가능한 소셜만 다음과 같이 적어주시면 됩니다. 예) Naver|twitter|google|facebook "; ?>