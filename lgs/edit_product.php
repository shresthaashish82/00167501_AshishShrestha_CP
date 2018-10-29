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
if(isset($_POST['edit_product_btn'])){
    $product->setProductName($_POST['product_name']);
    $product->setModelNumber($_POST['model_number']);
    $product->setPrice($_POST['price']);
    $product->setDescription($_POST['description']);
    $product->setManufacture($_POST['manufacturer']);
    $product->editProduct($_GET['product_id']);
}
?>


<h1 style="margin-top: 20px;">
    Edit Product
    <a href="products.php" class="btn btn-danger float-right">Back</a>
</h1>
<form method="post" class="col-md-4" enctype="multipart/form-data">

    <input class="form-control" type="text" name="product_name" placeholder="Product Name" value="<?php echo $products[0]['product_name'] ?>"><br>
    <label>Model Number</label>
    <input class="form-control" type="text" name="model_number" placeholder="Model Number" value="<?php echo $products[0]['model_number'] ?>"><br>
    <label>Price</label>
    <input class="form-control" type="text" name="price" placeholder="Price" value="<?php echo $products[0]['price'] ?>"><br>
    <label>Description</label>
    <textarea rows="6" class="form-control" name="description" placeholder="Description"><?php echo $products[0]['description'] ?></textarea><br>
    <label>Manufacturer</label>
    <input class="form-control" type="text" name="manufacturer" placeholder="Manufacturer"value="<?php echo $products[0]['manufacturer'] ?>"><br>

    <button type="submit" name="edit_product_btn" class="btn btn-info">Edit product</button>

</form>



<?php
include "includes/admin_footer.php";
?>
