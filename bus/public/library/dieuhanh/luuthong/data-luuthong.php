<?php
	include("../../../../models/m-dieuhanh.php");
	$lt = new m_dieuhanh();
	if(ISSET($_POST['res']))
	{
		include("table-luuthong.php");
		$lt->m_list_luuthong();
	}
?>