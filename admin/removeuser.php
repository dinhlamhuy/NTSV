<?php 
    include '../connect.php';
    if (isset($_GET['id'])){
        $id=$_GET['id'];
        // $sql1=mysqli_query($conn, "DELETE FROM `imgmota`   WHERE  `id_post` ='$id' ");
        // $sql2=mysqli_query($conn, "DELETE FROM `datphong`   WHERE  `id_post` ='$id' ");

        $sql="DELETE FROM `user`   WHERE  `id_user` ='$id' ";
        
      
        
        if (mysqli_query($conn, $sql)){
            echo '<script >window.location.href = "./qluser.php"; confirm("Đã xóa thành công"); </script>';
           
        }else{
            echo "Không thể xóa";
        }
    }

?>