<?php
include "class/product.php";
$product = new product();
$product->deleteProduct($_GET['product_id']);