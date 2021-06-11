<?php include './headeradmin.php'; ?>
<title>Thêm admin mới</title>
<style>
  .box-content {
    margin: 0 auto;
    width: 100%;
    border: 0px solid #ccc;
    text-align: center;
    padding: 20px;
  }

  #edit_user form {
    width: 100%;
    margin: 40px aut o;
  }

  #edit_user form input {
    margin: 5px 0;
  }

  input[type=password],
  input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-radius: 6px;
    border: 2px solid wheat;



  }

  label {


    font-weight: bold;
    font-size: 20px;
    padding: 10px;

  }

  .showpwd {
    float: center;
    padding: 10px;
  }
</style>

<div class="container-fluid">

  <div class="row">

   

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-1">



      <!-- Advanced Tables -->
      <div class="card ">
        <div class="card-header">
          Thêm thành viên admin
        </div>
        <div class="card-body">

          <?php
          $erroradmin = false;
          if (isset($_GET['action']) && $_GET['action'] == 'addad') {

            $tenadmin = $_POST['name_admin'];
            $mk = md5($_POST['pwd_admin']);
            $checkmk = md5($_POST['repwd_admin']);


            if (
              isset($_POST['name_admin']) && !empty($_POST['name_admin']) && isset($_POST['pwd_admin'])
              && !empty($_POST['pwd_admin']) && isset($_POST['repwd_admin']) && !empty($_POST['repwd_admin'])
            ) {

              $chekk = mysqli_query($conn, "SELECT * FROM `admin` WHERE `name_admin` = '$tenadmin'");

              if (mysqli_num_rows($chekk) <= 0 && $currentadmin['id_admin']==1) {
                $resultadadmin = mysqli_query($conn, "INSERT INTO `admin`(`name_admin`, `pass_admin`, `createad_time`) VALUES ('$tenadmin', '$mk', '" . date('Y-m-d H:i:s') . "')");
                if (!$resultaddmin) {
                  $erroradmin = "Không thể thêm";
                }
              } else if ($currentadmin['id_admin']!=1){
                $erroradmin = "Bạn không có quyền thêm admin, Chỉ <b style='color:red; font-size:20px;'>adminchinh</b> mới được thêm";
              }  else {
                $erroradmin = "Tài khoản đã tồn tại";
              }
              mysqli_close($conn);
              if ($erroradmin !== false) { 
                
                ?>
                <div id="error-notify" class="box-content">
                  <h1>Thông báo</h1>
                  <h4><?= $erroradmin ?></h4>
                  <a href="./addadmin.php">Quay lại</a>
                </div>
              <?php } else { 
                
                ?>
                <div id="edit-notify" class="box-content">
                  <h1><?= ($erroradmin !== false) ? $erroradmin : "đã thêm thành công" ?></h1>
                  <a href="./addadmin.php">Quay lại thêm admin </a>
                  <a href="./index.php">Xem danh sách admin </a>
                </div>
              <?php } ?>
            <?php } else { 
              
              ?>
              <div id="edit-notify" class="box-content">
                <h1>Vui lòng nhập đủ thông tin </h1>
                <a href="./addadmin.php">Quay lại để thêm tài khoản</a>
              </div>
            <?php   }
          } else {
            $user = $_SESSION['current_admin'];
            if (!empty($user)) {


            ?>
              <!-- /. NAV SIDE  -->
              <form action="./addadmin.php?action=addad" method="post" enctype="multipart/form-data" onsubmit="return check()">
                <div class=col-md-8>
                  <div class="form-group">
                    <label for="name_admin">username admin</label>
                    <input type="text" name="name_admin" class="form-control" id="" value="" require>

                  </div>
                </div>
                <div class=col-md-8>
                  <div class="form-group">
                    <label for="pwd_admin">Password admin</label>
                    <input type="password" name="pwd_admin" id="pwd" class="form-control" id="" value="" require>

                  </div>
                </div>
                <div class=col-md-8>
                  <div class="form-group">
                    <label for="repwd_admin">Nhap lai Password</label>
                    <input type="password" name="repwd_admin" id="repwd" class="form-control" id="" value="" require>

                  </div>
                </div>
                <div class=col-md-12>
                  <div class="form-group">
                    <div class="showpwd"><input type="checkbox" onclick="myFunction()"><span> Show Password</span><br><br>

                      <input type="submit" class="btn btn-primary" value="Xác nhận">

                    </div>
                  </div>

              </form>
        </div>
    <?php }
          } ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function check() {
    var x = document.getElementById("pwd").value;
    var y = document.getElementById("repwd").value;
    if (x != y){
      confirm("mật khẩu không trùng khớp");
      return false;
    } else{
      return true;
    }
  }
  function myFunction() {
    var x = document.getElementById("pwd");
    var y = document.getElementById("repwd");
    if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";

    } else {
      x.type = "password";
      y.type = "password";

    }
  }

 
</script>


<?php include 'footeradmin.php'; ?>