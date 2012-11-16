 <?php
 class EGuiderWidget extends CWidget {
 	public $_assetUrl;
	
 	public function init() {
        	$a = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR .'images' . DIRECTORY_SEPARATOR .'imeeting');
        $this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
		
		 //$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', false, -1, YII_DEBUG);
		
        parent::init();
    }
    
   
    public function run() {
        $this->registerScripts();
        $this->render('index');
    }
    
    protected function registerScripts() {
        $clientScript = Yii::app()->clientScript;
		//register js
		$clientScript->registerCoreScript('jquery');
		$clientScript->registerScriptFile($this->_assetUrl . '/js/guiders-1.2.3.js');
			
        $clientScript->registerCssFile($this->_assetUrl . '/css/guiders-1.2.3.css');
		

    }
    
 }
?>