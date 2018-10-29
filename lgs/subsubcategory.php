<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
$category_name=array(array(
    "category_name"=>""
));
$sub_category_name=array(array(
    "subcategory_name"=>""
));

?>

<h1>Sub-Sub Category</h1>
<?php
if(isset($_POST['add_subcategory_btn'])){
    $electronics->setSubSubCategoryName($_POST['sub-sub-category-name']);
    $electronics->setSubCategoryID($_POST['sub-category']);
    $electronics->setCategoryId($_POST['category']);

    $electronics->addSubSubCategory();
    echo '<div class="alert alert-primary" role="alert">';
    echo 'Sub-Sub-Category Added Successfully';
    echo '</div>';

}
?>
<form method="post">
    <label>Select Category</label>
    <select class="form-control" name="category" id="category">
        <option>Select Category</option>
        <?php
        $electronic = $electronics->selectCategory();
        foreach($electronic as $electronicRow){
            echo '<option value="'.$electronicRow['category_id'].'">'.$electronicRow['category_name'].'</option>';
        }
        ?>
    </select>
    <label>Select Sub-Category</label>
    <select name="sub-category" id="sub-category" class="form-control" required="required">
        <option>Select Category</option>


    </select>
    <label>Sub-Sub-Category Name</label>
    <input type="text" class="form-control" placeholder="Sub-Sub-Category Name" name="sub-sub-category-name"><br>
    <button type="submit" name="add_subcategory_btn" class="btn btn-info">Add Sub-sub Category</button>


</form>



    <h2>Sub-Sub Category List</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Sub-Sub Category Id</th>
            <th scope="col">Sub-Sub Category Name</th>
            <th scope="col">Sub Category</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
    $count=0;
    $fetchSubSubCategory = $electronics->selectSubSubCategory();
    foreach($fetchSubSubCategory as $fetchSubSubCategoryRow){
    echo'<tr>';
        $count=$count+1;
    echo'<td>'.$count.'</td>';
    echo'<td>'.$fetchSubSubCategoryRow["subsubcategory_name"].'</td>';
    $fetchSubCategoryName = $electronics->selectSubCategoryByID($fetchSubSubCategoryRow["subcategory"]);
    echo'<td>'.$fetchSubCategoryName[0]['subcategory_name'].'</td>';
    $fetchCategoryName = $electronics->selectCategoryByID($fetchSubSubCategoryRow["category"]);
    echo'<td>'.$fetchCategoryName[0]['category_name'].'</td>';
    echo'<td>
                  <a href="edit_subsubcategory.php?sub_sub_category_id='.$fetchSubSubCategoryRow["subsubcategory_id"].'" class="btn btn-info">Edit</a>
                  <a href="specification.php?sub_category='.$fetchSubSubCategoryRow["subcategory"].'&&sub_sub_category_id='.$fetchSubSubCategoryRow["subsubcategory_id"].'" class="btn btn-success">Add Product</a>
            </td>';
    echo'</tr>';



}

?>
<?php
include "includes/admin_footer.php";
?>