<?php
    include_once "user.php";
	class Login
	{
	   public function __construct()
	   {
		  session_start();
		  $_SESSION['logon'] = false;
		  $email=$_POST['email'];
		  $pass=$_POST['password'];
           
          $Object = new User();
          $Object -> verifyuser($email , $pass);
	   }
	}
	$LocalObject = new Login();
?>
