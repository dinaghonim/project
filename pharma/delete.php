<?php 
require './helpers/dbConnection.php';
require './helpers/checkLogin.php';

if($_SERVER['REQUEST_METHOD'] == "GET"){
 // code ... 
 require './helpers/helpers.php';

 $id = sanitize($_GET['id'],1);    // $_REQUEST

 $errors = [];

if(!validate($id,6)){
  $errors['id'] = "InValid Id";
       
 }


 if(count($errors) == 1){
     // 
     $_SESSION['Message'] = $errors['id'];
 }else{

    // delete op ;
    $sql = "delete from clients where id= $id";

    $op  = mysqli_query($con,$sql);

     if($op){
         $message = "Account Deleted.";
     }else{
         $message = "Error Try Again.";
     }

     $_SESSION['Message'] = $message;
 }
  
 header("Location: profile.php");

}

?>