<?php
	include("../../../../models/m-nhansu.php");
	$tx = new m_nhansu();
	if(ISSET($_POST['res']))
	{
		include("table-tx.php");
		$tx->m_list_tx();
	}
?>