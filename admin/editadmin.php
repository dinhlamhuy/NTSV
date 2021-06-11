<?php include './headeradmin.php' ?>
<title>Đổi mật khẩu admin</title>
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
        border: 1px 3px 1px 1px solid red; 
        
        border-bottom: 2px solid red;

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





            <div class="row">
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header">
                            Update Password
                        </div>

                        <div class="card-body">

                            <?php

                            $error = false;
                            if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                                $oldpass = md5($_POST['old_password']);
                                $newpass = md5($_POST['new_password']);
                                if (isset($_POST['admin_id']) && !empty($_POST['admin_id']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['new_password']) && !empty($_POST['new_password']) && isset($_POST['re_password']) && !empty($_POST['re_password'])) {
                                    $adminResult = mysqli_query($conn, "SELECT * FROM `admin` WHERE (`id_admin` = " . $_POST['admin_id'] . " AND `pass_admin` = '$oldpass' )");
                                    if ($adminResult->num_rows > 0) {
                                        $result = mysqli_query($conn, "UPDATE `admin` SET `pass_admin` = '$newpass' WHERE (`id_admin` = " . $_POST['admin_id'] . " AND `pass_admin` = '$oldpass')");
                                        if (!$result) {
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
                                            <a href="./editadmin.php">Quay lại</a>
                                        </div>
                                    <?php } else { ?>
                                        <div id="edit-notify" class="box-content">
                                            <h1><?= ($error !== false) ? $error : "Sửa tài khoản thành công" ?></h1>
                                            <a href="./index.php">Tiếp tục</a>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div id="edit-notify" class="box-content">
                                        <h1>Vui lòng nhập đủ thông tin để sửa tài khoản</h1>
                                        <a href="./editadmin.php">Quay lại sửa tài khoản</a>
                                    </div>
                                <?php
                                }
                            } else {

                                $admin = $_SESSION['current_admin'];
                                if (!empty($admin)) {
                                ?>
                                    <div id="edit_user" class="box-content">
                                        <h3>Xin chào <b><?= $admin['name_admin'] ?></b><br>Bạn muốn thay đổi password?</h3><br>
                                        <form action="./editadmin.php?action=edit" method="Post" autocomplete="off" onsubmit="return check()">
                                            <input type="hidden" name="admin_id" value="<?= $admin['id_admin'] ?>">


                                            <label for="old_password">Password cũ:&ensp; </label><br>
                                            <input type="password" name="old_password" id="oldpwd" value="" /><br>

                                            <label for="new_password">Password mới: </label><br>
                                            <input type="password" name="new_password" id="pwd" value="" /></br>
                                            <label for="re_password">Nhập lại Password mới: </label><br>
                                            <input type="password" name="re_password" id="repwd" value=""  /></br>
                                            <div class="showpwd"><input type="checkbox" onclick="myFunction()"><span> Show Password</span>
                                            </div>


                                            <br>
                                            <input type="submit" value="Cập nhật" />

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

<?php include 'footeradmin.php'; ?>