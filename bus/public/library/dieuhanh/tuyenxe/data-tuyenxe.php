<?php
	include("../../../../models/m-dieuhanh.php");
	$tx = new m_dieuhanh();
	if(ISSET($_POST['res']))
	{
		include("table-tuyenxe.php");
		$tx->m_list_tuyenxe();
	}
?>