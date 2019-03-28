<?php  
	session_start();
	include("controllers/c-kinhdoanh.php");
	$kd = new c_kinhdoanh();
	$kd->kinhdoanh();
?>