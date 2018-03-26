<?php 
include "classes/user.php";
include "classes/student.php";
?>
 
<?php
		$password_conf_error = "";
		$email_error ="";
		$register_confirm="";
		
	if(isset($_POST['Register']) && !empty($_POST['Username'])&& !empty($_POST['Password']))
    {
        
        $username = $_POST['Username'];
		
        
        //Send a query to database to check if the user already exists 
		if(USER::Exists($username)){
			
            $email_error .= '  Error : Username already exist !<br/><br/>';
        }
		
		//Send a query to database to create new user
		if(! USER::Exists($username) ){
		

            $name = $_POST['Name'];
            $email = $_POST['Email'];
            $phone = $_POST['Phone'];
            $password = USER::Encrypt( $_POST['Password'] );
			$salt = USER::CreateSalt($password);
            
            //Send a query to database to insert the data of the new user 
			
			
            $newStudent = new STUDENT($name , $email, $phone, new USER($username, $password, "Student" ,
                         $salt));
			
			$newStudent_id = $newStudent->Create();
			
			$register_confirm  = '   <img src="images/Yes.png" width="25px" />';
            $register_confirm .= "   Your account is successfully created ! <br>";
			$register_confirm .= "   Please, login on Sign-In page.<br>";
			$register_confirm .= "   Your Student ID is $newStudent_id <br><br><br><br>";
			
        }
		
    }	
			
			?>