<?php 

require '../helpers/dbConnection.php';
require '../helpers/helpers.php';
require '../helpers/checkLogin.php';


# Fetch Roles ... 
$sql = "select * from contact";
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
                     printMessages('Display Messages');
                     ?>
                    </ol>
                      
   

                        <div class="card mb-4">
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>subject</th>
                                                <th>message</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                        	   <th>#</th>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>email</th>
                                                <th>subject</th>
                                                <th>message</th>
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
                                                <td><?php echo $data['email'];?></td>
                                                <td><?php echo $data['subject'];?></td>
                                                <td><?php echo $data['message'];?></td>
                                                <td>
                    <a href='delete.php?id=<?php echo $data['id'];?>' class='btn btn-danger m-r-1em'>Delete</a>
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