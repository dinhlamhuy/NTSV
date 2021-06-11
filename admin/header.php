<?php session_start();
ob_start();

include '../connect.php';
$currentadmin = $_SESSION['current_admin'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link
      href="http://fonts.googleapis.com/css?family=Open+Sans"
      rel="stylesheet"
      type="text/css"
    />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css"> -->
   
    
  </head>
  <body>
  <div id="wrapper">
  <nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./index.php"><?= $currentadmin['name_admin'] ?></a>
    </div>
    <div style="
            color: white;
            padding: 15px 50px 5px 50px;
            float: right;
            font-size: 16px;">
          

      <a href="./logoutadmin.php" class="btn btn-danger square-btn-adjust"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
    </div>
  </nav>
  <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">
        <li class="text-center">
          <img src="assets/img/find_user.png" class="user-image img-responsive" />
        </li>

        <li>
          <a  href="./index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
        </li>
        <li>
          <a  href="./index.php"><i class="fa fa-users fa-3x"></i> Danh sách admin</a>
        </li>
        <li>
          <a href="./addadmin.php"><i class="fa fa-user fa-3x"></i> Thêm thành viên</a>
        </li>

        <li>
          <a href="./qluser.php"><i class="fa fa-table fa-3x"></i> Quản lý user</a>
        </li>
        <li>
          <a href="./qlbaidang.php"><i class="fa fa-edit fa-3x"></i> Quản lý bài đăng </a>
        </li>
        <li>
          <a href="./editadmin.php"><i class="fa fa-key fa-3x"></i> Đổi Mật Khẩu</a>
        </li>
        
        <!-- <li>
          <a href="blank.html"><i class="fa fa-list-alt fa-3x"></i> Quản lý User</a>
        </li> -->

      </ul>
    </div>
  </nav>