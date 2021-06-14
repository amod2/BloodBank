<?php

error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {
$fullname=$_POST['fullname'];
$mobile=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blodgroup=$_POST['bloodgroup'];
$address=$_POST['address'];
$message=$_POST['message'];
$status=1;
$pass=$_POST['pass'];
$pass2=$_POST['conf_pass'];
if($pass==$pass2){
$sql="INSERT INTO  tblblooddonars(FullName,MobileNumber,EmailId,Password,Age,Gender,BloodGroup,Address,Message,status) VALUES(:fullname,:mobile,:email,:pass,:age,:gender,:blodgroup,:address,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':pass',$pass,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$msg="Your info submitted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}else{

     ?>
    <script type="">
        alert("Your password does not match");
        
    </script>
    <?php
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor Management System | Become A Donar</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>

    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
        <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
h1{color: #fff;
}
form input{background: #000;color: #fff;

}
    
    </style>


</head>

<body style="background-color: red;">

<?php include('includes/header.php');?>
<div style="float: right;"><a href="login.php"><input type="submit" name=""value="Login" style="background-color: blue;color: white;padding-left:30px;padding-right:30px;border-radius: 5px;"> </a></div>
        <form name="donar" method="post" action="">

    <!-- Page Content -->
    <div class="main" style="background-image: url('images/blood.jpg');">
    <div class="container" style="margin-top: 0px;">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Become a <small>Donor</small></h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active">Become a Donor</li>
        </ol>
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        
<div class="row">
<div class="col-lg-6  mb-4 ">
<div class="font-italic" style="color:#fff;">Full Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required style=""></div>
</div>
<div class="col-lg-6  mb-4">
<div class="font-italic" style="color:#fff;">Mobile Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>

</div>
<div class="row">
    <div class="col-lg-6  mb-4">
<div class="font-italic" style="color:#fff;">Email Id</div>
<div><input type="email" name="emailid" class="form-control"></div>
</div>

<div class="col-lg-6 mb-4">
<div class="font-italic" style="color:#fff;">Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>
</div>

<div class="row">



<div class="col-lg-6 mb-4">
<div class="font-italic" style="color:#fff;">Gender<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="" >Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="col-lg-6 mb-4">
<div class="font-italic" style="color: #fff;">Blood Group<span style="color:red">*</span> </div>
<div><select name="bloodgroup" class="form-control" required>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
</div>
</div>
</div>


<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic" style="color:#fff;">Address</div>
<div><textarea class="form-control" name="address"></textarea></div>
</div>

<div class="col-lg-8 mb-4">
<div class="font-italic" style="color:#fff;">Message<span style="color:red">*</span></div>
<div><textarea class="form-control" name="message" required> </textarea></div>
</div>
</div>
<div class="row">
    <div class="col-lg-6  mb-4">
<div class="font-italic" style="color:#fff;">Password</div>
<div><input type="password" name="pass" class="form-control"></div>
</div>

<div class="col-lg-6 mb-4">
<div class="font-italic" style="color:#fff;">Confirm-Password<span style="color:red">*</span></div>
<div><input type="password" name="conf_pass" class="form-control" required></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="Register" style="cursor:pointer;width: 100%;"></div>
</div>



</div>



        <!-- /.row -->
</form>   
        <!-- /.row -->
</div>
</div>
  <?php include('includes/footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
