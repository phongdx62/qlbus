<?php  
  session_start();
  include("controllers/c-index.php");
  $index = new c_index();
  $index->show_index();
?>