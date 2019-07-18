<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

<?php //if you logout
if(!$session->is_signed_in()){redirect("login.php");} ?>

<?php



if(empty($_GET['id'])){
	redirect("users.php");	
}
$user = User::find_by_id($_GET['id']);
if(isset($_POST['update'])){
	if($user){
		 $user->username = $_POST['username'];
		 $user->password = $_POST['password'];
		 $user->first_name = $_POST['first_name'];
		 $user->last_name = $_POST['last_name'];
		 
		 if(empty($_FILES['user_image'])){
			 $user->save();
			 redirect("users.php");
			 $session->message("The User Has Been Updated");
		 }else{
		 $user->set_file($_FILES['user_image']);
		 $user->upload_photo();
		 $user->save();
		 redirect("users.php");
		 $session->message("The User Has Been Updated");
		}	
	}
}
?>
            <!-- Top Menu Items -->
            <?php include("includes/top_nav.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php")?>
            <!-- /.navbar-collapse -->
        </nav>
        
        <!-- Photo Modal -->
        
            

        
        <!-- End Photo Modal -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Edit users 
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-6 user_image_box">
                        	<a href="#" data-toggle="modal" data-target="#photo-library">
                            <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>">
                            </a>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                        	<div class="form-group">
                            	<input type="file" name="user_image">
                            </div>
                        	<div class="form-group">
                            	<label for="Username">Username</label>
                            	<input type="text" class="form-control" name="username"
                                value="<?php echo  $user->username; ?>">
                            </div>
                            
                            <div class="form-group">
                            	<label for="firstname">First Name</label>
                            	<input type="text" class="form-control" name="first_name"
                                value="<?php echo  $user->first_name; ?>">
                            </div>
                            <div class="form-group">
                            	<label for="lastname">Last Name</label>
                            	<input type="text" class="form-control" name="last_name"
                                value="<?php echo  $user->last_name; ?>">
                            </div>
                            <div class="form-group">
                            	<label for="password">Password</label>
                            	<input type="password" class="form-control" name="password"
                                value="<?php echo  $user->password; ?>">
                            </div>
                            <div class="form-group">
                            	<a id="user_id" class="btn btn-danger pull-left" 
                                href="delete_user.php?id=<?php echo $user->id?>">Delete</a>
                            </div>
                            <div class="form-group">
                            	<input type="submit" value="Update" class="btn btn-primary pull-right" name="update">
                            </div>
                            
                        </div>
 
					</form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

  <?php include("includes/footer.php"); ?>