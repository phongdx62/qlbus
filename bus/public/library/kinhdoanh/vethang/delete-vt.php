<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["mavt"]))
    {
        $mavt = addslashes(stripslashes($_POST["mavt"]));
        $vt = new m_kinhdoanh();
        $vt->m_del_vt($mavt);
    }

?>