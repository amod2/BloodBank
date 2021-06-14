<?php
session_start();
if(!$_SESSION['alogin'])
{
header("location:index.php");
}

include 'conn.php';

$id = $_SESSION['id'] ;
//echo $id;
$q = " DELETE FROM employee WHERE id = '$id' ";

mysqli_query($conn,$q);

header("location:e_display.php");
?>