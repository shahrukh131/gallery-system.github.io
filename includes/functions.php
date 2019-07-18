<?php

function classautoload($class){
	$class=strtolower($class);
	$the_path = "includes/{$class}.php";
	if(file_exists($the_path)){
		require_once($the_path);	
	}else{
		die("The File Name {$class}.php Not Found ");	
	}
		
}
spl_autoload_register('classautoload');


function redirect($location){
	header("Location: {$location}");	
}
?>