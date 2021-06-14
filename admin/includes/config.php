<?php 
// DB credentials.
define('DB_HOST','ec2-65-0-199-102.ap-south-1.compute.amazonaws.com');
define('DB_USER','root');
define('DB_PASS','1376');
define('DB_NAME','bbdms');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>