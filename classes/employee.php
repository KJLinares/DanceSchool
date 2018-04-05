
<?php 

include "person.php";


class EMPLOYEE extends PERSON{
	
    private $preferred_shedule;
    
    public function GetID(){
        return $this->person_id;
    }
    
    function __construct( $name , $email, $phone, USER $user, $preferred_shedule){
        
	   parent::__construct( $name , $email, $phone, $user);
        
        $this->preferred_shedule = $preferred_shedule;
           
    }
    
	
	public function Create(){
        
        //Create user account first 
        $this->user->Create(); 
        
        
        //creating entry on student table 
		$query = "INSERT INTO employee ( name, email, phone,  username, preferred_shedule) ";
		$query .= "VALUES(?,?,?,?,?)";
		PERSON::Init_Database();
		
		try{
			$sql = PERSON::$database->Connection->prepare($query);
            $sql->bindParam(1, $this->name);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->phone); 
            $sql->bindParam(4, $this->user->GetUsername()); 
            $sql->bindParam(5, $this->preferred_shedule);
			
			$sql->execute();
            
            $last_id = self::$database->Connection->LastInsertId();
			
			return $last_id;
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	
	public function Delete($employee_id){
		
        $query  = "DELETE FROM employee  ";
		$query .= "WHERE employee_id = $employee_id";
		PERSON::Init_Database();
		try{
			PERSON::$database->Connection->exec($query);
            USER::Delete($this->Get_Username($employee_id));
			return true;
		}catch(PDOException $e){
			echo "Query UPDATE Failed ".$e->getMessage();
			return false;
		}
	}
    
     public static function Get_Username($employee_id){
		self::init_database();
		$connection = self::$database->Connection;
		try{
			$query = "SELECT username FROM employee WHERE employee_id = $employee_id ";
			$stmt = $connection->prepare($query);
			$stmt->execute();
			$userObj = $stmt->fetch(PDO::FETCH_OBJ);
			
			return $userObj->salt;
			
		}catch(PDOException $e){
			echo "Query Failed ".$e->getMessage();
		}
	}
  
    public function Update(){
        
        $employee_id = $this->person_id;
        
        
        //Create user account first 
        USER::Update_Password($this->user->GetUsername(), $this->user->GetPassword()); 
        
        
        //creating entry on student table 
		$query = "UPDATE employee ";
		$query .= "SET name = ? , email = ? , phone = ?, preferred_shedule = ? ";
		$query .= "WHERE employee_id = $employee_id ";
        
                
		PERSON::Init_Database();
		
		try{
			$sql = PERSON::$database->Connection->prepare($query);
            $sql->bindParam(1, $this->name);
            $sql->bindParam(2, $this->email);
            $sql->bindParam(3, $this->phone); 
            $sql->bindParam(4, $this->preferred_shedule); 
			
			$sql->execute();
            
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
        
    }
    
    public static function ListAll(){
        
		PERSON::Init_Database();
        
		$connection = self::$database->Connection;
		$query  = "SELECT * FROM employee ";
		
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
        
        echo "<th>Employee ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Phone</th>";
        echo "<th>Preferred Schedule</th>";
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
			echo $Element['preferred_shedule'];
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