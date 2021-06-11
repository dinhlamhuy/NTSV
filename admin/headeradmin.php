<?php session_start();
ob_start();

include '../connect.php';
$currentadmin = $_SESSION['current_admin'];
function rutngannd($str, $maxChars, $holder)
{
  if (strlen($str) > $maxChars) {
    return trim(substr($str, 0, $maxChars)) . $holder;
  } else {
    return $str;
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">


  <link rel="shortcut icon" href="../assets/img/logoweb.png" type="image/png">

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/DataTables/datatables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
  <style>
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

    body {
      font-family: 'Poppins', sans-serif;
      background: #fafafa;
    }

    .pp {
      font-family: 'Poppins', sans-serif;
      font-size: 1.1em;
      font-weight: 300;
      line-height: 1.7em;
      color: #999;
    }

    .canhgiua {
      vertical-align: middle !important;
    }

    a,
    a:hover,
    a:focus {
      color: inherit;
      text-decoration: none;
      transition: all 0.5s;
    }

    .navbar {
      padding: 0px 10px;
      background: #fff;
      border: none;
      border-radius: 0;
      margin-bottom: 15px;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
      box-shadow: none;
      outline: none !important;
      border: none;
    }

    .line {
      width: 100%;
      height: 1px;
      border-bottom: 1px dashed #ddd;
      margin: 40px 0;
    }

    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

    #sidebar {
      width: 250px;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      z-index: 999;
      background: #999;
      color: #fff !important;
      transition: all 0.5s;
    }

    #sidebar.active {
      margin-left: -250px;
    }

    #sidebar .sidebar-header {
      padding: 20px;
      background: grey;
    }

    #sidebar ul.components {
      padding: 20px 0;

    }

    #sidebar ul p {
      color: #fff;
      padding: 10px;
    }

    #sidebar ul li a {
      padding: 15px;
      font-size: 1.1em;
      display: block;
      color: white;
    }

    #sidebar ul li a:hover {
      color: #7386D5;
      background: #fff;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
      color: #fff;
      background: #6d7fcc;
    }

    a[data-toggle="collapse"] {
      position: relative;
    }

    a[aria-expanded="false"]::before,
    a[aria-expanded="true"]::before {
      content: '\e250';
      display: block;
      position: absolute;
      right: 20px;
      font-family: 'Glyphicons Halflings';
      font-size: 0.6em;
    }

    a[aria-expanded="true"]::before {
      content: '\e250';
    }

    ul ul a {
      font-size: 0.9em !important;
      padding-left: 30px !important;
      background: #6d7fcc;
    }

    ul.CTAs {
      padding: 20px;
    }

    ul.CTAs a {
      text-align: center;
      font-size: 0.9em !important;
      display: block;
      border-radius: 5px;
      margin-bottom: 5px;
    }

    a.download {
      background: #fff;
      color: #7386D5;
    }

    a.article,
    a.article:hover {
      background: #bec4e0 !important;
      color: #fff !important;
    }

    #content {
      width: calc(100% - 250px);
      padding: 0px;
      min-height: 500vh;
      transition: all 0.5s;
      position: absolute;
      top: 0;
      right: 0;
    }

    .bg {
      width: calc(100% - 250px);
      padding: 0px;
      min-height: 100vh;
      transition: all 0.5s;
      position: absolute;

      right: 0;
    }

    .bg.active {
      width: 100%;
    }

    #content.active {
      width: 100%;
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left: -250px;
      }

      #sidebar.active {
        margin-left: 0;
      }

      #content {
        width: 100%;
      }

      #content.active {
        width: calc(100% - 250px);
      }

      #sidebarCollapse span {
        display: none;
      }
    }
  </style>
</head>

<body>



  <div class="wrapper">
    <nav id="sidebar" style="height: fit-content; border-radius:0 24px 24px 0px;">
      <div class="sidebar-header" style="padding: 7px;  text-align: center;">
        <h3><b>nhatrosvha.com</b> </h3>
      </div>

      <ul class="list-unstyled components">
        <center>
          <img src="./assets/img/avatar.png" class="img-responsive" style="border-radius:50%; max-width: 60%; max-height: 60%;" alt="Image">
          <p class="pp" style="padding-top: 22px ; padding-bottom:0;"><?= $currentadmin['name_admin'] ?></p>
          <hr>
        </center>

        <li>
          <a href="./index.php"><i class="fa fa-user-md" aria-hidden="true"></i> Quản lý admin</a>

        </li>

        <li>
          <a href="./qluser.php"><i class="fa fa-users" aria-hidden="true"></i></span> Quản lý User</a>
        </li>
        <li>
          <a href="./qlbaidang.php"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý bài đăng</a>
        </li>
        <!-- <li>
          <a href="./editadmin.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Đổi mật khẩu</a>
        </li>
        <li>
          <a href="./addadmin.php"><i class="fa fa-user-plus" aria-hidden="true"></i>
            Thêm admin</a>
        </li> -->
        <li>
          <a href="./phanhoi.php"><i class="fa fa-bell-o" aria-hidden="true"></i> Nhận ý kiến</a>
        </li>
        <li>
          <a href="./capnhattintuc.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Quản lý tin tức</a>
        </li>
        <li>
          <a href="./dssvngoaitru.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i> DSSV ngoại trú</a>
        </li>



      </ul>


    </nav>


    <div id="content">

      <nav class="navbar sticky-top navbar-light bg-light ">
        <div class="container-fluid">

          <div class="navbar-header">
            <button style="float:left; padding: 14px 20px;" type="button" id="sidebarCollapse" class="btn  navbar-btn btn-lg">
              <i class="fa fa-bars" aria-hidden="true"></i>

            </button>

          </div>


          <ul class="nav navbar-nav navbar-right mr-0 ml-auto">
            <li><a href="./logoutadmin.php"><b> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</b></a></li>
          </ul>

        </div>

      </nav>