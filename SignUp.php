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
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#154360">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html" style="color:white;">DanceStudio</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.html" style="background-color:#154360" style="color:white;">Home</a></li>
     
    </ul>
   
  </div>
</nav>
<div>
</br>
</br>

<div class="Box">
<form action="/action_page.php">
 <div class="form-group">
    <label for="name" style="color:#154360">Name:</label>
    <input type="name" class="form-control" id="name">
  </div>
  <div class="form-group">
     <label for="phone" style="color:#154360" >Phone:</label>
    <input type="text" class="form-control" id="phone">
  </div>
  <div class="form-group">
     <label for="email" style="color:#154360">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="username" style="color:#154360">Username:</label>
    <input type="text" class="form-control" id="username">
  </div>
  <div class="form-group">
    <label for="pwd" style="color:#154360">Password:</label>
    <input type="password" class="form-control" id="password">
  </div>
  <div class="form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" style="color:#154360"> Remember me
    </label>
	</br>
  </div>
  <button type="submit" class="btn btn-primary" style="background-color:#154360">Submit</button>
</form>
</div>
</div>
</body>
</html>