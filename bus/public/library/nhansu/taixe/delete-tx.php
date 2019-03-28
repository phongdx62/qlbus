<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["matx"]))
    {
        $matx = addslashes(stripslashes($_POST["matx"]));
        $tx = new m_nhansu();
        $tx->m_del_tx($matx);
    }
?>