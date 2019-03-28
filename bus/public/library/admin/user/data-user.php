<?php
	include("../../../../models/m-admin.php");
	$user = new m_admin();
	if(ISSET($_POST['res']))
	{
		include("table-user.php");
		$user->m_list_user();
	}
?>