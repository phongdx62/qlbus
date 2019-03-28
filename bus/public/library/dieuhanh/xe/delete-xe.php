<?php
    include("../../../../models/m-dieuhanh.php");

    if(isset($_POST["bienso"]))
    {
        $bienso = addslashes(stripslashes($_POST["bienso"]));
        $xe = new m_dieuhanh();
        $xe->m_del_xe($bienso);
    }

?>