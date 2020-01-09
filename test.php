<?php
   session_start();
   
   
   $_SESSION['first_name'] = "Jon";
   
   $_SESSION['last_name'] = "Smith";
   
   //session_unset($_SESSION['first_name']);
   
   session_destroy();


  // echo $_SESSION['first_name'].' '.$_SESSION['last_name'];
?>