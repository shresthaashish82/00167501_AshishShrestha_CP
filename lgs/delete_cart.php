<?php
session_start();
$customerID = $_SESSION['id'];
$product_id = $_GET['product_id'];
include "class/database.php";
$database = new database();
$sql = "delete from cart where customerId=$customerID and product_id=$product_id";
$database->CUD($sql);
header('location:mycart.php');
