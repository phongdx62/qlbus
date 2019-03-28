<?php 
    include("../../../../models/m-admin.php");

    if(isset($_POST["id"]))
    {
        $id = addslashes(stripslashes($_POST["id"]));
        $user = new m_admin();
        $user->m_del_user($id);
    }
        
?>