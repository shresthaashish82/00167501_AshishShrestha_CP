<?php
$connection = mysqli_connect("127.0.0.1","root","");
$searchDb = mysqli_select_db($connection,"00167501_ashishshrestha");
if(!$searchDb){
    header('location: localhost_setup.php');
}
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


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Shrestha Electronic And Supplier</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />

</head>

<body>
	<!--Navigation-->
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<div class="container">
		<a href="" class="navbar-brand text-warning font-weight-bold"> Shrestha Electronics and supplier</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
	<span class="navbar-toggler-icon"></span>
</button>

		<div class="collapse navbar-collapse text-center" id="collapsenavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="#" class="nav-link text-white">HOME</a>
				</li>
				<li class="nav-item">
					<a href="aboutus.php" class="nav-link text-white">ABOUT US</a>
				</li>
                <li class="nav-item">
					<a href="contactus.php" class="nav-link text-white">CONTACT US</a>
				</li>
                <li class="nav-item">
                    <a href="help.php" class="nav-link text-white">HELP & GUIDE</a>
                </li>
			</ul>
 		</div>
	</div>
</nav>
<!--Background image-->

	<div class="bgimg">

		<div class="container text-center text-white head">
		<h2>Welcome to Shrestha Electronic and supplier</h2>
		<h1>Best Place for Online Electronic Shopping...</h1>
            <h1>Login and Sign Up Here</h1>
            <a href="login.php" class="btn btn-warning text-white btn-lg">Login</a>
            <a href="sign_up.php" class="btn btn-warning text-white btn-lg">Sign Up</a>
	</div>
</div>
<hr class="light">

<!-- image slider-->
<div id="slides" class="carousel side" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>

		<li data-target="#slides" data-slide-to="1"></li>

		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="image/edit2.png">
			<div class="carousel-caption">
				<h3 class="display-2">Shrestha Electronic shop</h3>
				<h5>For More Details</h5>
		</div>
	</div>
	<div class="carousel-item">
		<img src="image/edit4.png">
        <div class="carousel-caption">
        <h3 class="display-2">Shrestha Electronic Shop</h3>
        <h5>For Visit</h5>
            </div>
	</div>
	<div class="carousel-item">
		<img src="image/edit1.png">
        <div class="carousel-caption">
        <h3 class="display-2">Shrestha Electronic Shop</h3>
        <h5>For Visit</h5>
            </div>
	</div>
</div>
</div>
<hr class="light">
<!--connect-->
<div class="container-fluid padding">
	<div class="row text-center padding">
	<div class="col-12">
		<h2>Connect</h2>
	</div>
	<div class="col-12 social padding">
		<a href="#"><i class="fab fa-facebook"></i></a>
		<a href="#"><i class="fab fa-twitter"></i></a>
		<a href="#"><i class="fab fa-google-plus-g"></i></a>
		<a href="#"><i class="fab fa-instagram"></i></a>
		<a href="#"><i class="fab fa-youtube"></i></a>
	</div>
	 </div>
</div>

<!--Footer-->
<footer class="me">
	<div class="container-fluid padding">
		<div class="row text-center">
			<div class="col-md-4">
				<hr class="light">
				<h5>Shrestha Electronic Details</h5>
				<hr class="light">
				<p>041-20467</p>
				<p>shresthaelectronic22@gmail.com</p>
				<p>Dillibazar</p>
				<p>kathmandu, Nepal</p>
			</div>
	<div class="col-md-4">
		<hr class="light">
		<h5>Our Hours</h5>
		<hr class="light">
		<p>sunday:9am - 5 pm</p>
		<p>Friday:9am - 5 pm</p>
		<p>Saturday :3pm - 5 pm</p>
		</div>
		<div class="col-md-4">
			<hr class="light">
			<h5>My Account </h5>
			<hr class="light">
			<a href="login.php">Login</a><br>
            <a href="sign_up.php">Register</a>
		</div>
		<div class="col-12">
			<hr class="light">
			<h5>@2018 shresthaelectronic</h5>
		</div>

		</div>
	</div>
</footer>
</body>
</html>