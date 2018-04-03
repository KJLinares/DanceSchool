
<?php 
include "database.php";
include "user.php";
include "person.php";


class STUDENT extends PERSON{
	
	
	
	public function Create(){
        
        //Create user account first 
        $this->user->Create(); 
        
        
        //creating entry on student table 
		$query = "INSERT INTO student ( name, email, phone,  username) ";
		$query .= "VALUES(?,?,?,?)";
		PERSON::Init_Database();
		
		try{
			$sql = PERSON::$database->Connection->prepare($query);
            $sql->bindParam(1, $this->name);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->phone); 
            $sql->bindParam(4, $this->user->username); 
           
			
			$sql->execute();
            
            $last_id = self::$database->Connection->LastInsertId();
			
			return $last_id;
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	
	public static function Delete($student_id){
		
        $query  = "DELETE FROM student  ";
		$query .= "WHERE student_id = $student_id";
		PERSON::Init_Database();
		try{
			PERSON::$database->Connection->exec($query);
            USER::Delete($this->user->username);
			return true;
		}catch(PDOException $e){
			echo "Query UPDATE Failed ".$e->getMessage();
			return false;
		}
	}
    
    
	public function Update($student_id){
        
        
    }
}
?>