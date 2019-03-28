<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-nhansu.php");
	$dbvt = new m_nhansu();
	$dbvt->m_search_dbvt($key);
?>