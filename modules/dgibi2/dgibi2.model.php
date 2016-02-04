<?php
	class dgibi2Model extends dgibi2
	{
		public function triggerModuleListInSitemap(&$arr)
		{
			array_push($arr, 'dgibi2');
		}
	}
?>