<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["mapx"]))
    {
        $mapx = addslashes(stripslashes($_POST["mapx"]));
        $px = new m_nhansu();
        $px->m_del_px($mapx);
    }

?>