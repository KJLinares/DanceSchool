<?php

include "dbConfig.php";

class DatabasePDO{
	
	public $Connection;
	
	function __construct(){
		
		$this->OpenConnection();
	}
	function __destruct(){
		
		$this->CloseConnection();
	}
	function OpenConnection(){
		global $HOST , $USER , $PASSWORD , $DB_NAME;
		
		try{
			$this->Connection =  new PDO("mysql:host=$HOST;dbname=$DB_NAME" ,
			                             $USER , $PASSWORD);
			$this->Connection->setAttribute(PDO::ATTR_ERRMODE , 
			                                PDO::ERRMODE_EXCEPTION);
			
			if ($this->Connection)
                echo "You are connected ";
		}catch(PDOException $e){
			echo "Connection Failed ".$e->getMessage();
		}
		
	}
	function CloseConnection(){
		$this->Connection = null;
	}
}

?>