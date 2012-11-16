 <?php
 class LofSliderWidget extends CWidget {
 	public $_assetUrl;
 	public function init() {
       //$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
		 $this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', false, -1, YII_DEBUG);
		
        parent::init();
    }
    
   
    public function run() {
        $this->registerScripts();
        $this->render('style1');
    }
    
    protected function registerScripts() {
        $clientScript = Yii::app()->clientScript;
		//register js
		$clientScript->registerCoreScript('jquery');
		$clientScript->registerScriptFile($this->_assetUrl . '/js/jquery.easing.js');
		$clientScript->registerScriptFile($this->_assetUrl . '/js/script.js');
			
        $clientScript->registerCssFile($this->_assetUrl . '/css/layout.css');
		$clientScript->registerCssFile($this->_assetUrl . '/css/style1.css');

    }
    
 }
?>