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
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#154360">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html" style="color:white;">DanceStudio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Manager.html" style="background-color:#154360" style="color:white;">Managment Page</a></li>
         </ul>
   <ul class="nav navbar-nav navbar-right">
      <li><a href="test.html"><span class="glyphicon glyphicon-user"></span> Sign Out</a></li>
    </ul>
  </div>
</nav>
</br>
</br>
<div>
</br>
</br>
<div class="Box">
<form action="/action_page.php">

<h3 style="color:#154360"><b>Dancing course<b></h3>
 <div class="form-group">
    <label for="id" style="color:#154360"><h4>Course ID:<h4></label>
    <input type="name" class="form-control" id="id">
  </div>
 
	<div class="form-group">
    <label for="name" style="color:#154360">Course name:</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="form-group">
     <label for="start_date" style="color:#154360" >Start Date:</label>
    <input type="datetime" class="form-control" id="start_date">
  </div>
  <div class="form-group">
     <label for="end_date" style="color:#154360">End Date:</label>
    <input type="datetime" class="form-control" id="end_date">
  </div>
  <div class="form-group">
    <label for="schedule" style="color:#154360">Schedule:</label>
    <input type="text" class="form-control" id="schedule">
  </div>
  <div class="form-group">
    <label for="employee" style="color:#154360">Teacher:</label>
    <input type="text" class="form-control" id="employee">
  </div>
  <div style="text-align:center">
  <button type="submit" class="btn btn-primary" style="background-color:#154360">Save</button>
  <button type="submit" class="btn btn-primary" style="background-color:#154360">List</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360">Update</button>
<button type="submit" class="btn btn-primary" style="background-color:#154360">Delete</button>
<div>
</form>
</div>
</div>


</body>
</html>