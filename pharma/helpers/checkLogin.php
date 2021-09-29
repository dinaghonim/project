<?php 

  if(!isset($_SESSION['User'])){
      header("Location: Login.php");
  }

?>