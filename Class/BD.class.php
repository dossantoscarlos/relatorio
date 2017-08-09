<?php
class BD {
	
	private $conn;
	
	public function __construct(){}
		
	public static function getConn(){
		if (is_null($conn)){
			$conn = new PDO(DSN, USERNAME,PASSWORD);        
		}
		return $conn;
	}
}
?>