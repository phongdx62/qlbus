<?php
	include("../../../../models/m-admin.php");
	$datve = new m_admin();
	if(ISSET($_POST['res']))
	{
		include("table-datve.php");
		$datve->m_list_datve();
	}
?>