<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-kinhdoanh.php");
	$bvn = new m_kinhdoanh();
	$bvn->m_search_bvn($key);
?>