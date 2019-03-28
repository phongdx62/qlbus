<?php
    include("../../../../models/m-admin.php");

    if(isset($_POST["madv"]))
    {
        $madv = addslashes(stripslashes($_POST["madv"]));
        $dv = new m_admin();
        $dv->m_del_datve($madv);
    }

?>