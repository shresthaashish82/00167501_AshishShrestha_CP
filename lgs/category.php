<?php
include "includes/admin_header.php";
include "class/electronics.php";
$electronics = new electronics();
?>


<h1>Category</h1>
<?php
if(isset($_POST['add_category_btn'])){

    $electronics->setCategoryName($_POST['category_name']);
    $electronics->addCategory();

    echo '<div class="alert alert-primary" role="alert">';
    echo 'Category Added Successfully';
    echo '</div>';

}

?>
<form method="post">
    <label>Category Name</label>
    <input class="form-control" type="text" name="category_name" placeholder="Category Name"><br>
    <button type="submit" name="add_category_btn" class="btn btn-info">Add Category</button>

</form>
    <h2>Category List</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">Category Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $count=0;
        $fetchCategory = $electronics->selectCategory();
        foreach($fetchCategory as $fetchCategoryRow){
            echo'<tr>';
            $count=$count+1;
            echo'<td>'.$count.'</td>';
            echo'<td>'.$fetchCategoryRow["category_name"].'</td>';
            echo '<td>
                    <a href="edit_category.php?category_id='.$fetchCategoryRow["category_id"].'" class="btn btn-info">Edit</a>

                </td>';
            echo'</tr>';
        }
    ?>


</table>
<?php
include "includes/admin_footer.php";
?>