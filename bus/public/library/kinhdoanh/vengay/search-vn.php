<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-kinhdoanh.php");
	$vn = new m_kinhdoanh();
	$vn->m_search_vn($key);
?>