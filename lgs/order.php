<?php 
session_start();

$product_id = $_GET['product_id'];

include "class/order.php";
$order= new Order;
$order->setProductId($product_id);
$fetchProduct = $order->selectProduct();

	foreach ($fetchProduct as $fetchProductRow) {


		if ($fetchProductRow['available'] == 0) {
			echo "available";

			include_once "class/order.php";
			$order= new Order;
			
			echo $product_id;
			echo $_SESSION['userId'];

			$order->setProductId($product_id);
			$order->setCustomerId($_SESSION['userId']);

			if($order->addOrder())
			{

				if($order->updateProduct()){
					echo "updated";
				}
					echo "insert";
					$_SESSION['order_msg_uns']="Order made successfully";
					header("Location:mycart.php");
			}else{
				echo "not inserted";
			}

		}
		elseif($fetchProductRow['available'] == 1) {
			# code...
			echo "unavailable";
			$_SESSION['order_msg_uns']="Product out of stock";
			header("Location:mycart.php");
	}
}






 ?>