<?php
include "class/customer.php";
$customer = new customer;

session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id=="admin"){
        header('location:admin.php');
    }
}else{
    header("location:index.php");
}
?>

<?php
if(isset($_POST['change_btn'])){
    $customer->setPassword($_POST['old_password']);
    $customer->setConfirmPassword($_POST['confirm_password']);
    $customer->setNewPassword($_POST['new_password']);
    $customer->changePassword($_SESSION['id']);
}
?>


<html>

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />
</head>
<body>

<form method="post" class="col-md-4">
    <h1>Change Password<span class="badge badge-secondary"></span></h1>
    <label>Old Password</label><br/>
    <input class="form-control" name="old_password" type="password"><br/>
    <label >New Password</label><br/>
    <input class="form-control" name="new_password" type="password"><br/>
    <label>Confirm Password</label><br/>
    <input class="form-control" name="confirm_password" type="password"><br/>
    <input type="submit" value="Change" name="change_btn" class="btn btn-primary">
    <a href="welcome.php" class="btn btn-success">Back</a>
</form>



</form>
</body>
</html>