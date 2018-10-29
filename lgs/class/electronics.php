<?php
include "database.php";
class electronics{

    public $database;
    public function __construct(){
        $this->database = new database();
    }

    /**
     * @return database
     */
    public function getDatabase()
    {
        return $this->database;
    }



    /*
     * Category
     */
    private $category_id;
    private $category_name;

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->category_name;
    }

    /**
     * @param mixed $category_name
     */
    public function setCategoryName($category_name)
    {
        $this->category_name = $category_name;
    }


    public function addCategory(){
        $category_name=$this->getCategoryName();
        $addCategorySQL="insert into category(category_name) values('$category_name')";
        $this->database->CUD($addCategorySQL);
    }

    public function selectCategory(){
        $selectCategorySQL = "select * from category";
        return $this->database->select($selectCategorySQL);
    }

    public function selectCategoryByID($category_id){
        $selectCategoryByIDSQL = "select * from category where category_id=$category_id";
        return $this->database->select($selectCategoryByIDSQL);
    }

    public function editCategory($category_id){
        $category_name = $this->getCategoryName();
        $editCategorySQL = "update category set category_name='$category_name' where category_id=$category_id";
        $this->database->CUD($editCategorySQL);
        header("location:category.php");
    }


    /*
     * End of Category
     */

    /*
     * Sub-category
     */
    private $subCategoryID;
    private $subCategory;

    /**
     * @return mixed
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * @param mixed $subCategory
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;
    }

    /**
     * @return mixed
     */
    public function getSubCategoryID()
    {
        return $this->subCategoryID;
    }

    /**
     * @param mixed $subCategoryID
     */
    public function setSubCategoryID($subCategoryID)
    {
        $this->subCategoryID = $subCategoryID;
    }

    public function addSubCategory(){
        $subcategory_name=$this->getSubCategory();
        $category = $this->getCategoryId();
        $addSubCategorySQL="insert into subcategory(subcategory_name,category) values('$subcategory_name',$category)";
        $this->database->CUD($addSubCategorySQL);
    }


    public function selectSubCategory(){
        $selectSubCategorySQL = "select * from subcategory";
        return $this->database->select($selectSubCategorySQL);
    }

    public function selectSubCategoryByCategoryID($categoryID){
        $selectSubCategoryByCategoryIDSQL = "select * from subcategory where category=$categoryID";
        return $this->database->select($selectSubCategoryByCategoryIDSQL);
    }

    public function selectSubCategoryByID($subCategory_id){
        $selectSubCategoryByID = "select * from subcategory where subcategory_id=$subCategory_id";
        return $this->database->select($selectSubCategoryByID);
    }

    public function editSubCategory($subcategory_id){
        $subcategory_name = $this->getSubCategory();
        $editSubCategorySQL = "update subcategory set subcategory_name='$subcategory_name' where subcategory_id=$subcategory_id";
        $this->database->CUD($editSubCategorySQL);
        header("location:subcategory.php");
    }


    /**
    End of Sub Category
     */

    //sub-sub-category-name
    private $sub_sub_category_id;
    private $sub_sub_category_name;

    /**
     * @return mixed
     */
    public function getSubSubCategoryId()
    {
        return $this->sub_sub_category_id;
    }

    /**
     * @param mixed $sub_sub_category_id
     */
    public function setSubSubCategoryId($sub_sub_category_id)
    {
        $this->sub_sub_category_id = $sub_sub_category_id;
    }

    /**
     * @return mixed
     */
    public function getSubSubCategoryName()
    {
        return $this->sub_sub_category_name;
    }

    /**
     * @param mixed $sub_sub_category_name
     */
    public function setSubSubCategoryName($sub_sub_category_name)
    {
        $this->sub_sub_category_name = $sub_sub_category_name;
    }

    public function addSubSubCategory(){
        $subSubCategory = $this->getSubSubCategoryName();
        $subCategory = $this->getSubCategoryID();
        $category = $this->getCategoryId();
        $addSubSubCategory = "insert into subsubcategory(subsubcategory_name,subcategory,category) VALUES ('$subSubCategory',$subCategory,$category)";
        $this->database->CUD($addSubSubCategory);
    }


    public function selectSubSubCategory(){
        $selectSubSubCategorySQL = "select * from subsubcategory";
        return $this->database->select($selectSubSubCategorySQL);
    }

    public function selectSubSubCategoryByID($sub_sub_category_id){
        $selectSubSubCategoryByID = "select * from subsubcategory where subsubcategory_id=$sub_sub_category_id";
        return $this->database->select($selectSubSubCategoryByID);
    }




    public function editSubSubCategory($sub_sub_category_id){
        $sub_sub_category_name = $this->getSubSubCategoryName();
        $editSubSubCategorySQL = "update subsubcategory set subsubcategory_name='$sub_sub_category_name' where subsubcategory_id=$sub_sub_category_id";
        $this->database->CUD($editSubSubCategorySQL);
        header("location:subsubcategory.php");
    }









}



/**
 * End of Sub Sub Category
 */