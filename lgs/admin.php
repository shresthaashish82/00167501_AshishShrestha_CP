<?php
include "includes/admin_header.php";
include "class/database.php";
$database = new database();
?>
            <h1>Dashboard</h1>


    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                $sql = "select sum(visit_count) as count from customer";
                echo "<h3>Total Visitors: ".$database->fetchVisit($sql)."</h3>";
                ?>
            </div>
            <div class="col">
                <?php
                $sql = "select count(customerId) as count from customer";
                echo "<h3>Total Users: ".$database->fetchVisit($sql)."</h3>";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                $sql = "select count(product_id) as count from product";
                echo "<h3>Total Added Product: ".$database->fetchVisit($sql)."</h3>";
                ?>
            </div>
            <div class="col">
                <?php
                $sql = "select count(order_id) as count from orders";
                echo "<h3>Total Order: ".$database->fetchVisit($sql)."</h3>";
                ?>
            </div>

        </div>
    </div>













<?php
include "includes/admin_footer.php";
?>