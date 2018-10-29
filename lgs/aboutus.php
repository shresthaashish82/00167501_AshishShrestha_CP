<!--Session -->

<?php
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id=="admin"){
        header("location:admin.php");
    }else{
        header("location:welcome.php");
    }
}
?>

<!---Header of About us-->

<html>
<head>
    <meta charset="utf-8">
    <title>Shrestha Electronic And Supplier</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.4/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />
    <style>
        /*---contact us Css--*/
        .contact-form{
            background:rgb(0,0,0, .6);
            color: #d5d5d5;
            margin-top: 100px;
            padding: 20px;
            box-shadow: 0px 0px 10px 3px grey;
        }

        #map{
            height: 350px;
            width: 1350px;
            border:solid 1px red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<!--navigation-->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <div class="container">
        <a href="" class="navbar-brand text-warning font-weight-bold"> Shrestha Electronics and supplier</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="collapsenavbar">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white active">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a href="contactus.php" class="nav-link text-white">CONTACT US</a>
                </li>
                <li class="nav-item">
                    <a href="help.php" class="nav-link text-white">HELP & GUIDE</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--ABout Us Detail-->

<div class="container">
<h1>Abouts us</h1>
<p>Shrestha Electronic is Nepal's first state-of-art model and electronics online sales portal.Shrestha Electronic got its birth with the purpose of providing certified electronics brands' products under one roof.</p>

<p>Shrestha Electronic is one of the leading names in the field of consumer electronics, information technology, home appliances and entertainment in Nepal and is amongst the first transnational corporations with a well spread out network of 10 retail stores, more coming up shortly and service centers across Nepal.Shrestha Electronic with established systems and procedures which are constantly tested and improved upon to best serve customer needs.</p>
<label>VISION</label>
    <p>To be the number one in retail field in consumer electronics and to become a globally recognized company through innovation, passion through quality, freedom through empowerment, and cost through volumes. We should imbibe a world class system to bring in delight to all our associates and the society at large.</p>
    <label>MISSION</label>
    <p>To create unique customer satisfaction through innovation, quality, productivity, human resource development, freedom through empowerment, continuously striving for excellence with pride in our values and confidence in our approach.</p>
    <label>TARGET CONSUMERS.</label>
    <p>Working class who are time conscious and prefer branded products all under one roof Quality conscious buyers</p>




</div>

    <!--Footer-->
<footer class="me">
    <div class="container-fluid padding">
        <div class="row text-center">
            <div class="col-md-4">
                <hr class="light">
                <h5>Shrestha Electronic Details</h5>
                <hr class="light">
                <p>041-20467</p>
                <p>shresthaelectronic22@gmail.com</p>
                <p>Dillibazar</p>
                <p>kathmandu, Nepal</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>Our Hours</h5>
                <hr class="light">
                <p>sunday:9am - 5 pm</p>
                <p>Friday:9am - 5 pm</p>
                <p>Saturday :3pm - 5 pm</p>
            </div>
            <div class="col-md-4">
                <hr class="light">
                <h5>My Account </h5>
                <hr class="light">
                <a href="login.php">Login</a><br>
                <a href="sign_up.php">Register</a>
            </div>
            <div class="col-12">
                <hr class="light">
                <h5>@2018 shresthaelectronic</h5>
            </div>

        </div>
    </div>
</footer>
</body>
</html>