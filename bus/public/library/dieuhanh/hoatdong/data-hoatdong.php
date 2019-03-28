<?php
	include("../../../../models/m-dieuhanh.php");
	$hd = new m_dieuhanh();
	if(ISSET($_POST['res']))
	{
		include("table-hoatdong.php");
		$hd->m_list_hoatdong();
	}
?>