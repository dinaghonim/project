<?php
  
  require './helpers/dbConnection.php';
  require './helpers/checkLogin.php';


    $sql = "select * from clients where id=".$_SESSION['User']['id'];
    
  $op  =  mysqli_query($con,$sql);


?>


<!DOCTYPE html>
<html>

<head>
    <title>profile</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
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


    <!-- custom css -->
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
		table{
			color: black;
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
				  <li class="active"><a href="profile.php">profile</a></li>
         		 <li><a href="contact.php" target="_blank">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="Search.php"  target="_blank" class="icons-btn d-inline-block"><span class="icon-search"></span></a>
            <a href="cart.php" class="icons-btn d-inline-block bag" target="_blank" >
              <span class="icon-shopping-bag"></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1 style="color: red;"><b>User</b></h1>
			<h3 style="color: black;"><b> Welcome , <?php echo $_SESSION['User']['name'];?></b></h3>
            <br>

     <?php 
     
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
     
     ?>
        </div>

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-bordered table-dark'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>action</th>

            </tr>

<?php 
      $i = 0;
      while ($data = mysqli_fetch_assoc($op)) {
?>
            <tr>
               <td><?php echo ++$i;?></td>
               <td><?php echo $data['id'];?></td>
               <td><?php echo $data['name'];?></td>
               <td><?php echo $data['email'];?></td>

                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
                    <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>

<?php } ?>

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>