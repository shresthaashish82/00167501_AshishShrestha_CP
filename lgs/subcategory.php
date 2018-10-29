<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
$category_name=array(array(
    "category_name"=>""
));
?>

    <h1>Sub-Category</h1>
<?php
if(isset($_POST['add_subcategory_btn'])){
    $electronics->setSubCategory($_POST['subcategory_name']);
    $electronics->setCategoryId($_POST['category']);
    $electronics->addSubCategory();

    echo '<div class="alert alert-primary" role="alert">';
    echo 'Sub-Category Added Successfully';
    echo '</div>';


}

?>
    <form method="post">
        <label>Select Category</label>
        <select class="form-control" name="category">
            <?php
            $electronic = $electronics->selectCategory();
            foreach($electronic as $electronicRow){
                echo '<option value="'.$electronicRow['category_id'].'">'.$electronicRow['category_name'].'</option>';
            }
            ?>
        </select>
        <label>Sub-Category Name</label>
        <input class="form-control" type="text" name="subcategory_name" placeholder="Sub-Category Name"><br>
        <button type="submit" name="add_subcategory_btn" class="btn btn-info">Add Sub-Category</button>

    </form>

    <h2>Sub-Category List</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Sub-Category Id</th>
            <th scope="col">Sub-Category Name</th>
            <th scope="col">Category</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $count=0;
        $fetchSubCategory = $electronics->selectSubCategory();
        foreach($fetchSubCategory as $fetchSubCategoryRow){
            echo'<tr>';
            $count=$count+1;
            echo'<td>'.$count.'</td>';
            echo'<td>'.$fetchSubCategoryRow["subcategory_name"].'</td>';
            $fetchCategoryName = $electronics->selectCategoryByID($fetchSubCategoryRow["category"]);
            echo'<td>'.$fetchCategoryName[0]['category_name'].'</td>';
            echo '<td>
                    <a href="edit_subcategory.php?subcategory_id='.$fetchSubCategoryRow["subcategory_id"].'" class="btn btn-info">Edit</a>
            </td>';
            echo'</tr>';
        }
        ?>

    </table>





<?php
include "includes/admin_footer.php";
?>