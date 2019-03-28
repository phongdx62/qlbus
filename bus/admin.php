<?php  
	session_start();
	include("controllers/c-admin.php");
	$ad = new c_admin();
	$ad->admin();
?>