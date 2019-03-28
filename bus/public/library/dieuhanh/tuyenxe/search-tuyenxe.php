<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-dieuhanh.php");
	$tx = new m_dieuhanh();
	$tx->m_search_tuyenxe($key);
?>