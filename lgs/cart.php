<?php 

include "class/class_cart.php";

$cart = new Cart();

session_start();


$product_id = $_GET['product_id'];
$quantity = $_GET['quantity'];
$customer_id = $_SESSION['userId'];
    
    $cart->setCustomerId($customer_id);
    $cart->setProductId($product_id);
    $cart->setQuantity($quantity);

    if($cart->addCart()){
        $_SESSION['msg']="Product added to cart";
        header("location: view_product.php?product_id=$product_id");
    }else{
        echo "<script>alert('Out of Stock')</script>";
    }






?>
