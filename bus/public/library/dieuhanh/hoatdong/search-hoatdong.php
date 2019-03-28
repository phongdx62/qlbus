<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-dieuhanh.php");
	$hd = new m_dieuhanh();
	$hd->m_search_hoatdong($key);
?>