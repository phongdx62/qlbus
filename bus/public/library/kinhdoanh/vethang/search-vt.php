<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-kinhdoanh.php");
	$vt = new m_kinhdoanh();
	$vt->m_search_vt($key);
?>