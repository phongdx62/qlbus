<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-nhansu.php");
	$px = new m_nhansu();
	$px->m_search_px($key);
?>