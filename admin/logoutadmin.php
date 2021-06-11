<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng xuất tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: sans-serif;
                background: url("../assets/img/bg.jpg");
                background-size: cover;
                min-height: 100px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
                /* background-color: ; */

                background-color: teal;
                color:white;
                

            }
            .box-content a{
                text-decoration: none;
                color: white;
            }
            #user_logout form{
                width: 200px;
                margin: 40px auto;
            }
            #user_logout form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['current_admin']);
        ?>
        <div id="user_logout" class="box-content">
            <h1>Đăng xuất tài khoản Admin thành công</h1>
            <h2>Hẹn gặp lại</h2>
            <a href="./loginadmin.php">Đăng nhập lại</a>
        </div>
    </body>
</html>
