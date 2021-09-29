<?php 
require  './helpers/dbConnection.php';
require './helpers/checkLogin.php';
require './helpers/helpers.php';




$id = sanitize($_GET['id'],1);    // $_REQUEST

$errors = [];

if(!validate($id,6)){
 $errors['id'] = "InValid Id";      
}



if(count($errors) == 1){
    // 
    $_SESSION['Message'] = $errors['id'];
    
    header("Location: profile.php");

}else{

   $sql = "select * from clients where id = $id";
   $op  = mysqli_query($con,$sql);
   $data = mysqli_fetch_assoc($op);

}





if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $name     = CleanInputs($_POST['name']);
    $email    = CleanInputs($_POST['email']);
    // $password = CleanInputs($_POST['password']);
   
    # Validate Inputs ... 
    $errors = [];

    if(!validate($name,1)){
     $errors['Name'] = "Field Required.";
    }elseif(!validate($name,2)){
        $errors['Name'] = "Invalid String.";  
    }

      if(!validate($email,1)){
        $errors['Email'] = "Field Required.";
       }elseif(!validate($email,3)){
           $errors['Email'] = "Invalid Email.";  
       }


    //    if(!validate($password,1)){
    //     $errors['password'] = "Field Required.";
    //    }elseif(!validate($password,5)){
    //        $errors['password'] = "Invalid Length.";  
    //    }




    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
    //  $password = md5($password);

     $sql = "update clients set name='$name' , email = '$email'  where id = $id ";

     $op = mysqli_query($con,$sql);

     if($op){
         $message =  'Update done';
     }else{
         $message =  'Error in Update';
       }
 
      $_SESSION['Message'] = $message; 

      header("Location: profile.php");
    }

    

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
<link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

	<style>
	body{	background-image: url("images/bg_1.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			}
	</style>
</head>
<body>

    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.php" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="logout.php">LogOut</a></li>
                <li><a href="index.php" target="_blank">Store</a></li>
                <li class="active"><a href="profile.php">profile</a></li>
         		 <li><a href="contact.php" target="_blank">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="Search.php"  target="_blank" class="icons-btn d-inline-block"><span class="icon-search"></span></a>
            <a href="cart.php"  target="_blank" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
<div class="container">
<br>
<br>
<br>

  <h1 style="color: red;"><b>Edit</b></h1>
  <form method="post" action="edit.php?id=<?php echo $data['id'];?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black;">Name</label>
    <input type="text" name="name" value="<?php echo $data['name'];?>"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" style="font-size:15px;">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1"  style="color:black;">Email address</label>
    <input type="email" name="email"  value="<?php echo $data['email'];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="font-size:15px;">
  </div>

  <!-- <div class="form-group">
    <label for="exampleInputPassword1">New  Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->
 
  
  <button type="submit" class="btn btn-primary" style="font-size:15px;">Update</button>
</form>
</div>



</body>
</html>

