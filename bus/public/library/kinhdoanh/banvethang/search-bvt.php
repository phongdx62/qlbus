<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-kinhdoanh.php");
	$bvt = new m_kinhdoanh();
	$bvt->m_search_bvt($key);
?>