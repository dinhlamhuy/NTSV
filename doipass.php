<?php include './headeruser.php';
if (!isset($_SESSION['current_user'])) {
    header('location: login.php');
}
?>
<title>Đổi mật khẩu</title>
<!-- <style>
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
</style> -->


<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card card-default">
            <div class="card-header">
                Update Password
            </div>

            <div class="card-body">
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
                                <a href="./doipass.php">Quay lại</a>
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
                            <a href="./doipass.php">Quay lại sửa tài khoản</a>
                        </div>
                    <?php
                    }
                } else {

                    $user = $_SESSION['current_user'];
                    if (!empty($user)) {
                    ?>
                        <div id="edit_user" class="box-content">
                            <h3>Xin chào <b><?= $user['username'] ?></b>!! Bạn muốn thay đổi password?</h3><br>
                            <form action="./doipass.php?action=editpass" method="Post" autocomplete="off" onsubmit="return check()">
                                <input type="hidden" name="user_id" value="<?= $user['id_user'] ?>">

                                <center>
                                    <div class="form-group">

                                        <label for="old_password">Password cũ: </label>
                                        <input type="password" name="old_password" class="form-control" id="oldpwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /><br>
                                    </div>

                                    <div class="form-group">


                                        <label for="new_password">Password mới: </label>
                                        <input type="password" name="new_password" class="form-control" id="pwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /></br>
                                    </div>

                                    <div class="form-group">

                                        <label for="re_password">Nhập lại Password mới: </label>
                                        <input type="password" name="re_password" class="form-control" id="repwd" value="" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}" title="Ít nhất 8 ký tự nhiều nhất 16, có ít nhất một ký tự Hoa, ký tự thường và số" /></br>

                                    </div>
                                    <div class="showpwd"><input type="checkbox" class="btn btn-success" onclick="myFunction()"><span> Show Password</span>
                                    </div>
                                </center>


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

<?php include 'footer.php'; ?>