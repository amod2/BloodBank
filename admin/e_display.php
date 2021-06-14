<?php
include 'conn.php';
session_start();


if(!$_SESSION['alogin'])
{
header("location:index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js" integrity="sha384-u/bQvRA/1bobcXlcEYpsEdFVK/vJs3+T+nXLsBYJthmdBuavHvAW6UsmqO2Gd/F9" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<style>
body{
	background-image:linear-gradient(rgba(71,71,71,0.7),rgba(71,71,71,0.7)),url("img/a3.jpg");

  	
	background-size: cover;
  	background-position: center;
  	
	height: 100vh;
}
th{color: green;}


</style>



</head>
<body>
	<?php  include('includes/header.php'); ?>
	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container">
				
			</div>
		</div>


<br>


<div>
<h2 class="text-white"><center><font size="10">Manage Eemployee</font></center></h2>

</div><br>

<div class="container" style="margin-right: 0%;">
	<div class="col-lg-12"><br>
		<div class="row">
		<h3 class="text-white">Displaying Records</h3>
        <a href="e_insert.php" class="col-lg-3"><button class="btn btn-success col-lg-3">Add</button></a> <a href="e_logout.php" class="col-lg-3"><button class="btn btn-success col-lg-3" name="logout">logout</button></a>
    </div><br>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-white">
				<th><h5>ID</h5></th>
				<th><h5>Name</h5></th>
				<th><h5>Age</h5></th>
				<th><h5>Salary</h5></th>
				<th><h5>Qualification</h5></th>
				<th><h5>Date of Birth</h5></th>
				<th><h5>Date of Join</h5></th>
			</tr>


			<?php
include 'conn.php';


$q="select * from employee";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

			<tr class="text-white">
				<th><?php echo $res['id'] ?></th>
				<th><?php echo $res['name'] ?></th>
				<th><?php echo $res['age'] ?></th>
				<th><?php echo $res['salary'] ?></th>
				<th><?php echo $res['qualification'] ?></th>
				<th><?php echo $res['date_of_birth'] ?></th>
				<th><?php echo $res['date_of_join'] ?></th>
				<th><a  href="e_update.php?id=<?php echo $res['id']; ?>" class="text-white"><button class="btn btn-success">View</button></a></th>
			</tr>
<?php }
?>

		</table>
	</div>
</div>
</body>
</html>