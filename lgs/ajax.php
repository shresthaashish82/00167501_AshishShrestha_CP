<?php
include "class/electronics.php";
$electronics = new electronics();
$categoryId = $_POST['categoryId'];
$subCategory = $electronics->selectSubCategoryByCategoryID($categoryId);
    foreach($subCategory as $subCategoryRow){
        echo "<option value='".$subCategoryRow['subcategory_id']."'>".$subCategoryRow['subcategory_name']."</option>";
    }
?>