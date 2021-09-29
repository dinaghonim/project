<?php 
require  './helpers/dbConnection.php';
require './helpers/helpers.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $name     = CleanInputs($_POST['name']);
    $email    = CleanInputs($_POST['email']);
    $phone    = CleanInputs($_POST['phone']);
    $password = CleanInputs($_POST['password']);
    $gov_id   = CleanInputs($_POST['gov_id']);
    $city_id  = CleanInputs($_POST['city_id']);
    $ex_data  = CleanInputs($_POST['ex_data']);
   
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


       if(!validate($password,1)){
        $errors['password'] = "Field Required.";
       }elseif(!validate($password,5)){
           $errors['password'] = "Invalid Length.";  
       }


 if(!validate($gov_id,1)){
        $errors['Gov'] = "Field Required.";
       }elseif(!validate($gov_id,2)){
           $errors['Gov'] = "Invalid String.";  
       }


       if(!validate($city_id,1)){
        $errors['City'] = "Field Required.";
       }elseif(!validate($name,2)){
           $errors['City'] = "Invalid String.";  
       }



       if(!validate($ex_data,1)){
        $errors['ex_data'] = "Field Required.";
       }elseif(!validate($ex_data,2)){
           $errors['ex_data'] = "Invalid String.";  
       }

	
	 if(!validate($phone,1)){
            $errors['phone'] = "Phone : Requierd Field";
           } elseif(!validate($phone,7)){
             $errors['Phone'] = "Invalid Phone Number";
          }   
       
		
	

    if(count($errors) > 0){

        foreach($errors as $key => $value)
        {
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
     $password = md5($password);

     $sql = "insert into clients (name,email,phone,password) values ('$name','$email','$phone','$password')";

     $op = mysqli_query($con,$sql);

     if($op){
      $client_id =  mysqli_insert_id($con);

      $sql = "insert into clientsaddress (gov,city,extraData,client_id) values ('$gov_id','$city_id','$ex_data','$client_id')";
      $op = mysqli_query($con,$sql);

      if($op){
         echo 'Registration done';
      }else{
        echo 'error in adding address data';
      }
     }else{
         echo 'Error in Register';
       }
    }

}



?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
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
		body{
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
                <li><a href="login.php" target="_blank">LogIn</a></li>
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
	<h1 style="color:red"><b>Register</b></h1>
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">

  

  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black;">Name</label>
    <input type="text" name="name"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Name" style="font-size:15px;">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black;">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="font-size:15px;">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1" style="font-size:15px;" style="color:black;">Password</label>
    <input type="password" name="password"   class="form-control" id="exampleInputPassword1" placeholder="Password" style="font-size:15px;">
  </div>





<?php 
$gov  = ['Cairo','Alex','Giza'];
$city = ['Helwan','SidiGaber','6 Oct'];
?>
<div class="form-group">
    <label for="exampleInputPassword1" style="color:black;">Governorate</label>
 <select name="gov_id"   class="form-control"  style="font-size:15px;">
   
  <?php foreach($gov as $gov_data){?>
			<option  value="<?php echo $gov_data;?>" ><?php echo $gov_data;?></option>
		  <?php }?>
		</select>
		  </div>



		  <div class="form-group">
			<label for="exampleInputPassword1" style="color:black;">City</label>
		 <select name="city_id"   class="form-control" style="font-size:15px;">

		 <?php foreach($city as $city_data){?>
			<option  value="<?php echo $city_data;?>" ><?php echo $city_data;?></option>
		  <?php }?>
		</select>
		  </div>

  
  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black;">Extra Address Data</label>
    <input type="text" name="ex_data"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Detailed Address" style="font-size:15px;">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black;">phone</label>
    <input type="text" name="phone"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter Detailed Address" style="font-size:15px;">
  </div>





 
  
  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



</body>
</html>

