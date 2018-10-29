<?php
session_start();
include "class/product.php";
$product= new product;
include "class/forum.php";
$forum = new forum();
$fetchForum=array(array(
   "question"=>"",
    "post_date"=>""

));
$fetchForum=$product->getElectronics()->getDatabase()->select($forum->getForumById($_GET['id']));
$product->getElectronics()->getDatabase()->CUD($forum->updateForumVisit($_GET['id']));
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Welcome <?php echo $_SESSION['name']; ?> </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                        <a href="edit_profile.php" class="dropdown-item">View Profile</a>
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


<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Hy <?php echo $_SESSION['name']?></h1>
            <h4>Reply: </h4>
            <?php
            if(isset($_POST['answer_btn'])){
                $forum->setCustomerID($_SESSION['id']);
                $forum->setForumId($_GET['id']);
                $forum->setReply($_POST['answer']);

                $product->getElectronics()->getDatabase()->CUD($forum->forumReply());
                $product->getElectronics()->getDatabase()->CUD($forum->updateReplyCount($_GET['id']));
            }
            ?>
            <form method="post">
                <div class="form-group">
                    <textarea class="form-control" name="answer"></textarea>
                    <button type="submit" name="answer_btn" class="btn btn-primary" style="margin-top: 20px;">Answer</button>
                    <a href="forum.php" class="btn btn-danger" style="margin-top: 20px;">Back</a>
                </div>
            </form>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="margin-top: 20px;">Forum Question</h1>
                    <?php
                    echo '<li class="list-group-item list-group-item-action"><strong>'.$fetchForum[0]['question'].
                        '</small><br><small>Posted on: '.$fetchForum[0]['post_date'].'</small></li>'
                    ;
                    ?>

                </div>
            </div>

            <div class="col-lg-12">
                <h2>Answer list</h2>
            </div>
            <div class="list-group" style="margin-bottom: 20px;">

                    <?php
                    $fetchReplierName = array(array(
                        "customer_name"=>""
                    ));

                    if(!$product->getElectronics()->getDatabase()->select($forum->selectReplyById($_GET['id']))){
                        echo '<div class="alert alert-danger">Be first to reply</div>';
                    }else{
                        $fetchForumReply = $product->getElectronics()->getDatabase()->select($forum->selectReplyById($_GET['id']));
                        foreach($fetchForumReply as $fetchForumReplyRow){
                            $fetchReplierName = $product->selectCustomerByID($fetchForumReplyRow['replier_id']);
                            echo '<li class="list-group-item list-group-item-action"><strong>'.$fetchForumReplyRow['reply'].
                                '</strong><br><small>Posted by : '.$fetchReplierName[0]['customer_name'].
                                '</small><br><small>Posted on : '.$fetchForumReplyRow['reply_date'].'</small></li>'
                            ;
                        }
                    }
                    ?>
            </div>

        </div>
    </div>
    <!-- /.col-lg-9 -->

</div>




</body>
</html>