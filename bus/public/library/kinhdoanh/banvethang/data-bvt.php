<?php
	include("../../../../models/m-kinhdoanh.php");
	$bvt = new m_kinhdoanh();
	if(ISSET($_POST['res']))
	{
		include("table-bvt.php");
		$bvt->m_list_bvt();
	}
?>