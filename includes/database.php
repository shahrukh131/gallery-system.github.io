<?php require_once("init.php"); ?>
<?php

class Database{
	
	public $connection ;
	
	function __construct(){
		$this->open_db_conncetion();	
	}
	//Open DB Connection
	public function open_db_conncetion(){
		
		$this->connection =new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		if($this->connection->connect_errno){
			die("Database Connection Failed".$this->connection->error);	
		}
	}
	//Execute Query 
	public function query($sql){
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
		return $result;
	}
	//Confirm Query
	public function confirm_query($result){
		if(!$result){
			die("Query Failed".$this->connection->error);	
		}
	}
	public function escape_string($string){
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;	
	}
	public function the_insert_id(){
		return $this->connection->insert_id;	
	}
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
$database = new Database();








?>