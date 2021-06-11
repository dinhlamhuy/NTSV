<?php include './headeradmin.php';
  mysqli_set_charset($conn, 'UTF8');
?>
<title>Góp ý của người dùng</title>
<style>
    /* .noidung {
        overflow: scroll;
        text-overflow: ellipsis;
       
        display: -webkit-box;
        -webkit-box-orient: vertical;
        width: 300px;
        height: 100px;
       
    } */
</style>


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mx-1">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4 ><b><i>Nhận ý kiến phản hồi từ người dùng</i></b></h4>
                        </div>
                        <div class="card-body">

                            <table id="dataTables-example" class="table table-striped " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tiêu đề</th>
                                        <th>Họ tên</th>
                                        <th>Liên hệ</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Nội dung</th>
                                        <th>&emsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 0;
                                    $result = mysqli_query($conn, "SELECT * FROM `gopy` ORDER BY `id_gopy` DESC");
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $stt++;
                                    ?>
                                        <tr>
                                            <td class="canhgiua"><b>GY<?= sprintf('%04d', $row['id_gopy']); ?></b></td>
                                            <td class="canhgiua">
                                                <button type="button" class="btn" data-toggle="modal" data-target="#xemchitiet<?= $row['id_gopy'] ?>">
                                                    <?= rutngannd($row['tieude_gopy'], 25, '...') ?></button>
                                                <div class="modal fade" id="xemchitiet<?= $row['id_gopy'] ?>" tabindex="-1" aria-labelledby="xemchitiet<?= $row['id_gopy'] ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="xemchitiet<?= $row['id_gopy'] ?>Label">Chi tiết góp ý</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Mã góp ý: </b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        GY<?= sprintf('%04d', $row['id_gopy']); ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Tiêu đề:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        GY<?= $row['tieude_gopy'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Họ Tên:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <?= $row['hoten'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>SDT:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <?= $row['sdt'] ?>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Email:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <?= $row['email'] ?></div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Nội dung:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <?= $row['noidung'] ?></div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-2">
                                                                        <b>Ngày góp ý:</b>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <?= $row['ngaygopy'] ?></div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="canhgiua"><?= $row['hoten'] ?></td>
                                            <td class="canhgiua"><a href="tel:+<?= $row['sdt'] ?>"><?= $row['sdt'] ?></a></td>
                                            <td class="canhgiua"><a href="mailto:<?= $row['email'] ?>"><?= $row['email'] ?></a></td>
                                            <td class="canhgiua"><?= $row['diachi'] ?></td>
                                            <td class="canhgiua" class="noidung"><?= rutngannd($row['noidung'], 50, '...') ?></td>
                                            <td class="canhgiua">
                                                <form action="phanhoi.php?action=xoagopy&id=<?php echo $row['id_gopy']; ?>" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có xóa góp ý này?');">
                                                    <button type="submit" class="btn"><i class="fa fa-trash-o" style="color:blue;" aria-hidden="true"></i></button>
                                                </form>
                                                <!-- <a href="./removegopy.php?id=<?= $row['id_gopy'] ?>"><i class="fa fa-trash-o mt-3 " aria-hidden="true"></i></a> -->
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!-- <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">

                </div> -->
            </div>
        </div>


<?php 
    
    if (isset($_GET['action']) && $_GET['action'] == 'xoagopy' ){
        $id=$_GET['id'];
        
        
        $xoagopy="DELETE FROM `gopy`   WHERE  `id_gopy` ='$id' ";
        
      
        
        if (mysqli_query($conn, $xoagopy)){
            echo '<script > alert("Đã xóa thành công");  window.location.href = "./phanhoi.php"; </script>';
           
        }else{
            echo '<script > alert("Xóa thất bại");  window.history.go(-1); </script>';
        }
    }

?>
<?php include 'footeradmin.php'; ?>