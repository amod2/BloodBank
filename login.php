<?php
include('includes/header.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style type="text/css">
    	input {width: 80%;margin-left: 20px;margin-right: 15px;

    	}
    	.btn{
    		color: #fff;background-color: green;border-radius: 5px;
    	}
    </style>
</head>
<body style="background-image: url('images/blood.jpg');">
<div class="container">
	<form action="login.php" method="post">

		<div style="margin-left: 33%;background-color: pink;margin-right: 33%;margin-top: 100px;padding: 10px;background-image: url('images/blood.jpg');">
			<h3 style="margin-left: 120px;color: #fff;">Log In</h3>
		<p style="margin-left: 20px;color: #fff;">Username: </p><input type="text" name="uname"><br><br>
		<p style="margin-left: 20px;color: #fff;">Password: </p><input type="Password" name="pass"><br><br>
		<input type="submit" name="login" value="Login" class="btn">
		</div>
	</form>
</div>
</body>
</html>
<?php
$con =new mysqli('localhost','root','','bbdms');
if($con){
}else{
	echo "connecting error";
}

if(isset($_POST['login'])){
	$username=$_POST['uname'];
$password=$_POST['pass'];
$qry="select * from `tblblooddonars` where `EmailId`='$username' and `Password`='$password';";
$run=mysqli_query($con,$qry);
$row=mysqli_num_rows($run);
if($row<1){
	 ?>
	<script type="">
		alert("Incorrect username or password");
		window.open('login.php','_self');
	</script>
	<?php
}else{
$data=mysqli_fetch_assoc($run);
$id=$data['id'];
session_start();
$_SESSION['uid']=$id;
header('location:index.php');
}
}
?>