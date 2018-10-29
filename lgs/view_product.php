<?php
session_start();
include "class/product.php";
$product= new product;
$products=array(array(
    "product_id"=>"",
    "product_image"=>"",
    "product_name"=>"",
    "model_number"=>"",
    "price"=>"",
    "description"=>"",
    "manufacturer"=>"",
    "rating"=>""

));
$products = $product->selectProductByID($_GET['product_id']);
if(isset($_POST['add_to_cart_btn'])){
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    header("location: cart.php?product_id=$product_id&&quantity=$quantity");
}elseif(isset($_POST['add_to_compare_btn'])){
    echo '<script>alert("Add to Compare Button");</script>';
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
                    <a href="index.php" class="nav-link text-white">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-white">FORUM</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hy Me </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                    <a href="mycart.php" class="dropdown-item">My Cart</a>
                        
                        <a href="edit_profile.php" class="dropdown-item">View Profile</a>
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
<!-- Portfolio Item Heading -->
<h1 class="my-4"><?php echo $products[0]['product_name'] ?></h1>

<!-- Portfolio Item Row -->
<div class="row">

    <div class="col-md-8">
        <img class="img-fluid" src="image/product_image/<?php echo $products[0]['product_image'] ?>" alt="">
    </div>

    <div class="col-md-4">
        <h3 class="my-3"><?php echo $products[0]['product_name'] ?></h3>
        <h6>Model Number : <?php echo $products[0]['model_number'] ?></h6>
        <h6>Price : <?php echo $products[0]['price'] ?></h6>
        <p><?php echo $products[0]['description'] ?></p>
        <h3 class="my-3">Product Details</h3>
        <ul>
            <li>Manufacturer : <?php echo $products[0]['manufacturer'] ?></li>
        </ul>
        <form method="post">
            <input type="hidden" name="product_id" value="<?php echo $products[0]['product_id'] ?>">
            <label>Quantity</label>
            <input class="form-control" required="required" type="number" name="quantity" placeholder="Quantity" min="1"><br>

            <button type="submit" class="btn btn-primary" name="add_to_cart_btn">Add to Cart</button>

            <p> <?php 
            

            if(!empty($_SESSION['msg'])){
            
                echo $_SESSION['msg']; 
            }
                 ?>
            
            </p>

        </form>


    </div>

</div>
<!-- /.row -->

</div>

c<!--connect-->
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
