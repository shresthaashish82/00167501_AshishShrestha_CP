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
                    <a href="contactus.php" class="nav-link text-white active">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">HELP & GUIDE</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Help Detail-->

<div class="container">
    <h1>Help & Guide</h1>
    <h3>To Buy Product</h3>
    <p>User have to Register the account.</p>
    <p>And Should Login with the Registered account.</p>
    <h6>In About Us</h6>
    <p>All the information and details of ShresthaElectronic has provided.</p>
    <h6>In Contact Us</h6>
    <p>User can contact to admin.</p>
    <p>User can view the ShresthaElectronic location in Google map.</p>
    <h6>Social Media Button</h6>
    <p>Has the Link of Shrestha Electronic of Social Site.</p>
    <h6>Footer</h6>
    <p>In Footer User can view the Details of ShresthaElectronic and can see the opening hour of shop.</p>


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