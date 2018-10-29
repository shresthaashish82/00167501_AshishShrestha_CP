<?php
include "class/customer.php";

$customer = new customer();
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id=="admin"){
        header("location:admin.php");
    }else{
        header("location:welcome.php");
    }
}

?>



<html>
<title>Nothing</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />
<head>

</head>
<body>
<?php
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $address=$_POST['address'];
    $phoneNumber=$_POST['phoneNumber'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmPassword=$_POST['confirmPassword'];

    $customer->setName($name);
    $customer->setAddress($address);
    $customer->setPhoneNumber($phoneNumber);
    $customer->setEmail($email);
    $customer->setPassword($password);
    $customer->setConfirmPassword($confirmPassword);

    $customer->register();


}
?>
<form method="post" class="col-md-4">
    <h1>Sign UP<span class="badge badge-secondary"></span></h1>
    <label>Name</label>
    <input class="form-control" type="text" name="name" placeholder="Name"><br>
    <label>Address</label>
    <input class="form-control" type="text" name="address" placeholder="Address"><br>
    <label>Phone Number</label>
    <input class="form-control" type="text" name="phoneNumber" placeholder="Phone Number"><br>
    <label>Email</label>
    <input class="form-control" type="email" name="email" placeholder="Email"><br>
    <label>Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password"><br>
    <label>Confirm Password</label>
    <input class="form-control" type="password" name="confirmPassword"placeholder="Confirm Password"><br>
    <input type="submit" name="register" value="Register" class="btn btn-info" >
    <a href="login.php" class="btn btn-danger">Login</a>
    <a href="index.php" class="btn btn-info">Back</a>
    


</form>
</body>
</html>