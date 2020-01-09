<?php
       session_start();
	   require(dirname(__FILE__) . '/Simple-Ajax-Uploader-master/code/Uploader.php');
	   
	  
	   if(check_file_extension($_FILES)==false)
		{
		  exit(json_encode(array('success' => false, 'msg' =>'Error:  .'.$_SESSION['extension'].' is not a supported file'))); 
		}
		
		
		if(strlen($_FILES['vat_file']['name'])>0 && $_FILES['vat_file']['size']>0)
		{
			$_SESSION['vat_file_tmp_name'] = base64_encode(file_get_contents($_FILES['vat_file']['tmp_name']));
			$_SESSION['vat_file_name']     = $_FILES['vat_file']['name'];
			
		   echo json_encode(array('success' => true)); 	
		   exit;
		}
		if(strlen($_FILES['noc_file']['name'])>0 && $_FILES['noc_file']['size']>0)
		{
		   $_SESSION['noc_file_tmp_name'] = base64_encode(file_get_contents($_FILES['noc_file']['tmp_name']));	
		   $_SESSION['noc_file_name'] = $_FILES['noc_file']['name'];	
		   echo json_encode(array('success' => true)); 	
		   exit;	
		}
		
		////////////////////////////////////
		
		
		/*if (!$result) {
		  exit(json_encode(array('success' => false, 'msg' => $uploader->getErrorMsg())));  
		}*/
				
		echo json_encode(array('success' => true));
		
		function check_file_extension($_files)
		{
		  foreach($_files as $key=>$name)
		  {
			 if(strlen($_files[$key]['name'])>0 && $_files[$key]['size']>0)
			 {
					 unset($arr);			
					 $arr = explode(".",$_files[$key]['name']);			
					 $extension = strtolower($arr[count($arr)-1]);			
					 if(!( $extension == "pdf" || $extension == "png"  || $extension == "jpg" || $extension == "jpeg"))
					 {
						 $_SESSION['extension'] = $extension;
						// echo '<font color="red"><h3>Error:'.$extension .' is not supported file</h3></font>';
						 return false;
					 }
			 }
			// echo $arr[count($arr)-1];
		  } 
		  return true;
		}
?>