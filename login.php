
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./admin/assets/img/logoweb.png" type="image/png">
	<style>
	body {
   
    background: url("./assets/img/bg.jpg");
   margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-size: cover;
            min-height: 100px;
            align-items: center;
            justify-content: center;
}

.box {
            width: 400px;
            padding: 40px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.7);
            text-align: center;
            border-radius: 10px;

        }

        .box h1 {
            color: white;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box input[type="text"],
        .box input[type="password"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #b48062;
            padding: 14px 10px;
            width: 300px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
        }

        .box input[type="checkbox"] {
            color: white;

            cursor: pointer;
        }

        .box input[type="text"]:focus,
        .box input[type="password"]:focus {
            width: 400px;
            border-color: #2ecc71;
        }

        .box input[type="submit"] {
            border: 0;
            background: none;
            display: block;
            margin: 20px auto;
            text-align: center;
            border: 2px solid #2ecc71;
            padding: 14px 40px;
            outline: none;
            color: white;
            border-radius: 24px;
            transition: 0.25s;
            cursor: pointer;


        }

        .box input[type="submit"]:hover {
            background: #2ecc71;

        }

        .box a {
            font-family: 'Times New Roman';
            font-size: 16;
            color: rgb(201, 204, 47);
            text-decoration: none;
        }

        span {
            font-family: 'Times New Roman';
            font-size: 14;
            color: rgb(246, 246, 248);

        }

        form {
            margin-top: 40px !important;
        }

        h2 {
            color: blue;
            font-size: 40px;
        }

        ::placeholder {
            color: rgb(255, 255, 255);
        }
	</style>
<title>Đăng nhập</title>

</head>
<?php

    session_start();
    include './connect.php';
    // date_default_timezone_set('Asia/Saigon'); 
    $error=false;
   
    if (isset($_POST['ten_tk']) && !empty($_POST['ten_tk']) && isset($_POST['mk']) && !empty($_POST['mk'])){
        $result=mysqli_query($conn, "SELECT * FROM `user` WHERE (`username`='" . $_POST['ten_tk']. "' AND `userpassword` =md5('" . $_POST['mk'] ."')) ");
        if (!$result){
            $error=mysqli_error($conn);
        } else {
            $user=mysqli_fetch_assoc($result);
            
            $_SESSION['current_user']=$user;
        }
        mysqli_close($conn);
        if ($error !== false || $result->num_rows==0){
            ?>
            
            <div class="panel panel-default" style="padding: 20px 200px; background-color:#320d0d; color:white;">
                <div class="panel-body" >
                   
                    <h1>Thông báo</h1>
                    <h4 ><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <a href="./login.php">Quay lại</a>
                </div>
            </div>
           
            <?php
            exit;
        }
        ?>
<?php } ?>
<?php
    if (empty($_SESSION['current_user'])){ ?>
        <div   class="box-content">
        <form class="box" action="" method="POST" autocomplete="off">
        <h1><b><i>Đăng nhập</i></b></h1><br>
        <input type="text" name="ten_tk" placeholder="username" maxlength="40" value="" >
        <input type="password" id="pwd" name="mk" placeholder="password" maxlength="16" value="">
        <input type="checkbox" onclick="myFunction()"><span>Show Password</span>
        <input type="submit"  value="Đăng nhập">
        <span>Bạn chưa có tài khoản? &ensp;</span><a href="dk.php"><b>Đăng ký</b></a>
    </form></div>
    <?php
    }else{
        $currentUser=  $_SESSION['current_user'];
        echo '<script> window.location.href = "./index.php"; alert ("Đăng nhập thành công");  </script>';
        // echo '<script> window.history.go(-); confirm ("Đăng nhập thành công");  </script>';
        }
?>
   
</body>
<script>
    function myFunction() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</html>