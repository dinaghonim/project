<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Roles ... 
$sql = "select products.*,catagories.title as catTitle from catagories join products on products.cat_id = catagories.id";
$op  = mysqli_query($con,$sql);



 require './Layouts/header.php';
 require './Layouts/topNav.php';
?>
    
    <div id="layoutSidenav">
           
 <?php 
    require './Layouts/sidNav.php';
 ?>
          
          
          
          
          
          
          
            <div id="layoutSidenav_content">
              
            
            
                  <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                                                     
                     <?php 
                            printMessages('Display Products');
                     ?>
                    </ol>
                      
   

                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                <th>name</th>
												 <th>Image</th>
												 <th>price</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Id</th>
                                                <th>name</th>
                                                <th>Image</th>
                                                <th>price</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                     
                                 <?php 
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
                                <?php } ?>        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                



<?php 
  
  require './Layouts/footer.php';

?>