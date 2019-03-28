<?php
	include("../../../../models/m-kinhdoanh.php");
	$vn = new m_kinhdoanh();
	if(ISSET($_POST['res']))
	{
		include("table-vn.php");
		$vn->m_list_vn();
	}
?>