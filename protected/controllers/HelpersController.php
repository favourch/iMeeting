<?php

class HelpersController extends Controller {
	
	public static function isModOrAdmin (){
		$isMod = false;
		if(Yii::app()->user->isGuest){
			$isGuest = true;
		}else{
			$isUser = true;
			$rights = Rights::getAssignedRoles(Yii::app()->user->id);
			foreach($rights as $r){
				if($r->name =='Moderator'){
					$isMod = true;
				}
			
			}
		
			
					
		}
		$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
		return $isMod || $isAdmin;
	}
			
	
	
}
?>
