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
                <a href="#" class="nav-link text-white">HOME</a>
            </li>
            <li class="nav-item">
                <a href="forum.php" class="nav-link text-white">FORUM</a>
            </li>
            <li class="nav-item">
                <a href="userhelp.php" class="nav-link text-white">USER HELP</a>
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
<!--Background image-->
</div>


<!--Second Navbar-->
<nav class="navbar navbar-expand-md bg-info navbar-dark">
<div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="collapsenavbar">
        <ul class="navbar-nav ml-auto">


            <?php
            $count=0;
            $fetchCategory = $product->electronics->selectCategory();
            foreach($fetchCategory as $fetchCategoryRow){
                $count=$count+1;
                echo '<li class="nav-item dropdown">';
                echo '<a class="nav-link dropdown-toggle" href="#" id="category'.$count.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                echo $fetchCategoryRow["category_name"];
                echo '</a>';
                echo '<div class="dropdown-menu" id="category'.$count.'" aria-labelledby="navbarDropdown">';
                echo '<a class="dropdown-item" href="happy.php">Action</a>';
                echo '<div class="dropdown-item">Happy</div>';
                echo '<a class="dropdown-item" href="#">Something else here</a>';
                echo '</div>';
                echo '</li>';
            }
            ?>












        </ul>
    </div>
    </nav>
    </div>




<div class="container">
<h1>Products</h1>

    <div class="album py-5 bg-light">
            <div class="row">
                <?php
                $fetchProduct = $product->selectProduct();
                if(!$fetchProduct){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '0 Products';
                    echo '</div>';
                }else{
                    foreach($fetchProduct as $fetchProductRow){
                        echo '<div class="col-md-4">';
                        echo '<div class="card mb-4 shadow-sm">';
                        echo '<img class="card-img-top" style="max-height:300px;min-height:300px;" src="image/product_image/'.$fetchProductRow["product_image"].'" alt="Product image">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text" align="center">';
                        echo '<strong>Name : </strong>'.$fetchProductRow["product_name"].'<br/>';
                        echo '<strong>Model : </strong>'.$fetchProductRow["model_number"].'<br/>';
                        echo '<strong>NPR : </strong>'.$fetchProductRow["price"].'<br/>';
                        echo '<strong>Manufacturer : </strong>'.$fetchProductRow["manufacturer"].'<br/>';
                        echo '</p>';
                        echo '<div class="d-flex justify-content-between align-items-center">';
                        echo '<div class="btn-group">';
                        echo '<a href="view_product.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-info">View</a>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
    </div>
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
