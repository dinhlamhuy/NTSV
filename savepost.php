<?php
session_start();
ob_start();
  include './connect.php';
    if (isset($_GET['id']) && isset($_SESSION['current_user'])){
        $id=$_GET['id'];
        $user=$_SESSION['current_user'];
        $sql=mysqli_query($conn ,"SELECT * FROM `bookmark` WHERE `id_post`='$id' AND `id_user`='".$user['id_user']."'");
        if (mysqli_num_rows($sql)>0){
            $Unsave=mysqli_query($conn, "DELETE FROM `bookmark` WHERE `id_post`='$id' AND `id_user`='".$user['id_user']."'");
            echo '<script> window.history.go(-1);</script>';
            exit;
        }
        else {
            $save=mysqli_query($conn, "INSERT INTO `bookmark`(`id_user`, `id_post`) VALUES ('".$user['id_user']."', '$id')");
            echo '<script> window.history.go(-1); </script>';
            exit;
        }
    }
?>