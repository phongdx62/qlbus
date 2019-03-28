<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["mahd"]))
    {
        $mahd = addslashes(stripslashes($_POST["mahd"]));
        $hd = new m_dieuhanh();
        $hd->m_del_hoatdong($mahd);
    }

?>