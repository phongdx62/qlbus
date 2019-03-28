<?php
	include("../../../../models/m-nhansu.php");
	$nvbvt = new m_nhansu();
	if(ISSET($_POST['res']))
	{
		include("table-nvbvt.php");
		$nvbvt->m_list_nvbvt();
	}
?>