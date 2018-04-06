
<?php 

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
            $sql->bindParam(4, $this->user->GetUsername()); 
           
			
			$sql->execute();
            
            $last_id = self::$database->Connection->LastInsertId();
			
			return $last_id;
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	
	public function Delete($student_id){
		
        $query  = "DELETE FROM student  ";
		$query .= "WHERE student_id = $student_id";
		PERSON::Init_Database();
		try{
			PERSON::$database->Connection->exec($query);
            USER::Delete($this->Get_Username($student_id));
			return true;
		}catch(PDOException $e){
			echo "Query UPDATE Failed ".$e->getMessage();
			return false;
		}
	}
    
    public static function Get_Username($student_id){
		self::init_database();
		$connection = self::$database->Connection;
		try{
			$query = "SELECT username FROM student WHERE student_id = $student_id ";
			$stmt = $connection->prepare($query);
			$stmt->execute();
			$userObj = $stmt->fetch(PDO::FETCH_OBJ);
			
			return $userObj->salt;
			
		}catch(PDOException $e){
			echo "Query Failed ".$e->getMessage();
		}
	}
    
	public function Update(){
        
        $student_id = $this->person_id;
        
        
        //Create user account first 
        USER::Update_Password($this->user->GetUsername(), $this->user->GetPassword()); 
        
        
        //creating entry on student table 
		$query = "UPDATE student ";
		$query .= "SET name = ? , email = ? , phone = ? ";
		$query .= "WHERE student_id = $student_id ";
        
                
		PERSON::Init_Database();
		
		try{
			$sql = PERSON::$database->Connection->prepare($query);
            $sql->bindParam(1, $this->name);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->phone); 
			
			$sql->execute();
            
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
        
    }
    
    public static function ListAll(){
        
		PERSON::Init_Database();
        
		$connection = self::$database->Connection;
		$query  = "SELECT * FROM student ";
		
		try{
			$stmt = $connection->prepare($query);
			$stmt->execute();
			
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
			
		}catch(PDOException $e)
		{
			echo "Query Read students Failed: ".$e->getMessage();
		}
    }
    
    
    function Display($array){
       
      
        echo "<table>";
        
        echo "<th>Student ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Phone</th>";
        echo "<th>UserName</th>";
        
	foreach($array as $Index => $Element){
		echo "<tr>";
			echo "<td>";
			echo $Element['student_id'];
			echo "</td>";
							
			echo "<td>";
			echo "<h2 style=\"color:#CC0000;\">";
			echo $Element['name'];
			echo "</h2>";
            echo "</td>"
                
			echo "<td>";
			echo "<h2 style=\"color:#121111;\">";
			echo $Element['email'];
			echo "</h2>";
            echo "</td>"
                
                
			echo "<td>";
			echo "<h2 style=\"color:#121111;\">";
			echo $Element['phone'];
			echo "</h2>";
            echo "</td>"
                    
			echo "<td>";
			echo "<h2 style=\"color:#121111;\">";
			echo $Element['username'];
			echo "</h2>";
            echo "</td>"
			echo "</tr>";
	}
        
        echo "</table>";
}
}
?>