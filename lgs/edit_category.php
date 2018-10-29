<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
$category=array(array(
    "category_id"=>"",
    "category_name"=>"",

));
$category = $electronics->selectCategoryByID($_GET['category_id']);
if(isset($_POST['edit_category_btn'])){
    $electronics->setCategoryName($_POST['category_name']);
    $electronics->editCategory($_GET['category_id']);
}
?>
<h1 style="margin-top: 20px;">
    Edit Category
    <a href="category.php" class="btn btn-danger float-right">Back</a>
</h1>

<form method="post">
    <label>Category Name</label>
    <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="<?php echo $category[0]['category_name'] ?>">
    <button class="btn btn-success" type="submit" name="edit_category_btn">Edit</button>
</form>

<?php
include "includes/admin_footer.php";
?>
