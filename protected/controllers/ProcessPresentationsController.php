<?php
class ProcessPresentationsController extends Controller {
	public function filters()
    {
        return array( 'accessControl' ); // perform access control for CRUD operations
    }
 
    public function accessRules()
    {
        return array(
        	
            array('allow', // allow all users from localhost to access all actions
                'users'=>array('*'),
                'ips' => array('127.0.0.1', '112.213.84.59','202.87.212.4'),
                  'message'=>'Access Denied.',
            ),
            array('allow', 'users'=> array("admin", "nxtnhan")),
            array('deny'),
        );
    }
				
	public static function rrmdir($dir) {
		//echo " <br>rrmdir start!";
		   
	    if (is_dir($dir)) {
	    	//echo " <br>is dir";
		     $objects = scandir($dir);
		     foreach ($objects as $object) {
		       if ($object != "." && $object != "..") {
		         if (filetype($dir."/".$object) == "dir") ProcessPresentationsController::rrmdir($dir."/".$object); else unlink($dir."/".$object);
		       }
		     }
		     reset($objects);
		     rmdir($dir);
	    }
	}
	public static function rcopy($src, $dst) {
	  if (file_exists($dst)) rrmdir($dst);
	  if (is_dir($src)) {
	    mkdir($dst);
	    $files = scandir($src);
	    foreach ($files as $file)
	    if ($file != "." && $file != "..") ProcessPresentationsController::rcopy("$src/$file", "$dst/$file"); 
	  }
	  else if (file_exists($src)) copy($src, $dst);
	}
	public function actionIndex(){
		
		
		$seconds_old = 86400; //1 day old
		$pathPresentation = '/var/bigbluebutton';
		//$comDir= "54ceb91256e8190e474aa752a6e0650a2df5ba37"; // will get from database
		//$arrayComDir = RoomDirectory::model()->findAllAttributes('id, directory' );
		
/*
		$len = strlen($comDir);
		if(!is_dir($pathPresentation.DIRECTORY_SEPARATOR.$comDir)){
			mkdir($pathPresentation.DIRECTORY_SEPARATOR.$comDir, 0777);
		}*/
		$count =1;
		if ($handle = opendir($pathPresentation)) {
	        $meeting_time = null;
			$roomHash = null;
		    /* loop over the directory. */
		    while (false !== ($entry = readdir($handle))) {
	            	
	            if (in_array($entry, array(".",".."))) continue;	
		        // check if entry in array
		        //if (in_array($entry, $arrayComDir)) continue;
				//echo filectime($pathPresentation.DIRECTORY_SEPARATOR.$entry);
				if(stripos($entry, '-') == false){
					//print $entry ."<br/>";
					continue;
				}
				//continue;
				//print stripos($entry, '-')."<br/>";
				
				
				list($roomHash, $meeting_time) = explode("-", $entry);
		        if(!is_dir($pathPresentation.DIRECTORY_SEPARATOR.$roomHash)){
					mkdir($pathPresentation.DIRECTORY_SEPARATOR.$roomHash, 0777);
				}
		        
					 
		     //   continue;
				
				$source = $pathPresentation.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR;
				$destination = $pathPresentation.DIRECTORY_SEPARATOR.$roomHash.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR;
				
				$files = scandir($source);
				foreach ($files as $file) {
				
				      if (in_array($file, array(".",".."))) continue;
					  //If file is "logo" -> remove it!    
				      if($file == "logo" && is_dir($source.$file)){
			     		//  $this->rrmdir($source."logo");
			     		//echo "<br>$source";
						  continue;
				      }
				     if(!is_dir($destination)){
							mkdir($destination, 0777);
					    }
			      	/*
					  if( @filectime($destination.$file) == @filectime($source.$file)){
						$this->rrmdir($pathPresentation.DIRECTORY_SEPARATOR.$entry);
						}
					 */
					  //If destination directory not empty: duplicated with new file, override it!
				      if(!is_dir($destination.$file)){
				      	 		
				      	 	//echo "<br>remove dir";
				      	   	
				      	   //$this->rrmdir($destination.$file);
				      	   //Copy to new folder
				       	//  print '<br> copy to ' .$destination.$file;
				       	  ProcessPresentationsController::rcopy($source.$file, $destination.$file);
				      	   /* Begin update database */
						  $info  = array(
								'room_sha1' => $roomHash,
								'path' => $entry,
								'name' => $file,
								'filename' => $file,
								'meeting_time' => intval(substr($meeting_time, 0, 10)) ,
								
							);
							$presentation_model = new Presentations();
							$presentation_model->attributes = $info;
							$presentation_model->save();
							
							/* End update database */
					}
						  
					      
					 }
					//remove dir
					//	echo "<br>remove: " . $pathPresentation.DIRECTORY_SEPARATOR.$entry;
					//remove old folder
					/*	if( @filectime($pathPresentation.DIRECTORY_SEPARATOR.$entry) < (time()-$seconds_old) ){
							$this->rrmdir($pathPresentation.DIRECTORY_SEPARATOR.$entry);
						}
						
					 * 
					 */
					
				}
					
			    
			
			    closedir($handle);
			}
				
			
		}
		public function actionIndex2(){
		$seconds_old = 86400; //1 day old
		$pathPresentation = '/var/bigbluebutton';
		$comDir= "54ceb91256e8190e474aa752a6e0650a2df5ba37"; // will get from database
		$arrayComDir = RoomDirectory::model()->findAllAttributes('id, directory' );
		
		foreach ($arrayComDir as  $t) {
			$comDir = $t->directory;	
			$id = $t->id;	
				
			
			//echo "<br>$t->id ".$comDir;
			//exit();
			$len = strlen($comDir);
			if(!is_dir($pathPresentation.DIRECTORY_SEPARATOR.$comDir)){
				mkdir($pathPresentation.DIRECTORY_SEPARATOR.$comDir, 0777);
			}
			$count =1;
			if ($handle = opendir($pathPresentation)) {
		       
			    /* loop over the directory. */
			    while (false !== ($entry = readdir($handle))) {
		            	
		            if (in_array($entry, array(".",".."))) continue;	
			        // check if entry in array
			        if (in_array($entry, $arrayComDir)) continue;
					//echo filectime($pathPresentation.DIRECTORY_SEPARATOR.$entry);
			        if( $entry !== $comDir){
			        //	echo $entry;	
						if(strncmp($entry,$comDir, $len) == 0)
		        		{
		        			
		        			//echo " <br>$entry";
							
							$source = $pathPresentation.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR;
							$destination = $pathPresentation.DIRECTORY_SEPARATOR.$comDir.DIRECTORY_SEPARATOR.$entry.DIRECTORY_SEPARATOR;
							
							$files = scandir($source);
							foreach ($files as $file) {
							
							      if (in_array($file, array(".",".."))) continue;
								  //If file is "logo" -> remove it!    
							      if($file == "logo" && is_dir($source.$file)){
						     		//  $this->rrmdir($source."logo");
						     		//echo "<br>$source";
									  continue;
							      }
							     if(!is_dir($destination)){
										mkdir($destination, 0777);
								    }
						      	/*
								  if( @filectime($destination.$file) == @filectime($source.$file)){
									$this->rrmdir($pathPresentation.DIRECTORY_SEPARATOR.$entry);
									}
								 */
								  //If destination directory not empty: duplicated with new file, override it!
							      if(!is_dir($destination.$file)){
							      	 		
							      	 	//echo "<br>remove dir";
							      	   	
							      	   //$this->rrmdir($destination.$file);
							      	   //Copy to new folder
							       		ProcessPresentationsController::rcopy($source.$file, $destination.$file);
							      	   $meeting_time = time();
									  
								      list($companyDir, $meeting_time) = explode("-", $entry);
									   
								     
									  $info  = array(
											'room_dir_id' => $id,
											'path' => $entry,
											'name' => $file,
											'filename' => $file,
											'meeting_time' => intval(substr($meeting_time, 0, 10)) ,
											
										);
										$presentation_model = new Presentations();
										$presentation_model->attributes = $info;
										$presentation_model->save();
										
							      }
								  
							      
							 }
							//remove dir
							//	echo "<br>remove: " . $pathPresentation.DIRECTORY_SEPARATOR.$entry;
							//remove old folder
							/*	if( @filectime($pathPresentation.DIRECTORY_SEPARATOR.$entry) < (time()-$seconds_old) ){
									$this->rrmdir($pathPresentation.DIRECTORY_SEPARATOR.$entry);
								}
								
							 * 
							 */
							}
						}
						
				    }
				
				    closedir($handle);
				}
				
			}
		}
		
	}
	
		
		
	
