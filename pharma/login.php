<?php 
require  './helpers/dbConnection.php';
require  './helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $email    = CleanInputs($_POST['email']);
    $password = CleanInputs($_POST['password']);
   
    # Validate Inputs ... 
    $errors = [];


      if(!validate($email,1)){
        $errors['Email'] = "Field Required.";
       }elseif(!validate($email,3)){
           $errors['Email'] = "Invalid Email.";  
       }


       if(!validate($password,1)){
        $errors['password'] = "Field Required.";
       }elseif(!validate($password,5)){
           $errors['password'] = "Invalid Length.";  
       }


    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
      $password = md5($password);

     $sql = "select * from clients where email = '$email' and password = '$password'";

     $op = mysqli_query($con,$sql);

     if( mysqli_num_rows($op) == 1){
           # logic .... 
        $data = mysqli_fetch_assoc($op);
        $_SESSION['User'] = $data;
        
        header("Location: index.php");

     }else{
         echo 'Error in Login Try Again';
       }






    }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	 <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style>
			body
			{
				background-image: url("images/bg_1.jpg");
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
			 <li><a href="create.php" target="_blank">register</a></li>
                <li><a href="index.php" target="_blank">Store</a></li>
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
<br>


	<h1 style="color: red"><b>Login</b></h1>
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">


  <div class="form-group">
    <label for="exampleInputEmail1" style="color: black">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="font-size:15px;">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" style="color: black">  Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password" style="font-size:15px;">
  </div>
 
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>



</body>
</html>

