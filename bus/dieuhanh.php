<?php  
	session_start();
	include("controllers/c-dieuhanh.php");
	$dh = new c_dieuhanh();
	$dh->dieuhanh();
?>