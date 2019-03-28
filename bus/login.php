<?php  
	session_start();
	include("controllers/c-login.php");
	$c_login = new C_dangnhap();
	$c_login->c_login();
?>