<?php 
class igrusboard extends ModuleObject
{
	private $triggers = array(
			array(
					'name' => 'menu.getModuleListInSitemap',
					'module' => 'igrusboard',
					'type' => 'model',
					'func' => 'triggerModuleListInSitemap',
					'position' => 'after'
		),
	);
	
	
	public function moduleInstall()
	{
		$oModuleController = getController('module');
		
		//트리거 추가
		foreach($this->triggers as $trigger)
		{
			$oModuleController->insertTrigger(
						$trigger['name'],
						$trigger['module'],
						$trigger['type'],
						$trigger['func'],
						$trigger['position']
					);
		}
		return new Object();
	}//모듈 쉬운 설치 시 호출
	
	public function checkUpdate()
	{
		$oModuleModel = getModel('module');
		
		// 트리거 확인
		foreach($this->triggers as $trigger)
		{
			$res = $oModuleModel->getTrigger(
				$trigger['name'],
				$trigger['module'],
				$trigger['type'],
				$trigger['func'],
				$trigger['position']
			);
			
			if (!$res)
			{
				return true;
			}
		}
		
		return false;
	}//모듈 업데이트 여부를 체크 필요시  true 리턴
	
	public function moduleUpdate()
	{
		$oModuleModel = getModel('module');
		$oModuleController = getController('module');
		
		// 트리거 확인 및 추가
		foreach($this->triggers as $trigger)
		{
			$res = $oModuleModel->getTrigger(
					$trigger['name'],
					$trigger['module'],
					$trigger['type'],
					$trigger['func'],
					$trigger['position']
			);
				
			if (!$res)
			{
				$oModuleController->insertTrigger(
						$trigger['name'],
						$trigger['module'],
						$trigger['type'],
						$trigger['func'],
						$trigger['position']
				);
			}
		}
		return new Object();
	}//모듈 업데이트 시 호출 됨
	
	public function moduleUninstall()
	{
		$oModuleController = getController('module');
		
		// 트리거 제거
		foreach($this->triggers as $trigger)
		{
			$res = $oModuleModel->deleteTrigger(
					$trigger['name'],
					$trigger['module'],
					$trigger['type'],
					$trigger['func'],
					$trigger['position']
			);
		}
		
		return new Object();
	}//모듈 삭제 시 호출 됨
}

?>