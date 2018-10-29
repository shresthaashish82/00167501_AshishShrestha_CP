<?php
include "includes/admin_header.php";
include "class/product.php";
$product= new product;
$products=array(array(
    "product_name"=>"",
    "model_number"=>"",
    "price"=>"",
    "description"=>"",
    "manufacturer"=>"",
    "rating"=>"",

));
$products = $product->selectProductByID($_GET['product_id']);
if(isset($_POST['stock_product_btn'])){
    $product->addStock($_GET['product_id'],$_POST['stock']);
    $products = $product->selectProductByID($_GET['product_id']);
}
?>


<h1 style="margin-top: 20px;">
    Add Stock
    <a href="products.php" class="btn btn-danger float-right">Back</a>
</h1>
<form method="post" class="col-md-4">
    <label>Product Name</label>
    <input class="form-control" type="text" name="product_name" placeholder="Product Name" value="<?php echo $products[0]['product_name'] ?>"><br>
    <label>Previous Stock</label>
    <input class="form-control" type="text" name="manufacturer" placeholder="Manufacturer"value="<?php echo $products[0]['stock'] ?>"><br>
    <label>Add Stock</label>
    <input class="form-control" type="number" name="stock" placeholder="Stock"><br>
    <button type="submit" name="stock_product_btn" class="btn btn-info">Add Stock</button>
</form>

<?php
include "includes/admin_footer.php";
?>
