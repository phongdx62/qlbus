<?php
	include("../../../../models/m-admin.php");
	$phanhoi = new m_admin();
	if(ISSET($_POST['res']))
	{
		include("table-phanhoi.php");
		$phanhoi->m_list_phanhoi();
	}
?>