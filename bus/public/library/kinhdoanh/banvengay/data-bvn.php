<?php
	include("../../../../models/m-kinhdoanh.php");
	$bvn = new m_kinhdoanh();
	if(ISSET($_POST['res']))
	{
		include("table-bvn.php");
		$bvn->m_list_bvn();
	}
?>