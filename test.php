<?php include './headeruser.php';

//chỉnh sửa thông tin cá nhân
$error = false;

$hienthi = mysqli_query($conn, " SELECT * FROM `user` WHERE `id_user`='" . $user['id_user'] . "'");

$xuat = mysqli_fetch_assoc($hienthi);
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $fullname = $_POST['fullname'];
    $gioitinh = $_POST['gt'];
    $ns = $_POST['ns'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];



    $avatar = $_FILES['avatar']['name'];
    $allowed = array("" => "avatar/", "jpg" => "avatar/jpg", "jpeg" => "avatar/jpeg", "gif" => "avatar/gif", "png" => "avatar/png");
    if (empty($avatar)) {
        $newname = $xuat['avatar'];
    } else {
        $extension = pathinfo($avatar, PATHINFO_EXTENSION);
        $randomno = rand(0, 100000);
        $rename = 'Upload' . date('Ymd') . $randomno;
        $newname = $rename . '.' . $extension;

        if (!array_key_exists($extension, $allowed)) {
            echo "File không đúng định dạng";
        } else if (empty($error)) {
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/img/user/' . $newname)) {
            } else {
            }
        }
    }
    $sqluser1 = "UPDATE `user` SET   `fullname`='$fullname', `sex`='$gioitinh', `date_of_birth`='$ns', `address`='$address',
                            `email`='$email', `phone`='$tel', `avatar`='$newname' ,`lastupdate_user`='" . date('Y-m-d H:i:s') . "' WHERE `id_user`='" . $_GET['id'] . "'";

    $result1 = mysqli_query($conn, $sqluser1);
    if (!$result1) {
        echo '<script> window.history.go(-1); confirm ("Cập nhật tài khoản thất bại");  </script>';
    } else {
        echo '<script> window.location.href = "./trangcanhan.php"; confirm ("Cập nhật tài khoản thành công");  </script>';
    }
    mysqli_close($conn);
}



if (!isset($_SESSION['current_user'])) {
    header('location: login.php');
}

$sql = "SELECT * FROM `user`  WHERE id_user='" . $user['id_user'] . "' ";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


?>
<style>
    .custom-file-input~.custom-file-label::after {
        content: "Upload";
    }
</style>
<title><?php echo $row['fullname'] ?> - Trang cá nhân</title>
<div class="container-fluid mt-lg-3 mb-lg-2">

    <div class="row">
        <div class="col-md-2">
            <center><img src="./assets/img/user/<?php echo $row['avatar'] ?>" class="rounded-circle" style="height:100px; width:100px;"><br>

                <?php
                echo '<strong><em><h5>' . $row['fullname'] . '<h5></em></strong>';
                echo '<small>ID: CT' . $row['id_user'] . ' - ' . $row['username'] . '</small><br>';
                echo '<small>' . $row['phone'] . '</small>';
                ?><br>
                <div class="row mt-2">
                    <div class="col-md-6 mx-auto">
                        <a href="./logout.php" class="btn btn-danger px-1 w-100">Đăng xuất</a>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <a href="./themsp.php" class="btn btn-primary px-1 w-100">Đăng tin</a>
                    </div>
                </div>


            </center>

            <!-- Nav tabs -->
           
            <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Thông tin cá nhân</a>
                <a class="nav-link" id="v-pills-dsbaidang-tab" data-toggle="pill" href="#v-pills-dsbaidang" role="tab" aria-controls="v-pills-dsbaidang" aria-selected="false">Quản lý bài đăng</a>
                <a class="nav-link" id="v-pills-dattruoc-tab" data-toggle="pill" href="#v-pills-dattruoc" role="tab" aria-controls="v-pills-dattruoc" aria-selected="false">Danh sánh đặt trước</a>
                <a class="nav-link" id="v-pills-updateaccount-tab" data-toggle="pill" href="#v-pills-updateaccount" role="tab" aria-controls="v-pills-updateaccount" aria-selected="false">Cập nhật tài khoản</a>
                <a class="nav-link" id="v-pills-updatepasswd-tab" data-toggle="pill" href="#v-pills-updatepasswd" role="tab" aria-controls="v-pills-updatepasswd" aria-selected="false">Đổi mật khẩu</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                <div class="tab-pane fade" id="v-pills-dsbaidang" role="tabpanel" aria-labelledby="v-pills-dsbaidang-tab">
                    <nav aria-label="breadcrumb" class="bg-light">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="./trangcanhan.php">Quản lý</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý phòng trọ</li>
                        </ol>
                    </nav>
                    <div class="table-responsive">

                        <table id="dataTables-example" class="table table-striped " style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Số phòng</th>
                                    <th>Giá (VND/Tháng)</th>
                                    <th>Diện tích(m<sup>2</sup>)</th>
                                    <th>Liên hệ</th>
                                    <th>Chuyên mục</th>
                                    <th>Địa chỉ</th>
                                    <th>Ảnh mô tả</th>
                                    <th>Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                $sql2 = "SELECT * FROM `user` INNER JOIN `baidang` ON user.id_user = baidang.id_user INNER JOIN `chuyenmuc` ON baidang.id_chuyenmuc = chuyenmuc.id_chuyenmuc WHERE baidang.id_user='" . $user['id_user'] . "' ";
                                $result2 = mysqli_query($conn, $sql2);
                                while ($showpost = mysqli_fetch_assoc($result2)) {
                                    $i++;
                                ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><a href="chitietsp.php?id=<?php echo $showpost['id_post'] ?>"><?php echo $showpost['tieude'] ?></a></td>
                                        <td><?php echo $showpost['soluong'] ?></td>
                                        <td><?php echo number_format($showpost['gia']) ?> đ</td>
                                        <td><?php echo $showpost['dientich'] ?></td>
                                        <td><?php echo $showpost['lienhe'] ?></td>
                                        <td><?php echo $showpost['tenchuyenmuc'] ?></td>
                                        <td><?php echo "" . $showpost['diachi'] . ", " . $showpost['xa'] . ", " . $showpost['huyen'] . ", " . $showpost['tinh'] ?></td>
                                        <td>
                                            <center><img src="./assets/img/baidang/<?php echo $showpost['img_post'] ?>" class="img-thumbnail" style="height:150px; max-width:200px;" alt=""></center>
                                        </td>
                                        <td>
                                            <a href="./editbaidang.php?id=<?php echo $showpost['id_post'] ?>" class="btn p-0"><i class="fa fa-pencil" style="color:blue" aria-hidden="true" style="color:black;"></i></a> &ensp;
                                            <!-- <a href="./xoasp.php?id=<?php echo $showpost['id_post'] ?>"><i class="fa fa-trash" aria-hidden="true" style="color:red;"></i></a> -->
                                            <button type="button" class="btn p-0 " data-toggle="modal" data-target="#xoapost">
                                                <i class="fa fa-trash" style="color:blue" aria-hidden="true"></i>
                                            </button>
                                            <div class="modal fade pt-lg-5" id="xoapost" tabindex="-1" aria-labelledby="xoapostLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5 class="modal-title" id="xoapostLabel">Xóa dữ liệu</h5>
                                                            Bạn có chắc muốn xóa dòng này?
                                                            <div class="text-right">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                <a href="./xoasp.php?id=<?php echo $showpost['id_post'] ?>" class="btn btn-primary">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-dattruoc" role="tabpanel" aria-labelledby="v-pills-dattruoc-tab">
                    <nav aria-label="breadcrumb" class="bg-light">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="./trangcanhan.php">Quản lý</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Quản lý đặt phòng</li>
                        </ol>
                    </nav>
                    <div class="table-responsive">

                        <table id="dataTables-example" class="table table-striped " style="width:100%; ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bài đăng</th>
                                    <th>Tên Đăng ký</th>
                                    <th>Số điện thoại</th>
                                    <th>Số Phòng đã đặt</th>
                                    <th>Số tháng đã đặt</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0;
                                $sqls = mysqli_query($conn, "SELECT * FROM `datphong` INNER JOIN `baidang` ON datphong.id_post = baidang.id_post  WHERE baidang.id_user='" . $user['id_user'] . "' ");
                                if (mysqli_num_rows($sqls) > 0) {
                                    while ($out = mysqli_fetch_assoc($sqls)) {
                                        $i++;
                                ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $out['tieude'] ?></td>
                                            <td><?php echo $out['tendk'] ?></td>
                                            <td><?php echo $out['lienhe'] ?></td>

                                            <td style="text-align: center;"><?php echo $out['sophongdk'] ?></td>
                                            <td style="text-align: center;"><?php echo $out['dkotheothang'] ?></td>
                                            <td style="font-weight: bold;"><?php if ($out['trangthai'] == 'Chưa xem') {
                                                                                echo '<span class="btn btn-danger btn-sm">' . $out['trangthai'] . '</span></td>';
                                                                                // $out['soluong']= $out['soluong'] - $out['sophong'];
                                                                            } else if ($out['trangthai'] == 'Liên hệ') {
                                                                                echo '<span class="btn btn-warning btn-sm">' . $out['trangthai'] . '</span></td>';
                                                                            } else if ($out['trangthai'] == 'Hoàn thành') {
                                                                                echo '<span class="btn btn-primary btn-sm">' . $out['trangthai'] . '</span></td>';
                                                                                // $out['soluong']= $out['soluong'] - $out['sophong'];
                                                                            }

                                                                            ?>
                                            </td>

                                            <td>
                                                <a href="datphong.php?id=<?= $out['id_datphong'] ?>" class="btn p-0"> <i class="fa fa-pencil-square-o" style="color:blue" aria-hidden="true"></i></a> &ensp;
                                                <button type="button" class="btn p-0 " data-toggle="modal" data-target="#xoadattruoc">
                                                    <i class="fa fa-trash-o" style="color:blue" aria-hidden="true"></i>
                                                </button>


                                                <div class="modal fade pt-lg-5" id="xoadattruoc" tabindex="-1" aria-labelledby="xoadattruocLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5 class="modal-title" id="xoadattruocLabel">Xóa dữ liệu</h5>
                                                                Bạn có chắc muốn xóa dòng này?
                                                                <div class="text-right">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                    <a href="xoadatphong.php?id=<?= $out['id_datphong'] ?>" class="btn btn-primary">Yes</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-updateaccount" role="tabpanel" aria-labelledby="v-pills-updateaccount-tab">
                    <nav aria-label="breadcrumb " class="bg-light w-100 mx-0">
                        <ol class="breadcrumb bg-light">
                            <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="./trangcanhan.php">Quản lý</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin cá nhân</li>
                        </ol>
                    </nav>
                    <div class="row">

                        <div class="col-md-8 mx-auto">
                            <h2>Chỉnh sửa thông tin thành viên</h2>
                            <hr>
                            <form action="./editdk.php?action=edit&id=<?= $user['id_user'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                                <div class="form-group">


                                    <!-- <a href="#" class="img-thumbnail"> -->
                                    <!-- </a> -->

                                    <center><img src="./assets/img/user/<?= $xuat['avatar'] ?>" class="rounded-circle mb-3 mx-auto text-center" style="height: 250px; width:250px;" alt=""></center>
                                    <div class="input-group mb-3">

                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="avatar" name="avatar" aria-describedby="avatarAddon01">
                                            <label class="custom-file-label" for="avatar">Chọn ảnh đại diện</label>
                                        </div>
                                    </div>
                                    <!-- <input type="file" name="avatar" class="form-control"> -->
                                </div>
                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" name="fullname" class="form-control" value="<?= $xuat['fullname'] ?>" required>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="ns">Ngày tháng năm sinh</label>
                                            <input type="date" min="1900-12-31" max="2020-01-01" name="ns" value="<?= $xuat['date_of_birth'] ?>" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="gt">Giới Tính</label><br>
                                            <?php
                                            if ($xuat['sex'] == 'Nam') {
                                                echo '
                                                <label class="btn">
                                                <input type="radio" name="gt" value="Nam" checked> Nam
                                            </label>
                                            <label class="btn  ">
                                                <input type="radio" name="gt" value="Nữ"> Nữ
                                            </label>
                                            <label class="btn ">
                                                <input type="radio" name="gt" value="Khác" > Khác
                                            </label>
                                                ';
                                            } else if ($xuat['sex'] == 'Nữ') {
                                                echo '
                                                <label class="btn">
                                                <input type="radio" name="gt" value="Nam"> Nam
                                            </label>
                                            <label class="btn  ">
                                                <input type="radio" name="gt" value="Nữ" checked> Nữ
                                            </label>
                                            <label class="btn ">
                                                <input type="radio" name="gt" value="Khác"> Khác
                                            </label>
                                                ';
                                            } else {
                                                echo '
                                                <label class="btn">
                                                <input type="radio" name="gt" value="Nam"> Nam
                                            </label>
                                            <label class="btn  ">
                                                <input type="radio" name="gt" value="Nữ"> Nữ
                                            </label>
                                            <label class="btn ">
                                                <input type="radio" name="gt" value="Khác" checked> Khác
                                            </label>
                                                ';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <select name="address" class="form-control">
                                        <option value="<?php echo $xuat['address'] ?>" selected><?php echo $xuat['address'] ?></option>
                                        <option value="Hậu Giang">Hậu Giang</option>
                                        <option value="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Cần Thơ">Cần Thơ</option>
                                        <option value="An Giang">An Giang</option>
                                        <option value="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Cà Mau">Cà Mau</option>
                                        <option value="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Kiên Giang">Kiên Giang</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?php echo $xuat['email'] ?>" class="form-control" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="tel">Số điện thoại</label>
                                    <input type="text" name="tel" class="form-control" value="<?php echo $xuat['phone'] ?>" maxlength="11" maxlength="11" pattern="[0-9]{10,11}" title="bắt đầu bằng số 84 và có 11 số " required>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" class="btn btn-primary btn-lg" value="Cập nhật"> &ensp;

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-updatepasswd" role="tabpanel" aria-labelledby="v-pills-updatepasswd-tab">
                    <?php

                    $error = false;
                    if (isset($_GET['action']) && $_GET['action'] == 'editpass') {
                        $oldpass = md5($_POST['old_password']);
                        $newpass = md5($_POST['new_password']);
                        if (isset($_POST['user_id']) && !empty($_POST['user_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['re_password']) && !empty($_POST['re_password'])) {
                            $userResult = mysqli_query($conn, "SELECT * FROM `user` WHERE (`id_user` = " . $_POST['user_id'] . " AND `userpassword` = '$oldpass' )");
                            if ($userResult->num_rows > 0) {
                                $resultpass = mysqli_query($conn, "UPDATE `user` SET `userpassword` = '$newpass' WHERE (`id_user` = " . $_POST['user_id'] . " AND `userpassword` = '$oldpass')");
                                if (!$resultpass) {
                                    $error = "Không thể cập nhật tài khoản";
                                }
                            } else {
                                $error = "Mật khẩu cũ không đúng.";
                            }
                            mysqli_close($conn);
                            if ($error !== false) {
                    ?>
                                <div id="error-notify" class="box-content">
                                    <h1>Thông báo</h1>
                                    <h4><?= $error ?></h4>
                                    <a href="./trangcanhan.php">Quay lại</a>
                                </div>
                            <?php } else { ?>
                                <div id="edit-notify" class="box-content">
                                    <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
                                    <a href="./trangcanhan.php">Tiếp tục</a>
                                </div>
                            <?php } ?>
                        <?php } else {
                            echo '
                            <script> 
                            $("#v-pills-updatepasswd a").on("click", function (event) {
                                event.preventDefault()
                                $(this).tab("show")
                              })
                            </script>
                            <div id="edit-notify" class="box-content">
                            <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                            <a href="./trangcanhan.php">Quay lại sửa tài khoản</a>
                        </div>
                            ';
                        }
                    } else {

                        $user = $_SESSION['current_user'];
                        if (!empty($user)) {
                        ?>
                            <div id="edit_user" class="box-content">
                                <h3>Xin chào <b><?= $user['username'] ?></b>!! Bạn muốn thay đổi password?</h3><br>
                                <form action="./trangcanhan.php?action=editpass" method="Post" autocomplete="off" id="doipass" onsubmit="return check()">
                                    <input type="hidden" name="user_id" value="<?= $user['id_user'] ?>">
                                    <div class="form-group text-left">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="old_password" class="">Password cũ: </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" name="old_password" class="form-control" id="oldpwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /><br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-left">

                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="new_password">Password mới: </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" name="new_password" class="form-control" id="pwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /></br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-left">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="re_password">Nhập lại Password mới: </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" name="re_password" class="form-control" id="repwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /></br>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group text-left">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-8">
                                                <div class="showpwd text-left">
                                                    <input type="checkbox" class="btn btn-success" onclick="myFunction()"><span> Show Password</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <br>
                                    <input type="submit" class="btn btn-success" value="Cập nhật" />

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
<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<script type="text/javascript">
    function check() {
        var x = document.getElementById("pwd").value;
        var y = document.getElementById("repwd").value;
        if (x != y) {
            confirm("mật khẩu không trùng khớp");
            return false;
        } else {
            return true;
        }
    }

    function myFunction() {
        var x = document.getElementById("oldpwd");
        var y = document.getElementById("pwd");
        var z = document.getElementById("repwd");
        if (x.type === "password" && y.type === "password" && z.type === "password") {
            x.type = "text";

            y.type = "text";
            z.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
            z.type = "password";

        }
    }
</script>



<?php include './footer.php'; ?>