<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
$subcategory=array(array(
    "subcategory_id"=>"",
    "subcategory_name"=>"",

));
$subcategory = $electronics->selectSubCategoryByID($_GET['subcategory_id']);
if(isset($_POST['edit_subcategory_btn'])){
    $electronics->setSubCategory($_POST['subcategory_name']);
    $electronics->editSubCategory($_GET['subcategory_id']);
}
?>
<h1 style="margin-top: 20px;">
    Edit Sub-Category
    <a href="subcategory.php" class="btn btn-danger float-right">Back</a>
</h1>

<form method="post">
    <label>Sub-Category Name</label>
    <input type="text" name="subcategory_name" class="form-control" placeholder="Sub-Category Name" value="<?php echo $subcategory[0]['subcategory_name'] ?>">
    <button class="btn btn-success" type="submit" name="edit_subcategory_btn">Edit</button>
</form>

<?php
include "includes/admin_footer.php";
?>
