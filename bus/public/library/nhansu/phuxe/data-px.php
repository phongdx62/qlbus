<?php
	include("../../../../models/m-nhansu.php");
	$px = new m_nhansu();
	if(ISSET($_POST['res']))
	{
		include("table-px.php");
		$px->m_list_px();
	}
?>