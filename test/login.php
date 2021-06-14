<?php
$con =new mysqli('localhost','root','','test');
if($con){
}else{
	echo "connecting error";
}

if(isset($_POST['login'])){
	$username=$_POST['uname'];
$password=$_POST['pass'];
echo "username=".$username;
$qry="select * from `login` where `username`='$username' and `password`='$password';";
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
header('location:../index.php');
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div>
	<form method="post" action="login.php">
		Username:<input type="text" name="uname"><br><br>
		Password:<input type="Password" name="pass"><br><br>
		<input type="submit" name="login" value="Login">

	</form>
</div>
</body>
</html>