<?php
/** 
 * @author: WAW (wawancell@gmail.com)
 * @version: 1.0
 * Copyright (C) 2012 by WAW.
 * 
 * @description: Widget for showing flash message with auto hide using JQuery effect.
 * @setup: - copy this widget under protected/component.
 * 		   - call this widget in layout/main.php to display the message for all view.
 *         - example usage in controller: Yii::app()->user->setFlash(<type>,<message>);
 *		   - <type> : success, error, notice
 *		   - <message> : output text to displayed.
 *
 * 	This program is distributed in the hope that it will be useful,
 * 	but WITHOUT ANY WARRANTY; without even the implied warranty of
 * 	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * 	GNU Lesser General Public License for more details.
 */
 
class Flashes extends CWidget {
 
    public function run() {


		$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
					
		Yii::app()->clientScript->registerScript(
		   'myHideEffect',
		   '$(".flashes").animate({opacity: 0.9}, 4500).fadeOut("slow");',
		   CClientScript::POS_READY
		);
			echo '<div class="flashes inner">
					<div class="section">
						<ul class="system_messages">
			';
			foreach($flashMessages as $key => $message) {
				//echo '<div class="flash-' . $key . ' shadow">' . $message . "</div>\n";
				echo '<li class="flash-' . $key . '"><span class="ico"></span><strong class="system_title">' . $message . '</strong><a href="#" class="close">CLOSE</a></li>\n';
			}
			echo '</ul></div></div>';
		}	
    }
}
?>
