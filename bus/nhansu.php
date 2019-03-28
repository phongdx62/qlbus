<?php  
	session_start();
	include("controllers/c-nhansu.php");
	$ns = new c_nhansu();
	$ns->nhansu();
?>