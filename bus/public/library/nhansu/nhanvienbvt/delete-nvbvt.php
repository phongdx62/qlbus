<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["manvbvt"]))
    {
        $manvbvt = addslashes(stripslashes($_POST["manvbvt"]));
        $nvbvt = new m_nhansu();
        $nvbvt->m_del_nvbvt($manvbvt);
    }

?>