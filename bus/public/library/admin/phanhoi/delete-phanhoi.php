<?php
    include("../../../../models/m-admin.php");

    if(isset($_POST["maph"]))
    {
        $maph = addslashes(stripslashes($_POST["maph"]));
        $phanhoi = new m_admin();
        $phanhoi->m_del_phanhoi($maph);
    }

?>