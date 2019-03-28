<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-dieuhanh.php");
	$lt = new m_dieuhanh();
	$lt->m_search_luuthong($key);
?>