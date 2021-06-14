<?php
session_start();
if(!$_SESSION['alogin'])
{
header("location:index.php");
}

$conn=mysqli_connect('localhost','root','','cloud');

$id = $_SESSION['id'] ;
//echo $id;
$q = " DELETE FROM tblblooddonars WHERE id = '$id' ";

mysqli_query($conn,$q);

header("location:donor-list1.php");
?>