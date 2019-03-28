<?php
	include("../../../../models/m-kinhdoanh.php");
	$vt = new m_kinhdoanh();
	if(ISSET($_POST['res']))
	{
		include("table-vt.php");
		$vt->m_list_vt();
	}
?>