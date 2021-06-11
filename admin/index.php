<?php include 'headeradmin.php';

if (!isset($_SESSION['current_admin'])) {
  header("location:loginadmin.php");
}
?>

<?php

if (isset($_GET['action']) && $_GET['action'] == 'xoaad') {
  if ($_GET['id'] != $currentadmin['id_admin'] && $currentadmin['id_admin'] == '1') {

    $id2 = $_GET['id'];

    $removead = "DELETE FROM `admin` WHERE `id_admin` ='$id2'  AND `id_admin` <> '1'  ";



    if (mysqli_query($conn, $removead) && $id2 != '1') {
      echo '<script > alert("Đã xóa thành công"); window.location.href = "./index.php";</script>';
    } else {
      echo '<script> alert("Bạn không thể xóa admin này"); window.history.go(-1);</script>';
    }
  } else if ($_GET['id'] == $currentadmin['id_admin']) {

    echo '<script >alert("Bạn không thể xóa chính bạn"); window.history.go(-1); </script>';
  } else if ($currentadmin['id_admin'] != '1') {
    echo '<script > alert("Chỉ Adminchinh mới có quyền xóa!"); window.history.go(-1);</script>';
  }
}


$sql = "SELECT * FROM `admin`";
$inadmin = mysqli_query($conn, $sql);

?>


<title>Trang admin</title>

<!-- /. ROW  -->
<div class="container-fluid">
  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row w-100">
            <div class="col-md-6 ml-0 mr-auto ">
              <h4><b><i>Danh sách admin</i></b></h4>
            </div>
            <div class="col-md-6 mr-0 ml-auto text-right ">
            <?php if ($currentadmin['id_admin'] == '1') { ?>
            <button type="button" class="btn " data-toggle="modal" data-target="#themadmin">
                <i class="fa fa-plus-circle fa-2x" style="color:blue;" aria-hidden="true"></i> <span style="font-size: 18px;">Thêm admin mới</span>
              </button>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="text-right ml-auto mr-0 mb-2">
            <?php if ($currentadmin['id_admin'] == '1') { ?>
              
              <div class="modal fade mt-lg-5" id="themadmin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="themadminLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="themadminLabel">Thêm admin mới</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-1">


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

                                if (mysqli_num_rows($chekk) <= 0 && $currentadmin['id_admin'] == 1) {
                                  $resultadadmin = mysqli_query($conn, "INSERT INTO `admin`(`name_admin`, `pass_admin`, `createad_time`) VALUES ('$tenadmin', '$mk', '" . date('Y-m-d H:i:s') . "')");
                                  if (!$resultadadmin) {
                                    $erroradmin = "Không thể thêm";
                                  }
                                } else if ($currentadmin['id_admin'] != 1) {
                                  $erroradmin = "Bạn không có quyền thêm admin, Chỉ <b style='color:red; font-size:20px;'>adminchinh</b> mới được thêm";
                                } else {
                                  $erroradmin = "Tài khoản đã tồn tại";
                                }
                                mysqli_close($conn);
                                if ($erroradmin !== false) {
                                  echo '<script> 
                                      alert(' . $erroradmin . ');
                                      window.history.go(-1);
                                      </script>';
                                } else {
                                  echo '<script> 
                                        alert("Thêm admin thành công");
                                        window.location.href="./index.php";
                                        </script>';
                                }
                              } else {
                                echo '<script> 
                                    alert("Vui lòng nhập đầu đủ thông tin");
                                    window.history.go(-1);
                                    </script>';
                              }
                            } else {
                              $user = $_SESSION['current_admin'];
                              if (!empty($user)) {


                            ?>
                                <!-- /. NAV SIDE  -->
                                <form action="./index.php?action=addad" method="post" enctype="multipart/form-data" onsubmit="return check()">
                                  <div class="form-group row">
                                    <div class="col-md-4">
                                      <label for="name_admin">username admin</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="text" name="name_admin" class="form-control" id="" value="" require>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-4">
                                      <label for="pwd_admin">Password admin</label>
                                    </div>
                                    <div class="col-md-8">
                                      <input type="password" name="pwd_admin" id="pwd" class="form-control" id="" value="" require>

                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-4">
                                      <label for="repwd_admin">Nhap lai Password</label>
                                    </div>
                                    <div class=col-md-8>
                                      <input type="password" name="repwd_admin" id="repwd" class="form-control" id="" value="" require>

                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-8">
                                      <div class="showpwd text-left"><input type="checkbox" onclick="myFunction()"><span> Show Password</span><br><br>


                                      </div>
                                    </div>
                                    <div class="ml-auto mr-auto mt-2">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                      <input type="submit" class="btn btn-primary" value="Xác nhận">
                                    </div>

                                </form>
                          </div>
                      <?php }
                            } ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        <?php } ?>
        </div>

        <table id="dataTables-example" class="table table-striped " style="width:100%;">
          <thead>
            <tr style="border-bottom: 5px solid red;">
              <th>#</th>
              <th>Admin name</th>
              <th>Ngày tạo</th>
              <th>Last update</th>
              <th>Ghi chú</th>
            </tr>
          </thead>
          <tbody id="myTable">
            <?php $i = 0;
            if (mysqli_num_rows($inadmin) > 0) {
              while ($row = mysqli_fetch_assoc($inadmin)) {
                $i++;
            ?>
                <tr>
                  <?php

                  if ($row['id_admin'] == $currentadmin['id_admin']) { ?>
                    <td class="canhgiua"><b>AD<?php echo sprintf('%04d', $row['id_admin']); ?></b></td>
                    <td class="canhgiua"><b><?php echo $row['name_admin'] ?></b></td>
                    <td class="canhgiua"><b><?php echo $row['createad_time'] ?></b></td>
                    <td class="canhgiua"><b><?php echo $row['lastupdate_time'] ?></b></td>
                    <td class="canhgiua" style="text-align:center;">

                      <button type="button" class="btn " data-toggle="modal" data-target="#doimkad">
                        <i class="fa fa-pencil-square-o" style="color:blue;" aria-hidden="true"></i>
                      </button>

                      <div class="modal fade" id="doimkad" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="doimkadLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="doimkadLabel">Đổi mật khẩu</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">

                                <div class="col-md-12">

                                  <?php

                                  $errordoimk = false;
                                  if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                                    $oldpass = md5($_POST['old_password']);
                                    $newpass = md5($_POST['new_password']);
                                    if (isset($_POST['admin_id']) && !empty($_POST['admin_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['re_password']) && !empty($_POST['re_password'])) {
                                      $adminResult = mysqli_query($conn, "SELECT * FROM `admin` WHERE (`id_admin` = " . $_POST['admin_id'] . " AND `pass_admin` = '$oldpass' )");
                                      if ($adminResult->num_rows > 0) {
                                        $result = mysqli_query($conn, "UPDATE `admin` SET `pass_admin` = '$newpass' WHERE (`id_admin` = " . $_POST['admin_id'] . " AND `pass_admin` = '$oldpass')");
                                        if (!$result) {
                                          $errordoimk = "Không thể cập nhật tài khoản";
                                        }
                                      } else {
                                        $errordoimk = "Mật khẩu cũ không đúng.";
                                      }
                                      mysqli_close($conn);
                                      if ($errordoimk !== false) {
                                        echo '<script> 
                                      alert(' . $errordoimk . ');
                                      window.history.go(-1);
                                      </script>';
                                      } else {
                                        echo '<script> 
                                      alert("Đổi mật khẩu thành công");
                                      window.location.href="./index.php";
                                      </script>';
                                      } ?>
                                    <?php } else {
                                      echo '<script> 
                                      alert("Vui lòng nhập đầy đủ thông tin");
                                      window.history.go(-1);
                                      </script>';
                                    }
                                  } else {

                                    $admin = $_SESSION['current_admin'];
                                    if (!empty($admin)) {
                                    ?>
                                      <div>
                                        <h3>Xin chào <b><?= $admin['name_admin'] ?></b><br>Bạn muốn thay đổi password?</h3><br>
                                        <form action="./index.php?action=edit" method="Post" autocomplete="off" onsubmit="return check2()">
                                          <input type="hidden" name="admin_id" value="<?= $admin['id_admin'] ?>">


                                          <label for="oldpwd2">Password cũ:&ensp; </label><br>
                                          <input type="password" class="form-control" name="old_password" id="oldpwd2" value="" /><br>

                                          <label for="pwd2">Password mới: </label><br>
                                          <input type="password" class="form-control" name="new_password" id="pwd2" value="" /></br>

                                          <label for="repwd2">Nhập lại Password mới: </label><br>
                                          <input type="password" class="form-control" name="re_password" id="repwd2" value="" /></br>

                                          <div class="showpwd"><input type="checkbox" onclick="myFunction2()"><span> Show Password</span>
                                          </div>


                                          <br>
                                          <div class="text-right">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                            <input type="submit" class="btn btn-primary" value="Cập nhật" />
                                          </div>

                                        </form>

                                      </div>
                                  <?php
                                    }
                                  }
                                  ?>
                                </div>
                              </div>

                            </div>

                          </div>
                        </div>
                      </div>
                    <?php } else {
                    ?>
                    <td class="canhgiua"><b>AD<?php echo sprintf('%04d', $row['id_admin']); ?></b></td>
                    <td class="canhgiua"><?php echo $row['name_admin'] ?></td>
                    <td class="canhgiua"><?php echo $row['createad_time'] ?></td>
                    <td class="canhgiua"><?php echo $row['lastupdate_time'] ?></td>
                    <td class="canhgiua" style="text-align:center;">
                      <form action="index.php?action=xoaad&id=<?php echo $row['id_admin']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có xóa admin này?');">
                        <!-- <input type="hidden" name="xoaid_admin" value="<?php echo $row['id_admin']; ?>"> -->
                        <button type="submit" class="btn"><i class="fa fa-trash-o" style="color:blue;" aria-hidden="true"></i></button>
                      </form>
                    <?php } ?>

                    <!-- <a href="delete.php?id=<?php echo $row['id_admin'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->

                    </td>
                </tr>
            <?php }
            } ?>

          </tbody>

        </table>

      </div>
    </div>


  </div>
</div>

<script type="text/javascript">
  function check() {
    var x = document.getElementById("pwd").value;
    var y = document.getElementById("repwd").value;
    if (x != y) {
      alert("mật khẩu không trùng khớp");
      return false;
    } else {
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

  function check2() {
    var x = document.getElementById("pwd2").value;
    var y = document.getElementById("repwd2").value;
    if (x != y) {
      alert("mật khẩu không trùng khớp");
      return false;
    } else {
      confirm("Bạn chắc chắn cập nhật mật khẩu?");
      return true;
    }

  }

  function myFunction2() {
    var a = document.getElementById("oldpwd2");
    var b = document.getElementById("pwd2");
    var c = document.getElementById("repwd2");
    if (a.type === "password" && b.type === "password" && c.type === "password") {
      a.type = "text";

      b.type = "text";
      c.type = "text";
    } else {
      x.type = "password";
      b.type = "password";
      c.type = "password";

    }
  }
</script>
<?php include 'footeradmin.php'; ?>