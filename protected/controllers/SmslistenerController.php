<?php
class SmslistenerController extends Controller{
	public $layout = "//layouts/blank";
	public function actionIndex(){
		if(isset($_GET['mobilenumber']) && isset($_GET['msg'])){
			$mobilenumber = isset($_GET['mobilenumber']) ? $_GET['mobilenumber']  : '';
			$message      = isset($_GET['msg'])          ? urldecode($_GET['msg']): '';
			
			/*step2, process info and get result*/
			$return = $message;
			
			/*return result by echo it*/
			echo $return;
			}
		}
}
?>