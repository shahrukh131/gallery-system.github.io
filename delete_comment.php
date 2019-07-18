<?php include("includes/init.php"); ?>
<?php //if you logout
if(!$session->is_signed_in()){redirect("login.php");} ?>
<?php

if(empty($_GET['id'])){
	redirect("comments.php");	
}
$comment = Comment::find_by_id($_GET['id']);
if($comment){
	$comment->delete();
	redirect("delete_comment_photo.php?id={$comment->id}");		
}else{
	redirect("comments.php");	
}

?>
