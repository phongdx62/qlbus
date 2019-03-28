<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-nhansu.php");
	$tx = new m_nhansu();
	$tx->m_search_tx($key);
?>