<?php
 session_start();
 ob_start();
include './connect.php';
if (isset($_SESSION['current_user'])) {
  $user = $_SESSION['current_user'];
}
// mysqli_set_charset($con, 'UTF8');
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
<html lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="./admin/assets/img/logoweb.png" type="image/png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet"  href="./vendor/bootstrap/css/bootstrap.min.css">
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="./admin/assets/DataTables/datatables.min.css">
  <style>
    .logo {
      padding: 0;
      padding-right: 20px;
      padding-left: 5px;
    }

    .box-content {
      margin: 0 auto;
      width: 800px;
      border: 1px solid #ccc;
      text-align: center;
      padding: 20px;
    }

    #user_register form {
      width: 200px;
      margin: 40px auto;
    }

    #user_register form input {
      margin: 5px 0;
    }
    a{
      text-decoration: none !important;
    }
    .canhgiua{
      vertical-align: middle !important;
    }
    .khungbaidang:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
  </style>
</head>

<body>


  <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light ">
    <div class="container-fluid">

      <a class="nav navbar-brand logo" href="./index.php"> <img src="./admin/assets/img/logoweb.png" height="50px" width="50px" alt="nhà trọ hòa an"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item active"><a class="nav-link" href="./index.php"><i class="fa fa-fw fa-home"></i> Trang chủ <span class="sr-only">(current)</span></a></li>
          <li class="nav-item"><a class="nav-link" href="./timkiem.php?loc=Tìm+Kiếm&chuyenmuc=1">Cho thuê phòng trọ</a></li>
          <li class="nav-item"><a class="nav-link" href="./timkiem.php?loc=Tìm+Kiếm&chuyenmuc=2">Tìm người ở ghép</a></li>
          <li class="nav-item"><a class="nav-link" href="./gopy.php">Liên hệ - Góp ý</a></li>
          <li class="nav-item"><a class="nav-link" href="./tintuc.php">Blog</a></li>

          
        </ul>

        <ul class="navbar-nav ml-auto mr-0">

          <?php if (!isset($user) && empty($user)) { ?>
            <li class="nav-item"><a class="nav-link" href="./login.php" data-toggle="tooltip" data-placement="top" title="Đăng bài mới"><span class="glyphicon glyphicon-pencil"></span> Đăng bài mới</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="./login.php"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li> -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> My Account <img src="./assets/img/avatar.png" class="rounded-circle" height="20px" width="20px" alt=""> </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./login.php" data-toggle="tooltip" data-placement="top" title="Đăng nhập"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a>
                
                <a class="dropdown-item" href="./dk.php" data-toggle="tooltip" data-placement="top" title="Đăng ký"><span class="glyphicon glyphicon-edit"></span> Đăng ký</a>
              </div>
            </li>
          <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="./themsp.php" data-toggle="tooltip" data-placement="top" title="Đăng bài mới"><span class="glyphicon glyphicon-edit"></span> Đăng bài mới</a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="./trangcanhan.php"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li> -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
             <?= $user['fullname'] ?> <img src="./assets/img/user/<?= $user['avatar'] ?>" class="rounded-circle" height="22px" width="22px" alt=""> 
             </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="./trangcanhan.php" data-toggle="tooltip" data-placement="top" title="Xem thông tin cá nhân"><span class="glyphicon glyphicon-user"></span> Thông tin cá nhân</a>
                
                <a class="dropdown-item" href="./chitietsavepost.php" data-toggle="tooltip" data-placement="top" title="Danh sách cái bài đăng bạn yêu thích"><span class="glyphicon glyphicon-heart-empty"></span> Bài đăng đã lưu</a>
                <?php 
                $thongbao=mysqli_query($conn, "SELECT * FROM `messages` WHERE `id_to` = '". $user['id_user'] ."' AND `trangthai`<> 'Đã xem' ");
                $slthongbao=mysqli_num_rows($thongbao);
                if($slthongbao>0){?>
                  
                  <a class="dropdown-item" href="./chat.php" data-toggle="tooltip" data-placement="top" title="Trò chuyện trao đổi"><span class="glyphicon glyphicon-heart-empty"></span> Chat <span class="badge badge-danger badge-pill"><?= $slthongbao ?></span></a>
               <?php  } else{
                ?> 
                <a class="dropdown-item" href="./chat.php" data-toggle="tooltip" data-placement="top" title="Trò chuyện trao đổi">Chat</a>
                <?php } ?>
               
                <a role="separator" class="divider"></a>
               
               
                <a class="dropdown-item" href="./logout.php" data-toggle="tooltip" data-placement="top" title="Đăng xuất"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

 