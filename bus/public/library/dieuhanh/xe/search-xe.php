<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-dieuhanh.php");
	$xe = new m_dieuhanh();
	$xe->m_search_xe($key);
?>