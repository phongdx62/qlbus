<?php
	include("../../../../models/m-nhansu.php");
	$dbvt = new m_nhansu();
	if(ISSET($_POST['res']))
	{
		include("table-dbvt.php");
		$dbvt->m_list_dbvt();
	}
?>