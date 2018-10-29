<?php


include "class/product.php";
$product= new product;

session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id=="admin"){
        header('location:welcome.php');
    }
}else{
    header("location:index.php");
}

?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<style>
    .dropdown:hover>.dropdown-menu{
        display: block;
    }
</style>

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
                    <a href="welcome.php" class="nav-link text-white">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="forum.php" class="nav-link text-white">FORUM</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">USER HELP</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome <?php echo $_SESSION['name']; ?> </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                        <a href="edit_profile.php" class="dropdown-item">View Profile</a>
                        <a href="mycart.php" class="dropdown-item">My Cart</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>

            </ul>
        </div>
</nav>

<!--User Help Detail-->

<div class="container">
    <h1>User Help Guide</h1>
    <h3>What user can do??</h3>
    <h6>In Home Page</h6>
    <p>User can view the product.</p>
    <h6>In Forum Page</h6>
    <p>User can Question and Can Reply the Question.</p>
    <h6>In Change Password Page</h6>
    <p>User can change password.</p>
    <h6>In Edit Profile Page </h6>
    <p>User can Edit Profile.</p>
    <h6>After clicking view from Homepage</h6>
    <p>user can add the product to cart.</p>
    <p>User can only order the product that are in stock.</p>
    <p>user can add quantity.</p>
    <h6>In Add to cart Page</h6>
    <p>User can view the Product that is Added to cart.</p>
    <h6>Footer</h6>
    <p>In Footer User can view the Details of ShresthaElectronic and can see the opening hour of shop.</p>
</div>
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
                <div class="col-md-6">
                    <hr class="light">
                    <h5>Shrestha Electronic Details</h5>
                    <hr class="light">
                    <p>Phone:041-20467</p>
                    <p>shresthaelectronic22@gmail.com</p>
                    <p>Dillibazar</p>
                    <p>kathmandu, Nepal</p>
                </div>
                <div class="col-md-6">
                    <hr class="light">
                    <h5>Our Hours</h5>
                    <hr class="light">
                    <p>sunday:9am - 5 pm</p>
                    <p>Friday:9am - 5 pm</p>
                    <p>Saturday :3pm - 5 pm</p>
                </div>


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




