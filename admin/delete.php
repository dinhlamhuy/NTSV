<?php 
    session_start();
    include '../connect.php';
    $admin = $_SESSION['current_admin'];
    if (isset($_GET['id']) && $_GET['id'] != $admin['id_admin'] && $admin['id_admin']=='1'){

        $id=$_GET['id'];
        $sql="DELETE FROM `admin` WHERE `id_admin` ='$id'  AND `id_admin` <> '1'  ";
    
       
        
        if (mysqli_query($conn, $sql) && $id !='1'){
            echo '<script > alert("Đã xóa thành công"); window.location.href = "./index.php";</script>';
           
        }else{
            echo '<script > alert("Bạn không thể xóa admin này"); window.history.go(-1);</script>';
        }
    } else if ($_GET['id'] == $admin['id_admin']) {
        
        echo '<script >alert("Bạn không thể xóa chính bạn"); window.history.go(-1); </script>';
    } else if ($admin['id_admin']!='1'){
        echo '<script > alert("Chỉ Adminchinh mới có quyền xóa!"); window.history.go(-1);</script>';
    }

?>