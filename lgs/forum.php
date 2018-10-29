<?php
session_start();
include "class/product.php";
$product= new product;
include "class/forum.php";
$forum = new forum();
$fetchCustomerName = array(array(
   "customer_name"=>""
));
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <title>Shrestha Electronic And Supplier</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />

</head>

<body>
<style>
    .dropdown:hover>.dropdown-menu{
        display: block;
    }
</style>

<!--Navigation-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand text-warning font-weight-bold"> Shrestha Electronics and supplier</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="welcome.php" class="nav-link text-white">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">FORUM</a>
                </li>
                <li class="nav-item">
                    <a href="userhelp.php" class="nav-link text-white">USER HELP</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome <?php echo $_SESSION['name']; ?> </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                        <a href="edit_profile.php" class="dropdown-item">View Profile</a>
                        <a href="mycart.php" class="dropdown-item">My Cart</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
</nav>
<!--Background image-->


<!--Second Navbar-->
<nav class="navbar navbar-expand-md bg-info navbar-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
            <ul class="navbar-nav ml-auto">


                <?php
                $count=0;
                $fetchCategory = $product->electronics->selectCategory();
                foreach($fetchCategory as $fetchCategoryRow){
                    $count=$count+1;
                    echo '<li class="nav-item dropdown">';
                    echo '<a class="nav-link dropdown-toggle" href="#" id="category'.$count.'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    echo $fetchCategoryRow["category_name"];
                    echo '</a>';
                    echo '<div class="dropdown-menu" id="category'.$count.'" aria-labelledby="navbarDropdown">';
                    echo '<a class="dropdown-item" href="happy.php">Action</a>';
                    echo '<div class="dropdown-item">Happy</div>';
                    echo '<a class="dropdown-item" href="#">Something else here</a>';
                    echo '</div>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
</nav>

<?php
if(isset($_POST['post'])){
    $forum->setQuestion($_POST['question']);
    $forum->setCustomerID($_SESSION['id']);
    $product->getElectronics()->getDatabase()->CUD($forum->postQuestion());
}

?>
<div class="container">
    <h1>Forum</h1>

    <div class="row">
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                Ask
            </button>
        </div>
    </div>


    <!---ask Question--->
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="margin-top: 20px;">Questions</h1>
            </div>
        </div>
        <div class="list-group" style="margin-bottom: 20px;">
            <?php
            $fetchForum = $product->getElectronics()->getDatabase()->select($forum->selectForum());
            foreach($fetchForum as $fetchForumRow){
                $fetchCustomerName = $product->selectCustomerByID($fetchForumRow['customerId']);
                echo '<a href="forum_answer.php?id='.$fetchForumRow['id'].'" class="list-group-item list-group-item-action"><strong>'.$fetchForumRow['question'].
                    '</strong><br><small>Posted by : '.$fetchCustomerName[0]["customer_name"].
                    '</small><br><small>Posted on : '.$fetchForumRow['post_date'].
                    '</small><br><small>Visited : '.$fetchForumRow['visited'].
                    '</small><br><small>Replied: '.$fetchForumRow['reply'].'</small></a>'
                ;
            }
            ?>

        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ask question</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Your Question:</label>
                            <input type="text" class="form-control" name="question" placeholder="Your Question" required="required">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="post" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
</body>
</html>