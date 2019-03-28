<?php
    include("../../../../models/m-nhansu.php");

    if(isset($_POST["madbvt"]))
    {
        $madbvt = addslashes(stripslashes($_POST["madbvt"]));
        $dbvt = new m_nhansu();
        $dbvt->m_del_dbvt($madbvt);
    }

?>