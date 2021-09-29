<?php 
require './helpers/dbConnection.php';
require './helpers/checkLogin.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PRODUCTS</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
                <li class="active"><a href="index.php" >Store</a></li>
                <li><a href="profile.php" >profile</a></li>
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
			<br />
			<br />
			<br />
			<h1 align="center" style="color: red"><u><b>PRODUCTS</b></u></h1><br />
			<br /><br />
			<?php
				$query = "select products.*,catagories.title as catTitle from catagories join products on products.cat_id = catagories.id order by name desc";
				$result = mysqli_query($con, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($data = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-3">
				<form method="post" action="cart.php?action=add&id=<?php echo $data["id"]; ?>" target="_blank">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; margin-bottom:15px" align="center">
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
				}
			?>
		
	</div>
	<br />
	</body>
</html>

<?php
//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>