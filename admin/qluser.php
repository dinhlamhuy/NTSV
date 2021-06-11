   <?php include './headeradmin.php' ?>
<title>Quản lý user</title>
   <div class="container-fluid">
       <?php
        $sql = "SELECT * FROM `user`";
        $result = mysqli_query($conn, $sql); ?>
       <div class="row">

          

           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
               <div class="card w-100">
                   <div class="card-header">
                   <h4><b><i> Quản lý người dùng</i></b></h4>
                   </div>
                   <div class="card-body">

                       <table id="dataTables-example" class="table table-striped " style="width:100%; height:auto;">
                           <thead>
                               <tr style="border-bottom: 3px solid red ;" class="canhgiua">
                                   <th class="canhgiua">#</th>
                                   <th class="canhgiua">Username</th>
                                   <th class="canhgiua">Giới tính</th>
                                   <th class="canhgiua">Ngày sinh</th>
                                   <th class="canhgiua">Địa chỉ</th>
                                   <th class="canhgiua">email</th>
                                   <th class="canhgiua">Phone</th>
                                   <th class="canhgiua">Avatar</th>
                                   <th class="canhgiua">...</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php $i = 0;
                                if (mysqli_num_rows($result) > 0) {
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $i++; ?>
        
                                       <tr>
        
                                           <td  class="canhgiua"><b>#<?php echo sprintf('%04d', $rows['id_user']); ?></b></td>
                                           <td  class="canhgiua"><?php echo $rows['username'] ?></td>
                                           <td  class="canhgiua"><?php echo $rows['sex'] ?></td>
                                           <td  class="canhgiua"><?php echo $rows['date_of_birth'] ?></td>
                                           <td  class="canhgiua"><?php echo $rows['address'] ?></td>
                                           <td  class="canhgiua"><?php echo $rows['email'] ?></td>
                                           <td  class="canhgiua"><?php echo $rows['phone'] ?></td>
                                           <td  class="canhgiua"><img src="../assets/img/user/<?php if ($rows['avatar'] == '') {
                                                                                echo "avatar.png";
                                                                            } else {
                                                                                echo $rows['avatar'];
                                                                            } ?>" height="50px" width="50px" alt=""></td>
        
        
                                           <td style="text-align:center;" class="canhgiua">
                                           <form action="qluser.php?action=xoausr&id=<?php echo $rows['id_user']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có xóa dòng này?');">
                                                    <button type="submit" class="btn"><i class="fa fa-trash-o" style="color:blue;" aria-hidden="true"></i></button>
                                                </form>
        
                                               <!-- <a href="./removeuser.php?id=<?php echo $rows['id_user'] ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
        
                                           </td>
                                       </tr>
                               <?php    }
                                } ?>
                           </tbody>
        
                       </table>
                   </div>
               </div>




           </div>
           <!--End Advanced Tables -->

       </div>


   </div>
   <?php 
    
    if (isset($_GET['action']) && $_GET['action'] == 'xoausr' ){
        $id=$_GET['id'];
        
        $sqlusr="DELETE FROM `user`   WHERE  `id_user` ='$id' ";
        
      
        if (mysqli_query($conn, $sqlusr)){
            echo '<script >window.location.href = "./qluser.php"; confirm("Đã xóa thành công"); </script>';
           
        }else{
            echo '<script > alert("Xóa thất bại");  window.history.go(-1); </script>';
        }
    }
    

?>

   <?php include 'footeradmin.php'; ?>