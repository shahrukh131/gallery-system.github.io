
<?php

class Session{
	
	private $signed_in = false;
	public $user_id;
	public $count;
	public $the_message;
	
	function __construct(){
		session_start();
		$this->view_count();
		$this->check_the_login();
		$this->check_message();	
	}
	
	
	//Count Views
	public function view_count(){
		if(isset($_SESSION['count'])){
			return $this->count = $_SESSION['count']++;
		}else{
			return $_SESSION['count']=1;
		}	
	}
	
	// a Method you use to send message to user when crate , update , delete .... 
	public $message;
	public function message($msg=""){
		if(!empty($msg)){
			$_SESSION['message'] = $msg;	
		}else{
			return $this->message;	
		}	
	}
	// check if the message sent
	private function check_message(){
		if(isset($_SESSION['message'])){
			$this->message = $_SESSION['message'];
			unset($_SESSION['message'])	;
		}else{
			$this->message="";	
		}
	}
	

	//Check The value of signed_in
	public function is_signed_in(){
		return $this->signed_in;	
	}
	//To Login
	public function login($user){
		if($user){
			$this->user_id = $_SESSION['user_id'] = $user->id;	
			$this->signed_in = true;
		}	
	}
	//To Logout
	public function logout(){
		unset($_SESSION['user_id']);
		unset($this->user_id);
		$this->signed_in = false;	
	}
	//
	// To Check The login
	private function check_the_login(){
		if(isset($_SESSION['user_id'])){
			$this->user_id = $_SESSION['user_id'];
			$this->signed_in = true;
		}else{
			unset($this->user_id);
			$this->signed_in = false;	
		}	
	}

}
$session = new Session();
$message = $session->message();

?>