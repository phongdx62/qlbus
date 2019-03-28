<?php
	$key = addslashes(stripslashes($_POST["key"]));
	include("../../../../models/m-admin.php");
	$user = new m_admin();		
	$user->m_search_user($key);
?>