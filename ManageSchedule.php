
<?php 
include "classes/course.php";


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
	}
	body {
    background-image: url("pic/home_brr.jpg");
	}
	 <!-- Pic_resurse:  https://www.google.ca/search?q=background+brick&tbm=isch&tbs=rimg:CbmvoWM85VIOIjgq7iFqphxd2XDjqnIya8oumiXEqo4SoNZM-P4Lsbrc9e8fIipPr7jcro7cLzSYZBNbWrVNgrQskSoSCSruIWqmHF3ZEfIXtnEBCf_1_1KhIJcOOqcjJryi4Re7jvsvLdDGIqEgmaJcSqjhKg1hF_1n7B9G8Dj4SoSCUz4_1guxutz1EZIKQbc964RhKhIJ7x8iKk-vuNwRxxTOWLyshXYqEgmujtwvNJhkExG7SX4pq8sGWSoSCVtatU2CtCyREWFwsGI-8qul&tbo=u&sa=X&ved=2ahUKEwiT8In0jYbaAhUQVN8KHbkpAB0Q9C96BAgAEBs&biw=1280&bih=566&dpr=1.5#imgrc=gH-pBpsDKmGZGM:-->

   
  </style>
   
  </head>
<body>
  <?php
    
    
	$Course_ID = 0;
    $Teacher_ID = 0 ;
				$error_message = '';
				$confirm_message  = '';
                $list = '';
    
     
				 
    if (isset($_POST['Save'])){
        
        $name = $_POST['name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $schedule = $_POST['schedule'];
        $price= $_POST['price'];
        $Teacher_ID = $_POST['teacher_id'];
        
        if (!empty($name) &&!empty($start_date) &&!empty($end_date) &&!empty($schedule) &&!empty($price) &&!empty($Teacher_ID) ){
            
            $newCourse = new COURSE($name , $start_date, $end_date, $schedule, $price, $Teacher_ID);
			
			$newCourse_id = $newCourse->Create();
            $confirm_message .='<strong>   Course saved successfully with ID = '. $newCourse_id . '</strong><br/><br/><br/><br/>';
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill all the fields to save the course !</strong><br/><br/><br/><br/>';
        }
        
        
    }
					
    
    elseif (isset($_POST['Update'])){
         
    
        $Course_ID = $_POST['id'];
        $name = $_POST['name'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $schedule = $_POST['schedule'];
        $price= $_POST['price'];
        $Teacher_ID = $_POST['teacher_id'];
        
        if (!empty($Course_ID) &&!empty($name) &&!empty($start_date) &&!empty($end_date) &&!empty($schedule) &&!empty($price) &&!empty($Teacher_ID) ){
            
            $newCourse = new COURSE($name , $start_date, $end_date, $schedule, $price, $Teacher_ID);
			
			$newCourse->Update($Course_ID);
            $confirm_message .='<strong>   Course UPDATED successfully </strong><br/><br/><br/><br/>';
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill all the fields to update the course !</strong><br/><br/><br/><br/>';
        }
        
        
    }
     
        elseif (isset($_POST['Delete'])){
         
    
        $Course_ID = $_POST['id'];
            
        if (!empty($Course_ID) ){
            
            
            if (COURSE::Delete($Course_ID) ){
            $confirm_message .='<strong>   Course Deleted successfully </strong><br/><br/><br/><br/>';
            }
            else{
            
				$error_message .= '<strong>   Error : You need to fill the course id field to update the course !</strong><br/><br/><br/><br/>';
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
      <li class="active"><a href="Manager.php" style="background-color:#154360" style="color:white;">Management Page</a></li>
         </ul>
   <ul class="nav navbar-nav navbar-right">
      <li><a href="Logout.php"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
  </div>
</nav>
</br>
<div>
</br>
</br>
<div class="Box">
<form action="#" method="post">

<h3 style="color:#154360"><b>Dancing course<b></h3>

    <br/>
            <font color=#CC0000><?php echo $error_message ; ?></font> 
            <font color=#006600><?php echo $confirm_message; ?></font> 
            <br/>

 <div class="form-group">
    <label for="id" style="color:#154360"><h4>Course ID:<h4></label>
    <select name='id' >
				<option value = '0'>None </option>
				<?php 
				    for($i=1; $i<=15; $i++){
				       $course = COURSE::Get_Course_Name($i);
					   echo "<option value=\"$i\" ";
					
                        if($Course_ID == $i){echo "selected"; }
						      echo ">$course</option>";
					    }
				?>
				</select>
  </div>
	<div class="form-group">
    <label for="name" style="color:#154360">Course name:</label>
    <input type="text" class="form-control" name="name">
  </div>
  <div class="form-group">
     <label for="start_date" style="color:#154360" >Start Date:</label>
    <input type="datetime" class="form-control" name="start_date">
  </div>
  <div class="form-group">
     <label for="end_date" style="color:#154360">End Date:</label>
    <input type="datetime" class="form-control" name="end_date">
  </div>
  <div class="form-group">
    <label for="schedule" style="color:#154360">Schedule:</label>
    <input type="text" class="form-control" name="schedule">
  </div>
  <div class="form-group">
    <label for="price" style="color:#154360">Price:</label>
    <input type="number" class="form-control" name="price">
  </div>
  <div class="form-group">
    <label for="employee" style="color:#154360">Teacher:</label>
    <select name='teacher_id' >
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
    
  <div style="text-align:center">
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="Save">Save</button>
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="List">List</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360" name="Update">Update</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360" name="Delete">Delete</button>
<div>
</form>
</div>
</div>


<?php
   
   if (isset($_POST['List'])){
        
     COURSE::Display(COURSE::ListAll());
        
    }
   
?>

</body>
</html>