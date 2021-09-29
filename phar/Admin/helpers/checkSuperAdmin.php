<?php 

   if($_SESSION['user']['role_id'] != 8){
       header("Location: ".url(''));
   }

?>