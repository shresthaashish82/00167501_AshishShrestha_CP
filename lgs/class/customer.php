<?php
include "database.php";

class customer{
    private $database;

    public function __construct(){
        $this->database = new database();
    }
    private $customerId;
    private $name;
    private $address;
    private $phoneNumber;
    private $email;
    private $password;
    private $confirmPassword;
    private $newPassword;

    /**
     * @return database
     */
    public function getDatabase()
    {
        return $this->database;
    }



    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }


    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getConfirmPassword()
    {
        return $this->confirmPassword;
    }

    /**
     * @param mixed $confirmPassword
     */
    public function setConfirmPassword($confirmPassword)
    {
        $this->confirmPassword = $confirmPassword;
    }



public function register(){
    $name=$this->getName();
    $address=$this->getAddress();
    $phoneNumber=$this->getPhoneNumber();
    $email=$this->getEmail();
    $password=$this->getPassword();
    $confirmPassword=$this->getConfirmPassword();

    if($name=="" or $address=="" or $phoneNumber=="" or $email=="" or $password=="" or $confirmPassword==""){
        echo'<div class="alert alert-danger" role="alert">';
        echo 'Please fill up the textbox';
        echo '</div>';
    } else{
        if($confirmPassword==$password) {
            $checkEmail = "Select email from customer WHERE email='$email'";
            if ($this->database->checkRows($checkEmail) > 0) {
                echo '<div class="alert alert-danger" role="alert">';
                echo 'email matched please try new email';
                echo '</div>';
            } else {
                $register = "INSERT INTO customer(customer_name, address, phoneNumber, email, password) VALUES ('$name','$address','$phoneNumber','$email','$password')";
                $this->database->CUD($register);
                echo '<div class="alert alert-primary" role="alert">';
                echo 'Registered';
                echo '</div>';

            }
        }
        else{
            echo'<div class="alert alert-danger" role="alert">';
            echo 'password does not match';
            echo '</div>';

        }
    }


}
    public function login()
    {
        if(isset($_COOKIE['login_fail'])){
            echo "Sorry! Try again after 2 mins";
            return;
        }
        $email = $this->getEmail();
        $password = $this->getPassword();

        if ($email == "" or $password == "") {
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Please fill up box';
            echo '</div>';
        } else {
            //admin login
            if($email=="admin@gmail.com" and $password=="admin"){

                session_start();
                $_SESSION['id']="admin";
                header("location:admin.php");
            }
            else{
                //customer login
                $checkEmail = "select * from customer WHERE email='$email'";
                if ($data = $this->database->select($checkEmail)) {
                    foreach ($data as $row) {
                        $fetchPassword = $row['password'];
                        $customerId=$row['customerId'];
                        $login_attempt=$row['login_attempt'];
                        if ($password == $fetchPassword) {
                            session_start();
                            $_SESSION['id']=$customerId;
                            $_SESSION['userId'] = $row['customerId'];
                            $_SESSION['name']=$row['customer_name'];
                            $update_login_attempt = "update customer set login_attempt=0 where customerId=$customerId";
                            $this->database->CUD($update_login_attempt);
                            $updateVisitCount="update customer set visit_count=visit_count+1 where customerId=$customerId";
                            $this->database->CUD($updateVisitCount);
                            header("location:welcome.php");


                        } else {
                            $update_login_attempt = "update customer set login_attempt=login_attempt+1 where customerId=$customerId";
                            $this->database->CUD($update_login_attempt);

                            if($login_attempt==2){
                                setcookie('login_fail',$login_attempt,time()+120);
                                $update_login_attempt = "update customer set login_attempt=0 where customerId=$customerId";
                                $this->database->CUD($update_login_attempt);
                                echo 'Sorry! Try again after 2 mins';
                            }else{
                                echo '<div class="alert alert-danger" role="alert">';
                                echo 'Password does not match';
                                echo '</div>';
                            }


                        }
                    }


                }else{
                    echo '<div class="alert alert-danger" role="alert">';
                    echo 'Email does not exist';
                    echo '</div>';


                }

            }




        }


    }

    public function selectCustomer(){
    $selectCustomer="select * from customer";
        return $this->database->select($selectCustomer);
    }

    public function selectCustomerByID($customerId){
        $selectCustomerByIDSQL = "select * from customer where customerId=$customerId";
        return $this->database->select($selectCustomerByIDSQL);
    }

    public function editCustomer($customerId){
        $name=$this->getName();
        $address=$this->getAddress();
        $phoneNumber=$this->getPhoneNumber();


        $editCustomerSQL = "update customer set customer_name='$name',
                                              address='$address',
                                              phoneNumber='$phoneNumber'
                              where customerId=$customerId";

        $this->database->CUD($editCustomerSQL);

        echo '<div class="alert alert-danger" role="alert">';
        echo "Edited profile successfuly";
        echo '</div>';
    }

    public function changePassword($customerId){
        $password = $this->getPassword();
        $newPassword = $this->getNewPassword();
        $confirmPassword = $this->getConfirmPassword();
        $checkPassword = "select * from customer where customerId=$customerId ";
        if ($data=$this->database->select($checkPassword)){
            foreach ($data as $row){
                $fetchPassword = $row["password"];
                if ($fetchPassword==$password){
                    if ($newPassword==$confirmPassword){
                        $changePassword ="update customer set password='$newPassword' where customerId=$customerId";
                        $this->database->update($changePassword);
                        echo '<div class="alert alert-danger" role="alert">';
                       echo "Password is Changed";
                        echo '</div>';
                        echo '<script>alert("password matched")</script>';
                    }else{
                        echo '<script>alert("Please Confirm Password Again")</script>';
                    }
                }else{
                    echo '<script>alert("Password Does Not Match")</script>';
                }
            }
        }
    }

    public function countTotalVisit(){
        $countVisit="";

    }

}


