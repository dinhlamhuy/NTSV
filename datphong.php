<?php include 'headeruser.php'; 
if (!isset($_SESSION['current_user'])) {
    header('location: login.php');
}?>

<title>Thông tin đặt phòng</title>
<style>
  
</style>
<div class="container">

    <div class="card ">
        <div class="card-header">
            thông tin đặt phòng
        </div>
        <?php 
        $id_post=$_GET['id'];
        $sql = mysqli_query($conn, "SELECT * FROM `baidang` INNER JOIN `datphong` ON baidang.id_post=datphong.id_post INNER JOIN `chuyenmuc` ON chuyenmuc.id_chuyenmuc = baidang.id_chuyenmuc WHERE `id_datphong`='$id_post'");
        $rows = mysqli_fetch_assoc($sql);
        if(isset($_GET['action']) && $_GET['action']=='xemct'){
            $trangthai=$_POST['trangthai'];
            
            $update=mysqli_query($conn, "UPDATE `datphong` SET `trangthai`='$trangthai' WHERE `id_datphong`='".$_GET['id']."' ");
          
            if ($update){
                echo "<script> window.location.href = './trangcanhan.php'; alert('Cập nhật thành công');</script>";
            }
        }
        ?>
        <div class="card-body">


            <form action="datphong.php?action=xemct&id=<?=$id_post?>" method="post">
                <div class="row">
                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                        <label for="">Trạng thái:</label>
                        <select name="trangthai" id="input" class="form-control" required="required">
                        <option value="<?= $rows['trangthai'] ?>"><?= $rows['trangthai'] ?></option>
                            <?php if ($rows['trangthai'] == "Chưa xem") { ?>
                                <!-- <option value="<?= $rows['trangthai'] ?>"><?= $rows['trangthai'] ?></option> -->
                                <option value="Liên hệ">Đã liên hệ</option>
                                <option value="Hoàn thành">Đã Hoàn Thành</option>
                            <?php } else if ($rows['trangthai'] == "Liên hệ") { ?>
                                <option value="Chưa xem">Chưa xem</option>
                                <!-- <option value="<?= $rows['trangthai'] ?>"><?= $rows['trangthai'] ?></option> -->
                                <option value="Hoàn thành">Đã Hoàn Thành</option>
                            <?php } else { ?>
                                <option value="Chưa xem">Chưa xem</option>
                                <option value="Liên hệ">Đã liên hệ</option>
                                <!-- <option value="<?= $rows['trangthai'] ?>"><?= $rows['trangthai'] ?></option> -->
                            <?php } ?>
                        </select>

                    </div>

                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            
                            <table class="table table-striped table-hover">
                                
                                <tbody>
                                    <tr>
                                        <th>Tiêu đề</th>
                                        <td><?= $rows['tieude'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Chuyên mục</th>
                                        <td><?= $rows['tenchuyenmuc'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tên đăng ký</th>
                                        <td><?= $rows['tendk'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Năm Sinh</th>
                                        <td><?= $rows['ns'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại</th>
                                        <td><?= $rows['sdt'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?= $rows['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Số tháng đăng ký</th>
                                        <td><?= $rows['dkotheothang'] ?> Tháng</td>
                                    </tr>
                                    <tr>
                                        <th>Số lượng phòng </th>
                                        <td><?= $rows['sophongdk'] ?> Phòng</td>
                                    </tr>
                                    <tr>
                                        <th>Nghề nghiệp</th>
                                        <td><?= $rows['nghenghiep'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tên trường/Tên công ty</th>
                                        <td><?= $rows['tentochuc'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Khác giới ở chung</th>
                                        <td><?= $rows['ochungkhacgt'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nuôi thú cưng</th>
                                        <td><?= $rows['thunuoi'] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                            

                        

                    </div>

                </div>

                <div class="input-group">
                    <input type="submit" class="btn btn-primary" value="Cập nhật">
                </div>
            </form>


        </div>
    </div>

</div>


<?php include 'footer.php' ?>