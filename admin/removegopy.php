<?php 
    include '../connect.php';
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        
        
        $sql="DELETE FROM `gopy`   WHERE  `id_gopy` ='$id' ";
        
      
        
        if (mysqli_query($conn, $sql)){
            echo '<script >window.location.href = "./phanhoi.php"; confirm("Đã xóa thành công"); </script>';
           
        }else{
            echo "Không thể xóa";
        }
    }

?>