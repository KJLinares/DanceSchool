
<?php 
include "database.php";


class USER{
	
	private $username;
    private $password;
    private $user_type;
    private $salt;
    
	private static $database;
	
	function __construct($username , $password, $user_type, &salt)
    {
        
        $this->username = $username;
        $this->password = $password;
        $this->user_type = $user_type;
        $this->salt = $salt;
	}
	public static function Init_Database(){
		if(! isset(self::$database)){
			self::$database = new Database();
		}
	}
	
	
	
	public function Create(){
		$query = "INSERT INTO user(username, password, user_type, salt) ";
		$query .= "VALUES(?,?,?,?)";
		self::Init_Database();
		
		try{
			$sql = self::$database->Connection->prepare($query);
            $sql->bindParam(1, $this->username);
            $sql->bindParam(2, $this->password);
            $sql->bindParam(3, $this->user_type); 
            $sql->bindParam(4, $this->salt); 
           
			
			$sql->execute();
            
            return true;
			
		}catch(PDOException $e){
			echo "Query INSERT Failed ".$e->getMessage();
		}
	}
	
	public static function Login($username, $password){
        $encrypted_password = self::Encrypt($password);
		$query  = "SELECT username FROM user ";
        $query .= "WHERE username = '$username' AND password = '$encrypted_password'";
		self::Init_Database();
		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->execute();
			$result = $sql->fetch(PDO::FETCH_OBJ);
			
			return !empty($result->$user_type);
			
		}catch(PDOException $e){
			echo "Query SELECT Failed ".$e->getMessage();
		}
	}

    public static function CreateSalt($password){
         
         $random = md5($password);
         $salt = substr($random, 0, 22); 
        
         return  $salt;
    }
    public static function Encrypt($password){
        //Using Crypt function with salt (High Security)
        //step1: Define a variable salt 
		//with some random text of length 22 characters 
        $salt =  self::CreateSalt($password);
	   
        //step2: Define a hash format (MD5, BLOWFISH, SHA256 , SHA512)
        $hashformat = "$2y$10$";//Generate hash code 10 times
        $hashformat_and_salt = $hashformat . $salt ;
        $encryptedPassword = crypt($password, $hashformat_and_salt);
        return $encryptedPassword;
    }
	public static function Delete($username){
		
		
        $query  = "DELETE FROM user  ";
		$query .= "WHERE username = '$username'";
		self::Init_Database();
		try{
			self::$database->Connection->exec($query);
			return true;
		}catch(PDOException $e){
			echo "Query UPDATE Failed ".$e->getMessage();
			return false;
		}
	}
    
    public static function Exists($username){
		$query = "SELECT username FROM user WHERE username = '$username' ";
		self::Init_Database();
		try{
			$sql = self::$database->Connection->prepare($query);
			$sql->execute();
			$result = $sql->fetch(PDO::FETCH_OBJ);
			
			return !empty($result->username);
		}catch(PDOException $e){
			echo "Query SELECT Failed ".$e->getMessage();
		}
	}
}
?>