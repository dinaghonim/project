
<?php 
require './helpers/dbConnection.php';
require './helpers/checkLogin.php';
 require './helpers/helpers.php';


if($_SERVER['REQUEST_METHOD'] == "GET"){
 // code ... 


 $id = sanitize($_GET['id'],1);    // $_REQUEST

 $errors = [];

if(!validate($id,6)){
  $errors['id'] = "InValid Id";
       
 }


 if(count($errors) > 0){
     // 
     $_SESSION['Message'] = $errors['id'];
 }else{

    // insert op ;
    $sql = "insert into orders (name,image,price) select name,image,price from products where id=".$id;

    $op  = mysqli_query($con,$sql);

     if($op){
         $message = "product ordered.";
     }else{
         $message = "Error Try Again.";
     }

     $_SESSION['Message'] = $message;
 }

 header("Location: cart.php");

}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "order")
	{
		foreach($_SESSION["shopping_cart"] as $data => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$data]);
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
?>




