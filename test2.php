<?php
   session_start();
   
   echo $_SESSION['first_name'].' '.$_SESSION['last_name'].'<br>';
   
   if(isset($_SESSION['first_name']))
   {
    echo $_SESSION['first_name'].' Get Access';	   
   }
   else
   {
	    echo $_SESSION['first_name'].' is out of  Access';	 
   }
?>