<?php

class igrusboardModel extends igrusboard
{
	// 메뉴 편집의 메뉴 추가에 모듈이 나올 수 있도록 추가
	public function triggerModuleListInSitemap(&$arr)
	{
		array_push($arr, 'igrusboard');
	}
}