<?php
include "includes/admin_header.php";
include "class/product.php";

$product= new product;
?>
<?php
if(isset($_POST['add_product_btn'])){
    $product_image_name = $_FILES['image']['name'];
    $product_image_type = pathinfo($product_image_name,PATHINFO_EXTENSION);


    $product->setProductImage($product_image_name);
    $product->setProductName($_POST['product_name']);
    $product->setModelNumber($_POST['model_number']);
    $product->setPrice($_POST['price']);
    $product->setDescription($_POST['description']);
    $product->setManufacture($_POST['manufacturer']);
    $product->setSubSubCategoryId($_GET['sub_sub_category_id']);

    if(isset($_GET['sub_category'])){
        $sub_category = $_GET['sub_category'];
        if($sub_category==3){
            //for tv
            $product->setScreenSize($_POST['screen_size']);
        }elseif($sub_category==6){
            //for BlueTooth speaker
            $product->setBatteryBackup($_POST['battery_backup']);
        }elseif($sub_category==5 || $sub_category==4 || $sub_category==7){
            //for water purifier,washing machine,refrigerator
            $product->setCapacity($_POST['capacity']);
        }elseif($sub_category==8){
            //for air purifier
            $product->setEffectiveRoomArea($_POST['effective_room_area']);
        }
    }
    
    if($product_image_type=="jpg" || $product_image_type=="png" || 
        $product_image_type=="JPG" || $product_image_type=="PNG"){
            move_uploaded_file($_FILES['image']['tmp_name'], 'image/product_image/'.$product_image_name);
            $product->addProduct($_GET['sub_category']);        
            echo '<div class="alert alert-primary" role="alert">';
            echo 'Product Added Successfully';
            echo '</div>';
    }else{
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Unsupported File';
            echo '</div>';            
    }    

}
?>
<h1 style="margin-top: 20px;">
    Product Specification
    <a href="subsubcategory.php" class="btn btn-danger float-right">Back</a>
</h1>

<form method="post" class="col-md-4" enctype="multipart/form-data">
    <label>Product Image</label>
    <input class="form-control" type="file" name="image"><br>   
    <label>Product Name</label>
    <input class="form-control" type="text" name="product_name" placeholder="Product Name"><br>
    <label>Model Number</label>
    <input class="form-control" type="text" name="model_number" placeholder="Model Number"><br>
    <label>Price</label>
    <input class="form-control" type="text" name="price" placeholder="Price"><br>
    <label>Description</label>
    <textarea rows="6" class="form-control" name="description" placeholder="Description"></textarea><br>
    <label>Manufacturer</label>
    <input class="form-control" type="text" name="manufacturer" placeholder="Manufacturer"><br>
    <?php
    if(isset($_GET['sub_category'])){
        $sub_category = $_GET['sub_category'];
        if($sub_category==3){
            echo '<label>Screen Size</label>';
            echo '<input class="form-control" type="text" name="screen_size" placeholder="Screen Size"><br>';
        }elseif($sub_category==6){
            echo '<label>Battery Backup Time</label>';
            echo '<input class="form-control" type="number" name="battery_backup" placeholder="Battery Backup Time"><br>';       
        }elseif($sub_category==5 || $sub_category==4 || $sub_category==7){
            echo '<label>Capacity</label>';
            echo '<input class="form-control" type="number" name="capacity" placeholder="Capacity"><br>';        
        }elseif($sub_category==8){            
            echo '<label>Effective Room Area</label>';
            echo '<input class="form-control" type="number" name="effective_room_area" placeholder="Effective Room Area"><br>';        
        }
    }
    ?>
    <button type="submit" name="add_product_btn" class="btn btn-info">Add product</button>
</form>

<?php
include "includes/admin_footer.php";
?>
