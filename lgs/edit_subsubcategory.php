<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
$subSubCategory=array(array(
    "subsubcategory_id"=>"",
    "subsubcategory_name"=>""
));
$subSubCategory = $electronics->selectSubSubCategoryByID($_GET['sub_sub_category_id']);
if(isset($_POST['edit_subSubCategory_btn'])){
    $electronics->setSubSubCategoryName($_POST['subSubCategory_name']);
    $electronics->editSubSubCategory($_GET['sub_sub_category_id']);
}
?>
<h1 style="margin-top: 20px;">
    Edit SubSub-Category
    <a href="subsubcategory.php" class="btn btn-danger float-right">Back</a>
</h1>

<form method="post">
    <label>Sub-Category Name</label>
    <input type="text" name="subSubCategory_name" class="form-control" placeholder="Sub-Category Name" value="<?php echo $subSubCategory[0]['subsubcategory_name'] ?>">
    <button class="btn btn-success" type="submit" name="edit_subSubCategory_btn">Edit</button>
</form>

<?php
include "includes/admin_footer.php";
?>
