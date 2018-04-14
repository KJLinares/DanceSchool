
<?php 
include "classes/course.php";
include "classes/student.php";


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
	text-align:center;
	color:#154360;
	font-family:verdana;
	}
	body {
    background-image: url("pic/bk2.jpg");
	}
	 <!-- Pic_resurse:  https://www.google.ca/search?q=background+brick&tbm=isch&tbs=rimg:CbmvoWM85VIOIjgq7iFqphxd2XDjqnIya8oumiXEqo4SoNZM-P4Lsbrc9e8fIipPr7jcro7cLzSYZBNbWrVNgrQskSoSCSruIWqmHF3ZEfIXtnEBCf_1_1KhIJcOOqcjJryi4Re7jvsvLdDGIqEgmaJcSqjhKg1hF_1n7B9G8Dj4SoSCUz4_1guxutz1EZIKQbc964RhKhIJ7x8iKk-vuNwRxxTOWLyshXYqEgmujtwvNJhkExG7SX4pq8sGWSoSCVtatU2CtCyREWFwsGI-8qul&tbo=u&sa=X&ved=2ahUKEwiT8In0jYbaAhUQVN8KHbkpAB0Q9C96BAgAEBs&biw=1280&bih=566&dpr=1.5#imgrc=gH-pBpsDKmGZGM:-->

   
  </style>
   
  </head>
<body>

<?php
    $Course_ID = 0;
    $Student_ID = 0 ;
				$error_message = '';
				$confirm_message  = '';
                $list = '';
    
     
				 
    if (isset($_POST['new_course'])){
        
        $status = $_POST['status'];
        $Course_ID = $_POST['course_id'];
        
        
        if (!empty($status) &&!empty($Course_ID) ){
            
            COURSE::AddCourse($Student_ID, $Course_ID, $status);
            $confirm_message .='<strong>   Course saved successfully </strong><br/><br/><br/><br/>';
        }
        else{
            
				$error_message .= '<strong>   Error : You need to fill all the fields to save the course !</strong><br/><br/><br/><br/>';
        }
        
        
    }
        
				?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#154360">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html" style="color:white;">DanceStudio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html" style="background-color:#154360" style="color:white;">Home</a></li>
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="test.html"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
   
  </div>
</nav>
<div>
</br>
</br>
<div class="Box">
<form action="#" method="post">

<h3 style="color:#154360"><b>Dancing courses<b></h3>
<br/>
            <font color=#CC0000><?php echo $error_message ; ?></font> 
            <font color=#006600><?php echo $confirm_message; ?></font> 
            <br/>
<img src="pic/students.jpg" alt="students" height="200px" title="Manage Students">
</br>
</br>
  <div style="text-align:center">
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="my_courses">My Courses</button>
  <button type="submit" class="btn btn-primary" style="background-color:#154360" name="new_course">New Course</button>
<div class="form-group">
    <label for="status" style="color:#154360"><h4><b>Status:</b></h4></label>
    <input type="text" class="form-control" name="status">
  </div>
  <div class="form-group">
    <label for="course_id" style="color:#154360"><h4><b>Course ID:</b></h4></label>
     <select name='course_id' >
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
<div>
</form>
</div>
</div>
    </body>
    
    
<?php
   
   if (isset($_POST['my_courses'])){
        
     STUDENT::DisplayStudentCourses(STUDENT::ListStudentCourses($Student_ID));
        
    }
   
?>
</html>
