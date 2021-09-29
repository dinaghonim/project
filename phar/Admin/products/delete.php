<?php 
require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';



 $id = sanitize($_GET['id'],1);

 $error = [];

 if(!validate($id,6)){
     $error['id'] = "Invalid Integar";
 }


 if(count($error) > 0){
     $message  = $error;
 }else{

    # Image Name 
    $sql = "select image from products where id =".$id;
    $op  = mysqli_query($con,$sql);
    $data =mysqli_fetch_assoc($op);
    $image = $data['image'];


     $sql = "delete from products where id =".$id;

     $op  = mysqli_query($con,$sql);

     if($op){
        $path = './uploads/'.$image;
       
       if(file_exists($path)){
          unlink($path);
       } 
     

         $message = ["Record Deleted"];
     }else{
         $message = ["Error Try Again"];
     }

 }

 $_SESSION['Message'] = $message;
 
 header("Location: index.php");




?>