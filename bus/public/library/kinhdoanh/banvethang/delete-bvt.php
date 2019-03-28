<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["magdvt"]))
    {
        $magdvt = addslashes(stripslashes($_POST["magdvt"]));
        $bvt = new m_kinhdoanh();
        $bvt->m_del_bvt($magdvt);
    }

?>