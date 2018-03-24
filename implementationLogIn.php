<?php 
include "classes/user.php";
?>
 

  
    <?php
 
				$login_error = '';
				$login_confirm = '';
				 
				if(isset($_POST['']) && !empty($_POST['username']) && !empty($_POST['password']))
				{
							$username = $_POST['username'];
							$password = $_POST['password'];
							//Send a query to database to check the username and password
										
							
							$result = USER::Login($username, $password);
							 if(!$result){
								
								$login_error = '<img src="images/No.png" width="25px" />';
								$login_error .= '<strong>   Error : Username and Password combination is incorrect !</strong><br/><br/><br/><br/>';
							}else{
								
								$login_confirm = "<strong>   Your Login is Successfull ! </strong><br/><br/><br/><br/>";
                                 
                                 switch($result){
                                     case "Student" :
                                         break;
                                     case "Teacher" :
                                         break;
                                     case "Manager":
                                         break;
                                 }
                                     
                                     
							}
						
					}
				?>