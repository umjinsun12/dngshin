<?php
	class dgibiModel extends dgibi
	{
		public function triggerModuleListInSitemap(&$arr)
		{
			array_push($arr, 'dgibi');
		}
	}
?>