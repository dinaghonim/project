<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../Admins/dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                          



                             <?php 


                             
                                $Supermodules = ['AdminRoles','Admins','Category','Products'];

                                $roleModules  = ['Admins','Category','Products'];



                                if($_SESSION['user']['role_id'] == 8){
                                    $modules = $Supermodules;
                                }else{
                                    $modules = $roleModules;
                                }



                                foreach ($modules as $key => $value) {
 

                             ?>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo $key;?>" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                <?php echo $value;?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts<?php echo $key;?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo url($value.'/create.php');?>">+ Add</a>
                                    <a class="nav-link" href="<?php echo url($value.'/');?>">Display</a>
                                </nav>
                            </div>

                      <?php }?>
						
 							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo "search";?>" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Search
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts<?php echo "search";?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../Admins/SearchAdmins.php" target="_blank">Search Admins</a>
                                    <a class="nav-link" href="../products/SearchProducts.php" target="_blank">Search Products</a>
                                </nav>
                            </div>
                       
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts<?php echo "messages";?>" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Messages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts<?php echo "messages";?>" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../contact/index.php" target="_blank">Display</a>
                                </nav>
                            </div>
                  
							
							<a class="nav-link collapsed" href="../products/orders.php"  data-target="#collapseLayouts<?php echo "orders";?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                orders
                            </a>
							
							
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>