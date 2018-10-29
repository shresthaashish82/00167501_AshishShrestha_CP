<?php
// include "electronics.php";
include "database.php";

class Order
{
    private $database;

    public function __construct(){
        $this->database = new database();
    }
    


    private $order_id;
    private $customer_id;
    private $product_id;
    


    public function getOrderId()
    {
        return $this->order_id;
    }

    public function setOrderId($order_id)
    {
        $this->order_id = order_id;
    }
    
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }


    public function getProductId()
    {
        return $this->product_id;
    }

    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    
    
    public function addOrder(){

        $addCartSQL="insert into orders(customer_id, product_id) values ($this->customer_id,$this->product_id)";
        $this->database->CUD($addCartSQL);
        
        return true;      
    }


    public function selectMyOrder(){
        $selectProductSQL = "select * from orders where customerId='$this->customer_id'";
        return $this->database->select($selectProductSQL);
    }

    public function selectOrder(){
        $selectProductSQL = "select * from orders";
        return $this->database->select($selectProductSQL);
    }

    public function selectOrderAndQuantity(){
        $selectProductSQL = "select * from orders o,cart c where o.order_id=c.cart_id";
        return $this->database->select($selectProductSQL);
    }

    public function updateProduct(){
        $selectProductSQL = "update product set available  = 1  where product_id = '$this->product_id'";
        $this->database->CUD($selectProductSQL);
        return true;
         }



    public function selectProduct(){
        $selectProductSQL = "select * from product where product_id = '$this->product_id'";
        return $this->database->select($selectProductSQL);
    }

        public function selectCustomer(){
        $selectProductSQL = "select * from customer where customerId = '$this->customer_id'";
        return $this->database->select($selectProductSQL);
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

    public function selectProductByCartId(){
        $selectCustomerByIDSQL = "select * from product where product_id = '$this->product_id'";
        return $this->database->select($selectCustomerByIDSQL);
    }




//    public function addCart(){
//        $addCartSQL="insert into cart(customerId,product_id,quantity) values($_SESSION['id'],$_GET['product'],$_GET['quantity'])";
//        $this->database->CUD($addCategorySQL);
//    }
}