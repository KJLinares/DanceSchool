<!DOCTYPE html>
<?php ob_start(); ?> 
<?php 
if(!class_exists('USER')){ include "classes/user.php"; }

if(!class_exists('STUDENT')){ include "classes/student.php"; }

if(!class_exists('EMPLOYEE')){ include "classes/employee.php"; }
?>
 

  
<html lang="en">
<head>
   <title>DanceStudio</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
   .Box {
    width: 500px;
    border: 10px solid #154360;
    padding: 25px;
    margin: 25px;
	margin-left:auto;
	margin-right:auto;
	}
	body {
    background-image: url("pic/bk2.jpg");
	}
	 <!-- Pic_resurse: https://www.google.ca/search?q=background+dance&tbm=isch&tbs=rimg:Cf8U45YgABJ7IjjjFZSbX5RrQXvM_1nVOo5UGxsfaCkqxOhuBw_1UG3BtxiGOng5KaqUkXxvbilh7KMT6eGUt3JSPYNyoSCeMVlJtflGtBER8HJa0Gdvp3KhIJe8z-dU6jlQYRj_1vr3ta7XzIqEgnGx9oKSrE6GxF5m29lxuIpzCoSCYHD9QbcG3GIEUGeLnj8n41fKhIJY6eDkpqpSRcRLp3XpX1hjD8qEgnG9uKWHsoxPhH_1HGj962uyvioSCZ4ZS3clI9g3EWKiMRyvKN-F&tbo=u&sa=X&ved=2ahUKEwiny-LX94LaAhXHJt8KHXHiCBcQ9C96BAgAEBs&biw=1280&bih=566&dpr=1.5#imgrc=5jmhbWArRINi_M:
	 -->
   

  </style>
  
  </head>
<body>

    <?php
 
				$login_error = '';
				$login_confirm = '';
                $user_id;
    
    

				if(! isset($_SESSION)){
					session_start();
				}
				 
				if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password']))
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
                                     case 'Student' :
                                         
                                         $login_confirm .= "Student";
                                        
                                         $user_id=  STUDENT::Get_StudentID($username) ; 
                                         $_SESSION['Role_ID'] = $user_id;
                                    
                                        header("Location: Student.php");
                                         
                                    break;
                                     case 'Teacher' :
                                         
                                         $login_confirm .= "Teacher";
                                                  
                                         $user_id=  EMPLOYEE::Get_TeacherID($username) ;
                                         $_SESSION['Role_ID'] = $user_id;
                                         
                                         header("Location: Teacher.php");
                                         
                                         break;
                                     case 'Manager':
                                         
                                         $login_confirm .= "Manager";
                                                                                                                 
                                         header("Location: Manager.php");
                                         
                                         break;
                                 }
                                     
                                   
							}
						
					}
				?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#154360">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color:white;">DanceStudio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php" style="background-color:#154360" style="color:white;">Home</a></li>
     
    </ul> 
	</div>
</nav>
    <br/><br/>
            <font color=#CC0000><?php echo $login_error; ?></font> 
            <font color=#006600><?php echo $login_confirm; ?></font> 
            <br/><br/>
</br>
</br>
<div class="Box" >
<form action="#" method="post">
  <div class="form-group">
    <label for="username" style="color:#154360">Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="password" style="color:#154360">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" style="color:#154360"> Remember me
    </label>
	</br>
  </div>
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="submit">Submit</button>
</form>
</div>
</body>
</html>