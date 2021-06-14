<?php
session_start();
if($_SESSION['uid']){
	
}
else{
	header('location:login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>welocome amod</h1>
</body>
</html>