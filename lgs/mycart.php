<?php


include "class/class_cart.php";
$cart= new Cart;

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
                <a href="index.php" class="nav-link text-white">HOME</a>
            </li>
            <li class="nav-item">
                <a href="forum.php" class="nav-link text-white">FORUM</a>
            </li>
            <li class="nav-item">
                <a href="userhelp.php" class="nav-link text-white">USER HELP</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="welcome.php"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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


<div class="container">
<h1>My Cart</h1>

<?php if (!empty($_SESSION['order_msg_uns'])) {
    # code...
    echo $_SESSION['order_msg_uns'];
} ?>

    <div class="album py-5 bg-light">
            <div class="row">
                <?php
                $cart->setCustomerId($_SESSION['userId']);
                $fetchUser = $cart->selectMyCart();
                if(!$fetchUser){
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '0 Products';
                    echo '</div>';
                }else{
                    foreach($fetchUser as $fetchUserRow){
                        $cart->setProductId($fetchUserRow['product_id']);
                        $fetchProduct  = $cart->selectProductInCartId();
                        foreach ($fetchProduct as $fetchProductRow) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card mb-4 shadow-sm">';
                        echo '<img class="card-img-top" style="max-height:300px;min-height:300px;" src="image/product_image/'.$fetchProductRow["product_image"].'" alt="Product image">';
                        echo '<div class="card-body">';
                        echo '<p class="card-text" align="center">';
                        echo '<strong>Name : </strong>'.$fetchProductRow["product_name"].'<br/>';
                        echo '<strong>Model : </strong>'.$fetchProductRow["model_number"].'<br/>';
                        echo '<strong>NPR : </strong>'.$fetchProductRow["price"].'<br/>';echo '<strong>Manufacturer : </strong>'.$fetchProductRow["manufacturer"].'<br/>';
                        echo '<strong>Quantity : </strong>'.$fetchProductRow["quantity"].'<br/>';
                        echo '</p>';
                        echo '<div class="d-flex justify-content-between align-items-center">';
                            echo '<a href="order.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-info">Order</a>';
                            echo '<a href="delete_cart.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-danger">Delete</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                }
                ?>
            </div>
    </div>
</div>

</body>
</html>