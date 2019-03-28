<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["mavn"]))
    {
        $mavn = addslashes(stripslashes($_POST["mavn"]));
        $vn = new m_kinhdoanh();
        $vn->m_del_vn($mavn);
    }

?>