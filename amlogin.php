<!DOCTYPE html>
<html>
<head>
	<title>Mero Sathi Foundation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <style type="text/css">
    body{background-color: white;}
    #submit{padding: 10px;width: 100%;}
    form{padding: 10px;background-color: rgb(0,0,0);color: red;}
#fm{margin-top: 50px;}
.col{ padding: 10px; }
    .list-group-item{color: white;background-color: rgb(0,0,0);
    
    
  </style>
</head>
<body>
  <div class="container">
  <h2 style="color:#fff; ">Mero Sathi Foundation</h2>

  <button type="button" class="btn btn-primary">Home</button>
  <button type="button" class="btn btn-primary">Services</button>
  <button type="button" class="btn btn-primary">About us</button>
  <button type="button" class="btn btn-primary">Contact us</button>
</div>
<div class="sign" style="margin-left:85%;margin-top: -3%;">
     
      <a href="signup.html"> <button type="button" class="btn btn-success">Sign In</button></a>
  </div>
<div class="container-flud "  id="fm"  >
  <div class="row" style="background-color: #000;">
    <div class="col-4 " >

</div>
    <div class="col-4" >
  
 <div class="bg-success"><form action="amlogin.php " class="was-validated" method="post"  >
  <div class="form-group">
    <div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
      <img src="avtar.svg " style="width: 50px;height: 50px;background-color: white;margin-left: 20px;">
      <h2>Login</h2>
    </div>
    <div class="col-4">
    </div>
    </div>
    <label for="fname">User Name:</label>
    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="username" required>

  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    
  </div>
  <button type="submit" class="btn btn-primary" id="submit" name="login">Login</button>
</form>
</div>
</div>
<div class="col-4">
</div>
</div>

<div class="container-flud " style="margin-top: 200px;">

  <h2 style="margin-left: 300px;color: white;">Top Goverment Universities Of India </h2>
  <div class="row m-5">
    <div class="col-4">
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Indian Institute of Science, Bangalore</a>
  <a href="#" class="list-group-item list-group-item-action ">Indian Institute of Technology Bombay</a>
  <a href="#" class="list-group-item list-group-item-action ">Indian Institute of Technology Delhi</a>
  <a href="#" class="list-group-item list-group-item-action ">Indian Institute of Technology Kharagpur</a>
  <a href="#" class="list-group-item list-group-item-action ">Indian Institute of Technology Kanpur</a>
  
</div>
    </div>
    <div class="col-4">
      <div class="list-group">

  <a href="#" class="list-group-item list-group-item-action list-group-item-info">All India Institute of Medical Sciences New Delhi</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Jadavpur University, Kolkata</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Indian Institute of Technology Roorkee</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Tata Institute of Fundamental Research, Mumbai</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-info">Postgraduate Institute of Medical Education and Research Chandigarh</a>
</div>
    </div>
    <div class="col-4">
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action-success">University of Delhi, Delhi</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success"> Banaras Hindu University, Varanasi</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Anna University, Chennai</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">University of Hyderabad, Hyderabad</a>
  <a href="#" class="list-group-item list-group-item-action list-group-item-success">Institute of Chemical Technology, Mumbai</a>
  
</div>
    </div>









  </div>
 

   
</div>
</body>
</html>



<?php

$con =new mysqli('localhost','root','','test');
if($con){

}else{
	echo "connecting error";
}
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
$qry="select * from `login` where `username`='$username' and `password`='$password';";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
if($row<1)
{   ?>
	<script type="">
		alert("Incorrect username or password");
		window.open('amlogin.php','_self');
	</script>
	<?php
}else{

	$data=mysqli_fetch_assoc($run);
	$id=$data['id'];
	session_start();
  $_SESSION['uid']=$id;
  header("location:test/main.php");


}


}




?>