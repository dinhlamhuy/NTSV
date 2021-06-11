<?php 
    include './connect.php';
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="DELETE FROM `datphong` WHERE  `id_datphong` ='$id' ";
        var_dump($sql);
       
        
        if (mysqli_query($conn, $sql)){
            echo '<script >window.location.href = "./trangcanhan.php"; confirm("Đã xóa thành công"); </script>';
           
        }else{
            echo "Không thể xóa";
        }
    }
?>