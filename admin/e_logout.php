<?php

session_start();
session_destroy();

header("location:e_login.php");
?>