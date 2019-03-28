<?php
	include("../../../../models/m-dieuhanh.php");
	$xe = new m_dieuhanh();
	if(ISSET($_POST['res']))
	{
		include("table-xe.php");
		$xe->m_list_xe();
	}
?>