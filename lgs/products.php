<?php
include "includes/admin_header.php";
include "class/product.php";

$product= new product;
?>
<h1>Products

</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Image</th>
            <th>Name</th>
            <th>Model Number</th>
            <th>Price</th>
            <th>Description</th>
            <th>Manufacturer</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php
    $count=0;
    $fetchProduct = $product->selectProduct();
    if(!$fetchProduct){
        echo '<div class="alert alert-danger" role="alert">';
        echo '0 Products';
        echo '</div>';
    }else{
        foreach($fetchProduct as $fetchProductRow){
            echo'<tr>';
            $count=$count+1;
            echo'<td>'.$count.'</td>';
            echo'<td><img style="max-width: 100px;max-height: 100px;" src="image/product_image/'.$fetchProductRow["product_image"].'"></td>';
            echo'<td>'.$fetchProductRow["product_name"].'</td>';
            echo'<td>'.$fetchProductRow["model_number"].'</td>';
            echo'<td>'.$fetchProductRow["price"].'</td>';
            echo'<td>'.$fetchProductRow["description"].'</td>';
            echo'<td>'.$fetchProductRow["manufacturer"].'</td>';
            echo'<td>'.$fetchProductRow["stock"].'</td>';
            echo '<td>
                  <a href="edit_product.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-info">Edit</a>
                <hr>
                <a href="delete_product.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-danger">Delete</a>
                <hr>
                <a href="stock.php?product_id='.$fetchProductRow["product_id"].'" class="btn btn-success">Add Stock</a>
            </td>';

            echo'</tr>';
        }
    }
    ?>



</table>
<?php
include "includes/admin_footer.php";
?>
