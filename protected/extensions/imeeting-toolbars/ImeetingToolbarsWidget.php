 <?php
 class ImeetingToolbarsWidget extends CWidget {
 	public $_assetUrl;
	public $model;
	public $controller;
	public $mod = false;
	public $index = true;
 	public function init() {
        //$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets');
		$this->_assetUrl = Yii::app()->assetManager->publish(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets', false, -1, YII_DEBUG);
		
        parent::init();
    }
    
   
    public function run() {
        $this->registerScripts();
        $this->render('index', 
        		array(
        			'model'=>$this->model,
        			'controller'=>$this->controller,
        			'mod' => $this->mod,
        			'index' => $this->index
				)
			);
    }
    
    protected function registerScripts() {
        $clientScript = Yii::app()->clientScript;
		//register js
		
		//$clientScript->registerScriptFile($this->_assetUrl . '/js/jquery.easing.js');
		//$clientScript->registerScriptFile($this->_assetUrl . '/js/script.js');
			
        $clientScript->registerCssFile($this->_assetUrl . '/css/style.css');
		//$clientScript->registerCssFile($this->_assetUrl . '/css/style1.css');

    }
    
 }
?>