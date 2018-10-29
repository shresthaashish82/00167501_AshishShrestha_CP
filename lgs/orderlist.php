<?php
include "includes/admin_header.php";
include "class/order.php";

$order= new Order();

?>
    <h2>Orders</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Product Name</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Quantity</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count=0;
    if(!$order->selectOrderAndQuantity()) {
        echo '<div class="alert alert-danger">0 Order till now</div>';

    }else{
        $fetchOrder = $order->selectOrderAndQuantity();
        foreach($fetchOrder as $fetchOrderRow){
            echo'<tr>';
            $count=$count+1;
            echo'<td>'.$count.'</td>';
            
            $order->setProductId($fetchOrderRow['product_id']);
            $fetchProduct = $order->selectProduct();
        	foreach($fetchProduct as $fetchProductRow){
        	    echo'<td>'.
            	    $fetchProductRow['product_name']
        	    .'</td>';
            }


        	$order->setCustomerId($fetchOrderRow['customer_id']);
            $fetchCustomer = $order->selectCustomer();
        	foreach($fetchCustomer as $fetchCustomerRow){
                echo'<td>'.$fetchCustomerRow["customer_name"].'</td>';
            }

            echo '<td>'.$fetchOrderRow["quantity"].'</td>';

            echo'</tr>';
        }
    }




        ?>
        </tbody>
    </table>





<?php
include "includes/admin_footer.php";
?>