<?php
session_start();
if(isset($_SESSION['id'])){
    $id=$_SESSION['id'];
    if($id!="admin"){
        header('location:welcome.php');
    }
}else{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome Admin</title>
    <link rel="shortcut icon" href="image/logo.jpg" type="image/x-icon" />

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="admin.php">
                    Shrestha Electronic
                </a>
            </li>
            <li>
                <a href="admin.php">DashBoard</a>
            </li>
            <li>
                <a href="users.php">Users</a>
            </li>
            <li>
                <a href="category.php">Category</a>
            </li>
            <li>
                <a href="subcategory.php">Sub-Category</a>
            </li>
            <li>
                <a href="subsubcategory.php">Sub-Sub-Category</a>
            </li>
            <li>
                <a href="products.php">Products</a>
            </li>
            <li>
                <a href="orderlist.php">Order List</a>
            </li>
            <li>
                <a href="adminhelp.php">Admin Help Guide</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Menu</a>
            <a href="logout.php" class="btn btn-secondary float-right" id="menu-toggle">Logout</a>

