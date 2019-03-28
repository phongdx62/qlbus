<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-nhansu.php");
	$nvbvt = new m_nhansu();
	$nvbvt->m_search_nvbvt($key);
?>