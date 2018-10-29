<?php
session_start();
include "class/customer.php";
$customer= new customer;
$customers=array(array(
    "customer_name"=>"",
    "address"=>"",
    "phoneNumber"=>"",


));
$customers=$customer->selectCustomerByID($_SESSION['id']);
if(isset($_POST['edit_customer_btn'])){
    $customer->setName($_POST['name']);
    $customer->setAddress($_POST['address']);
    $customer->setPhoneNumber($_POST['phoneNumber']);


    $customer->editCustomer($_SESSION['id']);

}


?>
<html>

</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />
</head>
    <body>
    <form method="post" class="col-md-4">
        <h1>Edit Profile<span class="badge badge-secondary"></span></h1>
        <label>Name</label>
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?php echo $customers[0]['customer_name'] ?>"><br>
        <label>Address</label>
        <input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $customers[0]['address'] ?>"><br>
        <label>Phone Number</label>
        <input class="form-control" type="text" name="phoneNumber" placeholder="Phone Number" value="<?php echo $customers[0]['phoneNumber'] ?>"><br>


        <button type="submit" name="edit_customer_btn" class="btn btn-info">Edit Profile</button>
        <a href="welcome.php" class="btn btn-success">Back</a>

    </form>
</body>
    </html>