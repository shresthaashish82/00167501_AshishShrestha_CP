<?php
include "electronics.php";
class product
{
    public $electronics;

    public function __construct()
    {
        $this->electronics = new electronics();
    }

    /**
     * @return electronics
     */
    public function getElectronics()
    {
        return $this->electronics;
    }



    private $product_id;
    private $product_image;
    private $product_name;
    private $model_number;
    private $price;
    private $description;
    private $manufacture;
    private $subSubCategoryId;
    private $stock;

    //for tv
    private $screen_size;
    //for blue-tooth speaker
    private $battery_backup;
    //for water purifier,washing machine,refrigerator
    private $capacity;
    //for air purifier;
    private $effective_room_area;

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    /**
     * @return mixed
     */
    public function getBatteryBackup()
    {
        return $this->battery_backup;
    }

    /**
     * @param mixed $battery_backup
     */
    public function setBatteryBackup($battery_backup)
    {
        $this->battery_backup = $battery_backup;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return mixed
     */
    public function getEffectiveRoomArea()
    {
        return $this->effective_room_area;
    }

    /**
     * @param mixed $effective_room_area
     */
    public function setEffectiveRoomArea($effective_room_area)
    {
        $this->effective_room_area = $effective_room_area;
    }

    /**
     * @return mixed
     */
    public function getScreenSize()
    {
        return $this->screen_size;
    }

    /**
     * @param mixed $screen_size
     */
    public function setScreenSize($screen_size)
    {
        $this->screen_size = $screen_size;
    }


    /**
     * @return mixed
     */
    public function getSubSubCategoryId()
    {
        return $this->subSubCategoryId;
    }

    /**
     * @param mixed $description
     */
    public function setSubSubCategoryId($subSubCategoryId)
    {
        $this->subSubCategoryId = $subSubCategoryId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getManufacture()
    {
        return $this->manufacture;
    }

    /**
     * @param mixed $manufacture
     */
    public function setManufacture($manufacture)
    {
        $this->manufacture = $manufacture;
    }

    /**
     * @return mixed
     */
    public function getModelNumber()
    {
        return $this->model_number;
    }

    /**
     * @param mixed $model_number
     */
    public function setModelNumber($model_number)
    {
        $this->model_number = $model_number;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return mixed
     */
    public function getProductImage()
    {
        return $this->product_image;
    }

    /**
     * @param mixed $product_image
     */
    public function setProductImage($product_image)
    {
        $this->product_image = $product_image;
    }

    /**
     * @return mixed
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * @param mixed $product_name
     */
    public function setProductName($product_name)
    {
        $this->product_name = $product_name;
    }

    public function addProduct($sub_category){
        $product_image=$this->getProductImage();
        $product_name=$this->getProductName();
        $model_number=$this->getModelNumber();
        $price=$this->getPrice();
        $description=$this->getDescription();
        $manufacturer=$this->getManufacture();
        $sub_sub_category_id = $this->getSubSubCategoryId();

        //for tv
        $screen_size = $this->getScreenSize();
        //for BlueTooth speaker
        $battery_backup = $this->getBatteryBackup();
        //for water purifier,washing machine,refrigerator
        $capacity = $this->getCapacity();
        //for air purifier
        $effective_room_area = $this->getEffectiveRoomArea();

        if($sub_category==3){
            //for tv
            $addProductSQL="insert into product(product_image, product_name, model_number, price, description, manufacturer,screen_size,sub_sub_category_id )
                        values('$product_image','$product_name','$model_number','$price','$description','$manufacturer','$screen_size','$sub_sub_category_id')";
            $this->electronics->database->CUD($addProductSQL);
            return true;
        }elseif($sub_category==6){
            //for BlueTooth speaker
            $addProductSQL="insert into product(product_image, product_name, model_number, price, description, manufacturer,battery_backup,sub_sub_category_id )
                        values('$product_image','$product_name','$model_number','$price','$description','$manufacturer',$battery_backup,'$sub_sub_category_id')";
            $this->electronics->database->CUD($addProductSQL);
            return true;
        }elseif($sub_category==5 || $sub_category==4 || $sub_category==7){
            //for water purifier,washing machine,refrigerator
            $addProductSQL="insert into product(product_image, product_name, model_number, price, description, manufacturer,capacity,sub_sub_category_id )
                        values('$product_image','$product_name','$model_number','$price','$description','$manufacturer',$capacity,'$sub_sub_category_id')";
            $this->electronics->database->CUD($addProductSQL);
            return true;
        }elseif($sub_category==8){
            //for air purifier
            $addProductSQL="insert into product(product_image, product_name, model_number, price, description, manufacturer,effective_room_area,sub_sub_category_id )
                        values('$product_image','$product_name','$model_number','$price','$description','$manufacturer',$effective_room_area,'$sub_sub_category_id')";
            $this->electronics->database->CUD($addProductSQL);
            return true;
        }
    }
    public function selectProduct(){
        $selectProductSQL = "select * from product";
        return $this->electronics->database->select($selectProductSQL);
    }

    public function deleteProduct($product_id){
        $deleteProduct = "delete from product where product_id=$product_id";
        $this->electronics->database->CUD($deleteProduct);
        header("location:products.php");
    }

    public function selectProductByID($product_id){
        $selectProductByIDSQL = "select * from product where product_id=$product_id";
        return $this->electronics->database->select($selectProductByIDSQL);
    }
    public function editProduct($product_id){
        $product_name = $this->getProductName();
        $model_number = $this->getModelNumber();
        $price = $this->getPrice();
        $description = $this->getManufacture();
        $manufacturer = $this->getManufacture();
        $editProductSQL = "update Product set product_name='$product_name',
                                              model_number='$model_number',
                                              price='$price',
                                              description='$description',
                                              manufacturer='$manufacturer'
                                              where product_id=$product_id";
        $this->electronics->database->CUD($editProductSQL);
        header("location:products.php");
    }

    public function selectCustomerByID($customerId){
        $selectCustomerByIDSQL = "select * from customer where customerId=$customerId";
        return $this->electronics->database->select($selectCustomerByIDSQL);
    }

    public function addStock($product_id,$stock){
        $addStock = "update product set stock=stock+$stock where product_id=$product_id";
        $this->electronics->database->CUD($addStock);
    }




//    public function addCart(){
//        $addCartSQL="insert into cart(customerId,product_id,quantity) values($_SESSION['id'],$_GET['product'],$_GET['quantity'])";
//        $this->database->CUD($addCategorySQL);
//    }
}