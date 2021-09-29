

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
		 	body
			{
				background-image: url("images/bg_1.jpg");
				background-repeat: no-repeat;
				background-size: cover;
			}
			
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
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
              <a href="index.html" class="js-logo-clone">Pharma</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="logout.php">LogOut</a></li>
                <li><a href="index.php" target="_blank">Store</a></li>
         		 <li><a target="_blank" href="contact.php">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="Search.php" class="icons-btn d-inline-block"><span class="icon-search"></span></a>
            <a href="cart.php"  target="_blank" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
	<br>
<br>
<br>

<div class="container">
	<h1 style="color: red;"><b>Search Products</b></h1>
   
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">
 <?php 
     
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
     
     ?>  

  <div class="form-group">
    <label for="exampleInputEmail1" style="color:black; font-size: 20px;">Search Key</label>
    <input type="text" name="key"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter search Key" style="font-size:15px;">
  </div>

  
  <button type="submit" class="btn btn-primary" style="font-size:15px;">Search</button>
</form>
</div>
	<br>
    <div class="container">
	<!-- creating our table heading -->

  <?php 
	
	require  './helpers/dbConnection.php';
	 require './helpers/helpers.php';
	 require './helpers/checkLogin.php';
	 
if($_SERVER['REQUEST_METHOD'] == "POST"){

    # Logic ... 
    $key      = CleanInputs($_POST['key']);



    # Validate Inputs ... 
    $errors = [];

    if(!validate($key,1)){
     $errors['key'] = "Field Required.";
    }elseif(!validate($key,2)){
        $errors['key'] = "Invalid String.";  
    }

	if(count($errors) > 0){ 

        foreach($errors as $key => $value)
        {
             echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
     
     # Search Logic ....
		
		
     $sql = "select products.*,catagories.title as catTitle from catagories join products on products.cat_id = catagories.id where name like '%$key%' ";
   
		
     $op = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) > 0 ){
		  $i = 0;
    
         while($data = mysqli_fetch_assoc($op)){
			 	 ?>

       <div class="col-md-3">
				<form method="post" action="cart.php?action=add&id=<?php echo $data["id"]; ?>" target="_blank">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; margin-bottom:25px;" align="center">
						<img src="../phar/Admin/products/uploads/<?php echo $data["image"]; ?>" class="img-responsive"/><br />

						<h4 class="text-info" style="font-size:18px;"><b><?php echo $data["name"]; ?></b></h4>

						<h4 class="text-danger" style="font-size:18px;"><b>$ <?php echo $data["price"]; ?></b></h4>
						
						<h4 class="text-danger" style="font-size:18px;"><b><?php echo $data['catTitle'];?></b></h4>

						<input type="text" name="quantity" value="1" class="form-control" style="font-size:18px;" />

						<input type="hidden" name="hidden_name" value="<?php echo $data["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $data["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:10px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
	<?php
	
        }
     }else{

        echo 'No Result Founded.';
     }

    }
}
?>

		</table>
	</div>


</body>
</html>

