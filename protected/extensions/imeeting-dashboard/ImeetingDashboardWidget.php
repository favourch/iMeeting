 <?php
 class ImeetingDashboardWidget extends CWidget {
 	
	public $type = 'dashboard';
 	public function init() {
        //$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
	//	$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', false, -1, YII_DEBUG);

        parent::init();
    }


    public function run() {
	   	
		$role = array();
		if(Yii::app()->user->isGuest){
			$role['isGuest'] = true;
			$role['isUser'] = false;
			$role['isMod'] = fasle;
		}else{
			$role['isGuest'] = false;
			$role['isUser'] = true;
			$rights = Rights::getAssignedRoles(Yii::app()->user->id);
			foreach($rights as $r){
				if($r->name == Rights::module()->moderatorName){
					$role['isMod'] = true;
				}
			}
		}

		$role['isAdmin'] = Yii::app()->getModule('user')->isAdmin()	;
		if($this->type == 'dashboard')
			$this->render('dashboard', array('role'=>$role));
		else
			$this->render('quickshortcut', array('role'=>$role));
	}


 }
?>