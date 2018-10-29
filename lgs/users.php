<?php
include "includes/admin_header.php";
include "class/customer.php";

$customer= new customer();

?>
    <h2>Users</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">PhoneNumber</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $count=0;
    if(!$customer->selectCustomer()) {
        echo '<div class="alert alert-danger">There is no customer till now</div>';

    }else{
        $fetchCustomers = $customer->selectCustomer();
        foreach($fetchCustomers as $fetchCustomersRow){
            echo'<tr>';
            $count=$count+1;
            echo'<td>'.$count.'</td>';
            echo'<td>'.$fetchCustomersRow["customer_name"].'</td>';
            echo'<td>'.$fetchCustomersRow["address"].'</td>';
            echo'<td>'.$fetchCustomersRow["phoneNumber"].'</td>';
            echo'<td>'.$fetchCustomersRow["email"].'</td>';
            echo'</tr>';
        }
    }




        ?>
        </tbody>
    </table>




<?php
include "includes/admin_footer.php";
?>