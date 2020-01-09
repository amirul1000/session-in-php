<?php
    session_start();
	include("connection.php");

	$_SESSION['vat_file_tmp_name'] = base64_decode($_SESSION['vat_file_tmp_name']);
	//$_SESSION['vat_file_name']     = $_FILES['vat_file']['name'];
	$_SESSION['noc_file_tmp_name'] = base64_decode($_SESSION['noc_file_tmp_name']);
   
	
	if(strlen($_SESSION['vat_file_name'])>0)
	{
		$file=strtolower(trim($_SESSION['vat_file_name']));
		$filePath="images/".$file;
		
		$fp=fopen($filePath,"w");
		
		fwrite($fp,$_SESSION['vat_file_tmp_name']);
		$vat_file ="images/".trim($file);
		
		unset($_SESSION['vat_file_tmp_name']);
		unset($_SESSION['vat_file_name']);
	}
	
	if(strlen($_SESSION['noc_file_name'])>0)
	{
		
		$file=strtolower(trim($_SESSION['noc_file_name']));
		
		$filePath="images/".$file;
		//move_uploaded_file($_SESSION['noc_file_tmp_name'],$filePath);
		$fp=fopen($filePath,"w");
		
		fwrite($fp,$_SESSION['noc_file_tmp_name']);
		
		$noc_file ="images/".trim($file);
		
		unset($_SESSION['noc_file_tmp_name']);
		unset($_SESSION['noc_file_name']);
	}
	
	
	$sql = "INSERT  INTO `files` (`vat_file`, `noc_file`, `name`) 
	        VALUES ('".$vat_file."', '".$noc_file."', '".$_REQUEST['name']."');";
	$result = $conn->query($sql);
	if($result)
	{
		$message = "Data has been saved";
	}
	else
	{
		$message = "Error Occured";
	}
				
	echo $message;
	
?>
