<?php
    include("../../../../models/m-kinhdoanh.php");

    if(isset($_POST["magdvn"]))
    {
        $magdvn = addslashes(stripslashes($_POST["magdvn"]));
        $bvn = new m_kinhdoanh();
        $bvn->m_del_bvn($magdvn);
    }

?>