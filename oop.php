<?php


?>













<!--  Inheritance -->
<?php
/*
class Cars{
	
	var $wheel_count=4;
	
	function Car_wheel(){
		echo "This Car Has ".$this->wheel_count." Wheels";
		
	}
	
}
$bmw=new Cars();


class Trucks extends Cars{
		var $wheel_count=10;
}
$tacoma = new Trucks();
echo $tacoma->wheel_count;
*/
?>

<!--  Access Control Modifiers (Public >> available any where in program
 							  , Private >> available in class
                              , Protected) >> available in class or subclasses -->
<?php
/*
	class cars{
	
	public $wheel_count=4;
	private $door_count=2;
	protected $seat_count=2;
	
		function details(){
			echo $this->wheel_count."<br>";
			echo $this->door_count."<br>";
			echo $this->seat_count."<br>";
		}	
	}
	$bmw =new cars();
	echo $bmw->wheel_count;
	$bmw->details();
	*/
?>

<!-- Static Modifier -->
<?php
/*
class car{
	static $wheel_count=4;	
	static $door_count=2;
	static function details(){
		echo car::$wheel_count;	
		echo car::$door_count;	
	}
}
$bmw=new car();

echo $bmw->wheel_count."<br>";
echo car::$door_count;
car::details();
*/
?>

<!-- Getter & Setter for Private property -->
<?php
/*
class car{
	
private $door_count=4;
//get original value
function get_values(){
echo $this->door_count."<br>";	
}
//change original value
function set_values(){
	$this->door_count=10;	
}
	
}
$bmw=new car();
$bmw->get_values();

$mercedes=new car();
$mercedes->set_values();
$mercedes->get_values();
*/
?>

<!-- Static (self,parent) keywords  -->
<?php
/*
class car{
	
	static $wheel_count=4;
	static $door_count=2;
	static function details(){
		return self::$wheel_count;
		return self::$door_count;	
	}
}

class truck extends car{
	static function display(){
		echo parent::details();	
		
	}	
}
$mercedes = new truck();
truck::display();

*/
?>

<!-- Constructor & destructor  -->
<?php

class car{
	public $wheel_count = 4;
	static $door = 4;
	function __construct(){
		echo $this->wheel_count;
		echo self::$door++."<br>";	
	}
	function details(){
		echo $this->wheel_count;
		echo self::$door++."<br>";	
	}	
}

$bmw = new car();
$mercedes = new car();
$mercedes2 = new car();

?>




















