<!--Session-->

<?php
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

<!--Header of Contact us-->

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Shrestha Electronic And Supplier</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />
<style>

	/*---contact us Css--*/
.contact-form{
		background:rgb(0,0,0, .6);
		color: #d5d5d5;
		margin-top: 100px;
		padding: 20px;
		box-shadow: 0px 0px 10px 3px grey;
	}

#map{
	height: 350px;
	width: 1350px;
	border:solid 1px red;
	margin-top: 10px;
	margin-bottom: 10px;
	}
</style>
</head>
<body>
	<!--navigation-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	<div class="container">
		<a href="" class="navbar-brand text-warning font-weight-bold"> Shrestha Electronics and supplier</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
	<span class="navbar-toggler-icon"></span>
</button>

		<div class="collapse navbar-collapse text-center" id="collapsenavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link text-white">HOME</a>
				</li>
				<li class="nav-item">
					<a href="aboutus.php" class="nav-link text-white">ABOUT US</a>
				</li>
                <li class="nav-item">
					<a href="#" class="nav-link text-white active">CONTACT US</a>
				</li>
                <li class="nav-item">
                    <a href="help.php" class="nav-link text-white">HELP & GUIDE</a>
                </li>
			</ul>
 		</div>
	</div>
</nav>


<!--contact Us-->	
<div class="container contact-form">
	<h1>Contact Form</h1>
	<hr class="light">
<div class="row">
<div class="col-md-6">
<address>Dillibazar,kathmandu</address>
<p>Email:test@gmail.com</p>
<p>Phone:34576788</p>	
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Name</label>
		<input type="text" class="form-control">
	</div>
	<div class="form-group">
	<label>Email</label>
		<input type="text" class="form-control">
	</div>
	<div class="form-group">
	<label>Address</label>
		<input type="text" class="form-control">
	</div>
	<div class="form-group">
	<label>Message</label>
		<textarea class="form-control" rows="5"></textarea>
	</div>
	<div class="form-group">
		<button class="btn btn-primary btn-block">Send</button>
	</div>
</div>
</div>
</div> 
<hr class="light">
<h1> Our Location:</h1>
<div id="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.3846150938984!2d85.3244805145383!3d27.70540873218506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a77f1ab301%3A0xb213d09ebce4b3da!2sDillibazar!5e0!3m2!1sen!2snp!4v1538458475306" width="1350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe></div>

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