<?php
include 'class/customer.php';
$customer =new customer;

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
<form method="post" class="col-md-4">
    <?php
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        $customer->setEmail($email);
        $customer->setPassword($password);
        $customer->login();
    }
    ?><h1>Login<span class="badge badge-secondary"></span></h1>
    <label>Email</label>
    <input class="form-control" type="text" name="email" placeholder="Email"><br>
    <label>Password</label>
    <input class="form-control" type="password" name="password" placeholder="Password"><br>

    <input type="submit" name="login" value="login" class="btn btn-primary" >
    <a href="index.php" class="btn btn-danger">Back</a>
</form>
</body>
</html>