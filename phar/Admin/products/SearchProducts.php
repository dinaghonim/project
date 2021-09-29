

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	 <style>
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
		  body{
			 background-image: url("../images/hero_1.jpg");
			 background-repeat: no-repeat;
			 background-size: cover;
		 }
		 table
		 {
			 color: orangered;
			 font-weight: 900;
		 }
    </style>
	
</head>
<body>

<div class="container">
  <h2 style="color: blue;">Search Products</h2>
   
  <form method="post" action="<?php  echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  enctype ="multipart/form-data">
 <?php 
     
        if(isset($_SESSION['Message'])){
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
        }
     
     ?>

        <a href="../logout.php">LogOut</a>
  

  <div class="form-group">
    <label for="exampleInputEmail1" style="color: white;">Search Key</label>
    <input type="text" name="key"  class="form-control" id="exampleInputName" aria-describedby="" placeholder="Enter search Key">
  </div>

  
  <button type="submit" class="btn btn-primary">Search</button>
</form>
</div>
	<br>
    <div class="container">
 <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                  <th>#</th>
					<th>Id</th>
					<th>name</th>
					 <th>Image</th>
					 <th>price</th>
					<th>Category</th>
					<th>Action</th>
            </tr>

  <?php 
	
	require  '../helpers/dbConnection.php';
	 require '../helpers/helpers.php';
	 require '../helpers/checkLogin.php';
	 
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
             echo '<h3 style="color:white">'.'* '.$key.' : '.$value.'</h3>'.'<br>';
        }
    }else{
     
     # Search Logic ....
		
		
     $sql = "select products.*,catagories.title as catTitle from catagories join products on products.cat_id = catagories.id where name like '%$key%' ";
   
		
     $op = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) > 0 ){
		  $i = 0;
    
         while($data = mysqli_fetch_assoc($op)){
			 	 ?>

        <tr>
		<td><?php echo ++$i;?></td>
		<td><?php echo $data['id'];?></td>  
		<td><?php echo $data['name'];?></td>
		<td><img src="./uploads/<?php echo $data['image'];?>" width="100" height="100"</td>
		<td><?php echo $data['price'];?></td>
		<td><?php echo $data['catTitle'];?></td>
<td>
	   <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
	   <a href='edit.php?id=<?php echo $data['id'];?>' class='btn btn-primary m-r-1em'>Edit</a>
   </td>                                          
</tr>
	<?php
	
        }
     }else{

        echo '<h3 style="color:white;">No Result Found.</h3>';
     }

    }
}
?>

		</table>
	</div>


</body>
</html>

