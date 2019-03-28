<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["matuyen"]))
    {
        $matuyen = addslashes(stripslashes($_POST["matuyen"]));
        $tx = new m_dieuhanh();
        $tx->m_del_tuyenxe($matuyen);
    }

?>