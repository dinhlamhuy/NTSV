<?php include './headeradmin.php' ?>

<title>Quản lý bài đăng</title>



<?php
$i = 0;
$sql = "SELECT * FROM `baidang` INNER JOIN `user` ON baidang.id_user = user.id_user INNER JOIN `chuyenmuc` ON baidang.id_chuyenmuc = chuyenmuc.id_chuyenmuc";
$result = mysqli_query($conn, $sql); ?>



<div class="container-fluid">


    <div class="row">
        <div class="col-md-12 mx-1">
            <!-- Advanced Tables -->
            <div class="card  w-100">
                <div class="card-header">
                    <h4><b><i> Danh sách Bài đăng</i></b></h4>

                </div>
                <div class="card-body">


                    <table id="dataTables-example" class="table table-striped " style="width:100%">
                        <thead>
                            <tr style="border-bottom: 2px solid red ;">
                                <th class="canhgiua">#</th>
                                <th class="canhgiua">Tiêu đề</th>
                                <th class="canhgiua">Chủ bài đăng</th>
                                <th class="canhgiua">Số phòng</th>
                                <th class="canhgiua">Giá</th>
                                <th class="canhgiua">Diện tích</th>
                                <!-- <th>Địa chỉ</th> -->
                                <th class="canhgiua">Liên hệ</th>
                                <!-- <th>Email</th> -->
                                <th class="canhgiua">Chuyên mục</th>
                                <th class="canhgiua">Hình minh họa</th>
                                <th class="canhgiua">Chỉnh sửa</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) > 0) {
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $diachi = $rows['diachi'];
                                    $xa =  $rows['xa'];
                                    $huyen =  $rows['huyen'];
                                    $tinh =  $rows['tinh'];

                                    //      
                                    $i++;     ?>
                                    <tr>
                                        <td class="canhgiua"><b>HR<?php echo sprintf('%04d', $rows['id_post']) ?></b></td>
                                        <td class="canhgiua"><a href="../chitietsp.php?id=<?= $rows['id_post'] ?>"><?php echo $rows['tieude'] ?></a></td>
                                        <td class="canhgiua"><?php echo $rows['username'] ?></td>
                                        <td class="canhgiua"><?php echo $rows['soluong'] ?></td>
                                        <td class="canhgiua"><?php echo number_format($rows['gia']) ?></td>
                                        <td class="canhgiua"><?php echo $rows['dientich'] ?></td>
                                        <!-- <td><?php echo "$diachi, $xa, $huyen, $tinh"; ?></td> -->
                                        <td class="canhgiua"><?php echo  $rows['lienhe'] ?></td>
                                        <!-- <td><?php echo  $rows['email'] ?></td> -->
                                        <td class="canhgiua"><?php echo $rows['tenchuyenmuc'] ?></td>
                                        <td><img src="../assets/img/baidang/<?php echo $rows['img_post'] ?>" style="height:100px; width:100px;" alt=""></td>
                                        <td style="text-align:center; vertical-align: middle;" >
                                            <form action="qlbaidang.php?action=xoabaidang&id=<?php echo $rows['id_post']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có xóa bài đăng này?');">
                                                <button type="submit" class="btn"><i class="fa fa-trash-o" style="color:blue;" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_GET['action']) && $_GET['action'] == 'xoabaidang') {
    $id = $_GET['id'];
    $sql1 = mysqli_query($conn, "DELETE FROM `imgmota` WHERE `id_post` ='$id' ");
    $sql2 = mysqli_query($conn, "DELETE FROM `datphong` WHERE `id_post` ='$id' ");
    $sql3 = mysqli_query($conn, "DELETE FROM `bookmark` WHERE `id_post` ='$id' ");

    $xoapost = "DELETE FROM `baidang`  WHERE  `id_post` ='$id' ";



    if (mysqli_query($conn, $xoapost)) {
        echo '<script >window.location.href = "./qlbaidang.php"; confirm("Đã xóa thành công"); </script>';
    } else {
        echo '<script > alert("Xóa thất bại");  window.history.go(-1); </script>';
    }
}


include 'footeradmin.php'; ?>