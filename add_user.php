<?php include("includes/header.php"); ?>

<?php //if you logout
if(!$session->is_signed_in()){redirect("login.php");} ?>

<?php




$user = new User();
if(isset($_POST['create'])){
	if($user){
		 $user->username = $_POST['username'];
		 $user->password = $_POST['password'];
		 $user->first_name = $_POST['first_name'];
		 $user->last_name = $_POST['last_name'];
		 $user->set_file($_FILES['user_image']);
		 
		 $user->upload_photo();
		 $user->save();
		 redirect("users.php");
		 $session->message("The User has been Added");	
			
	}
}
//$user = User::find_by_id($_GET['id']);
//if(isset($_POST['create'])){
//if($user){
//	$user->title = $_POST['title'];
//	$user->caption = $_POST['caption'];
//	$user->alternate_text = $_POST['alternate_text'];
//	$user->description = $_POST['description'];
//	$user->save();	
//}
//}
?>
            <!-- Top Menu Items -->
            <?php include("includes/top_nav.php");?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php")?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Add users 
                            <small>Subheading</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                        	<div class="form-group">
                            	<input type="file" name="user_image">
                            </div>
                        	<div class="form-group">
                            	<label for="Username">Username</label>
                            	<input type="text" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                            	<label for="password">Password</label>
                            	<input type="text" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                            	<label for="firstname">First Name</label>
                            	<input type="text" class="form-control" name="first_name">
                            </div>
                            <div class="form-group">
                            	<label for="lastname">Last Name</label>
                            	<input type="text" class="form-control" name="last_name">
                            </div>
                            <div class="form-group">
                            	<input type="submit" class="btn btn-primary pull-right" name="create">
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