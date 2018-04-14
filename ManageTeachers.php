<?php 
include "classes/employee.php";
?>



<!DOCTYPE html>
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
    width: 600px;
    border: 10px solid #154360;
    padding: 25px;
    margin: 25px;
	margin-left:auto;
	margin-right:auto;
	color:#154360;
	font-family:verdana;
	}
	body {
    background-image: url("pic/home_brr.jpg");
	}
	 <!-- Pic_resurse:  https://www.google.ca/search?q=background+brick&tbm=isch&tbs=rimg:CbmvoWM85VIOIjgq7iFqphxd2XDjqnIya8oumiXEqo4SoNZM-P4Lsbrc9e8fIipPr7jcro7cLzSYZBNbWrVNgrQskSoSCSruIWqmHF3ZEfIXtnEBCf_1_1KhIJcOOqcjJryi4Re7jvsvLdDGIqEgmaJcSqjhKg1hF_1n7B9G8Dj4SoSCUz4_1guxutz1EZIKQbc964RhKhIJ7x8iKk-vuNwRxxTOWLyshXYqEgmujtwvNJhkExG7SX4pq8sGWSoSCVtatU2CtCyREWFwsGI-8qul&tbo=u&sa=X&ved=2ahUKEwiT8In0jYbaAhUQVN8KHbkpAB0Q9C96BAgAEBs&biw=1280&bih=566&dpr=1.5#imgrc=gH-pBpsDKmGZGM:-->

   
  </style>
   
  </head>
<body>

 <?php
    
    
	$Teacher_ID = 0;
				$error_message = '';
				$confirm_message  = '';
                $list = '';
    
     
				 
    if (isset($_POST['Save'])){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];    
        $preferred_schedule = $_POST['preferred_schedule'];
        $user_type = "Teacher";
        
        if (!empty($name) &&!empty($email) &&!empty($phone) &&!empty($preferred_schedule) &&!empty($username) &&!empty($password) ){
            
            
            $newTeacher = new EMPLOYEE($name , $email, $phone, $preferred_schedule, new USER($username, $password, $user_type));
			
			$newTeacher_id = $newTeacher->Create();
            
            $confirm_message .='<strong>   Teacher saved successfully with ID = '. $newTeacher_id . '</strong><br/><br/><br/><br/>';
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill all the fields to save the Teacher !</strong><br/><br/><br/><br/>';
        }
        
        
    }
					
    
    elseif (isset($_POST['Update'])){
         
       $Teacher_ID = $_POST['employee_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];    
        $preferred_schedule = $_POST['preferred_schedule'];
        $user_type = "Teacher";
        
        if (!empty($Teacher_ID)&& !empty($name) &&!empty($email) &&!empty($phone)&&!empty($preferred_schedule) &&!empty($username) &&!empty($password) ){
            
            $newTeacher = new EMPLOYEE($name , $email, $phone, $preferred_schedule, new USER($username, $password, $user_type));
            
			$newTeacher->Update($Teacher_ID);
            
            $confirm_message .='<strong>   Teacher UPDATED successfully </strong><br/><br/><br/><br/>';
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill all the fields to update the Teacher !</strong><br/><br/><br/><br/>';
        }
        
        
    }
     
    
    elseif (isset($_POST['Delete'])){
         
       $Teacher_ID = $_POST['employee_id'];
            
        if (!empty($Teacher_ID) ){
            
            
            if (EMPLOYEE::Delete($Teacher_ID) ){
            $confirm_message .='<strong>   Teacher Deleted successfully </strong><br/><br/><br/><br/>';
            }
            
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill the Student id field to update the Teacher !</strong><br/><br/><br/><br/>';
            }
			
        
    }
        
				?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#154360">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color:white;">DanceStudio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Manager.php" style="background-color:#154360" style="color:white;">Management Page</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
   
  </div>
</nav>
</br>
</br>
<div>
</br>
</br>
<div class="Box">
<form action="#" method="post">

<h3 style="color:#154360"><b>Teacher Info<b></h3>

<div>
       <br/>
        <font color=#CC0000><?php echo $error_message ; ?></font> 
        <font color=#006600><?php echo $confirm_message; ?></font> 
    <br/>
</div> 


 <div class="form-group">
    <label for="employee_id" style="color:#154360"><h4>Teacher ID:<h4></label>
    <select name='employee_id' >
				<option value = '0'>None </option>
				<?php 
				    for($i=1; $i<=15; $i++){
				       $teacher = EMPLOYEE::Get_Teacher_Name($i);
					   echo "<option value=\"$i\" ";
					
                        if($Teacher_ID == $i){echo "selected"; }
						      echo ">$teacher</option>";
					    }
				?>
            </select>
  </div>
 
	<div class="form-group">
    <label for="name" style="color:#154360">Teacher name:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
     <label for="start_date" style="color:#154360" >Email:</label>
    <input type="datetime" class="form-control" name="email">
  </div>
  <div class="form-group">
     <label for="end_date" style="color:#154360">Phone:</label>
    <input type="datetime" class="form-control" name="phone">
  </div>
  <div class="form-group">
    <label for="schedule" style="color:#154360">Preferred Schedule:</label>
    <input type="text" class="form-control" name="preferred_schedule">
  </div>
  <div class="form-group">
     <label for="username" style="color:#154360">Username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
     <label for="password" style="color:#154360">Password:</label>
    <input type="text" class="form-control" name="password">
  </div>
  
  <div style="text-align:center">
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="Save">Save</button>
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="List">List</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360" name="Update">Update</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360" name="Delete">Delete</button>
</div>

</form>
</div>
</div>


<?php
   
   if (isset($_POST['List'])){
        
     EMPLOYEE::Display(EMPLOYEE::ListAll());
        
    }
   
    
				?>

</body>
</html>