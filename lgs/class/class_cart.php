<?php
// include "electronics.php";
include "database.php";

class Cart
{
    private $database;

    public function __construct(){
        $this->database = new database();
    }
    /**
     * @return electronics
     */
    public function getElectronics()
    {
        return $this->electronics;
    }



    private $cart_id;
    private $customer_id;
    private $product_id;
    private $quantity;
    


    public function getCartId()
    {
        return $this->cart_id;
    }

    public function setCartId($cart_id)
    {
        $this->cart_id = $cart_id;
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

    
    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }



    public function addCart(){
        
        $customer_id = $this->getCustomerId();
        $product_id = $this->getProductId();
        $quantity = $this->getQuantity();

        $checkStock = "select * from product where product_id=$product_id";
        if ($data=$this->database->select($checkStock)) {
            foreach ($data as $row) {
                if($quantity > $row["stock"] || $row["stock"]==0){
                    return false;
                }else{
                    $addCartSQL="insert into cart(customerId, product_id, quantity) values('$customer_id','$product_id','$quantity')";
                    $this->database->CUD($addCartSQL);
                    return true;
                }
            }
        }

    }


    public function selectMyCart(){
        $selectProductSQL = "select * from cart where customerId='$this->customer_id'";
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

    public function selectProductInCartId(){
        $selectCustomerByIDSQL = "select * from product p,cart c where p.product_id=c.product_id and p.product_id = '$this->product_id'";
        return $this->database->select($selectCustomerByIDSQL);
    }



//    public function addCart(){
//        $addCartSQL="insert into cart(customerId,product_id,quantity) values($_SESSION['id'],$_GET['product'],$_GET['quantity'])";
//        $this->database->CUD($addCategorySQL);
//    }
}