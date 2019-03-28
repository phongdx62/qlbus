<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-admin.php");
	$phanhoi = new m_admin();
	$phanhoi->m_search_phanhoi($key);
?>