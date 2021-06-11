<?php
include './headeradmin.php';
if (!isset($_SESSION['current_admin'])) {
    header("location:loginadmin.php");
}
if (isset($_GET['action']) && $_GET['action'] == 'upnews') {
    $tacgia = $_POST['tacgia'];
    $nguon = $_POST['nguon'];
    $theloai = $_POST['theloai'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $imgtintuc = $_FILES['imgtintuc']['name'];
    $allowed = array("" => "imgtintuc/", "jpg" => "imgtintuc/jpg", "jpeg" => "imgtintuc/jpeg", "gif" => "imgtintuc/gif", "png" => "imgtintuc/png");
    $extension = pathinfo($imgtintuc, PATHINFO_EXTENSION);
    $randomno = rand(0, 100000);
    $rename = 'Upload' . date('Ymd') . $randomno;
    $newname = $rename . '.' . $extension;
    if (!array_key_exists($extension, $allowed)) {
        echo "File không đúng định dạng";
    } else if (empty($error)) {
        if (move_uploaded_file($_FILES['imgtintuc']['tmp_name'], './assets/img/news/' . $newname)) {
        } else {
        }
    }
    $dangtintuc = mysqli_query($conn, "INSERT INTO `tintuc`(`id_admin`, `tieude_tintuc`,`imgmota_tintuc`,  `noidung_tintuc`, `ngayviet_tintuc`, `theloai_tintuc`, `nguon_tintuc`) 
    VALUES ('$tacgia', '$tieude', '$newname', '$noidung',  '" . date('Y-m-d H:i:s') . "', '$theloai', '$nguon')");
    if (!$dangtintuc) {
        echo '<script> window.history.go(-1); alert ("Đăng tin tức thất bại");  </script>';
    } else {
        echo '<script> window.location.href = "./capnhattintuc.php"; alert ("Đăng tin tức thành công");  </script>';
    }
    mysqli_close($conn);
}
if (isset($_GET['action']) && $_GET['action'] == 'xoa') {
    $id_baibao = $_POST['id_baibao'];
    $xoabaibao = mysqli_query($conn, "DELETE FROM `tintuc` WHERE `id_tintuc`='$id_baibao'");
    if (!$xoabaibao) {
        echo '<script> window.history.go(-1); alert ("Xóa tin tức thất bại");  </script>';
    } else {
        echo '<script> window.location.href = "./capnhattintuc.php"; alert ("Xóa thành công");  </script>';
    }
    mysqli_close($conn);
}

?>
<title>Quản lý tin tức</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                <div class="row w-100">
                <div class="col-md-6 ml-0 mr-auto ">
                <h4><b><i>Cập nhật tin tức mới</i></b></h4>
                </div>
                <div class="col-md-6 mr-0 ml-auto text-right " >
                        <button type="button" class="btn " data-toggle="modal" data-target="#thembaibao">
                            <i class="fa fa-plus-circle fa-2x" style="color:blue;" aria-hidden="true"></i> <span style="font-size: 18px;">Thêm tin mới</span>
                        </button>
                </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="text-right mb-2">
                    </div>


                    <table id="newstable" class="table table-striped " style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:8%; ">Mã tin</th>
                                <th class="text-center" style="width:12%; ">Người viết</th>
                                <th class="text-center" style="width:30%; ">Tiêu đề</th>
                                <th class="text-center" style="width:10%; ">Nguồn</th>
                                <th class="text-center" style="width:10%; ">Từ khóa</th>
                                <th class="text-center" style="width:10%; ">Ngày viết</th>
                                <th class="text-center" style="width:10%; ">Cập nhật</th>
                                <th class="text-center" style="width:10%; ">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $shownews = mysqli_query($conn, "SELECT * FROM `tintuc` INNER JOIN `admin` ON admin.id_admin=tintuc.id_admin ORDER BY `id_tintuc` ASC");
                            while ($newss = mysqli_fetch_assoc($shownews)) {

                            ?>

                                <tr>
                                    <td class="canhgiua"><b>NS<?php echo sprintf('%04d', $newss['id_tintuc']); ?></b></td>
                                    <td class="canhgiua"><?php echo $newss['name_admin']; ?></td>
                                    <td class="canhgiua"><?php echo $newss['tieude_tintuc']; ?></td>
                                    <td class="canhgiua"><?php echo $newss['nguon_tintuc']; ?></td>
                                    <td class="canhgiua"><?php echo $newss['theloai_tintuc']; ?></td>
                                    <td class="canhgiua"><?php echo $newss['ngayviet_tintuc']; ?></td>
                                    <td class="canhgiua"><?php echo $newss['capnhat_tintuc']; ?></td>
                                    <td class="canhgiua">
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <button type="button" class="btn " data-toggle="modal" data-target="#suabaibao<?= $newss['id_tintuc']; ?>">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>

                                                </button>
                                                <div class="modal fade" id="suabaibao<?php echo $newss['id_tintuc']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="suabaibao<?php echo $newss['id_tintuc']; ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="suabaibao<?php echo $newss['id_tintuc']; ?>Label">Thêm bài báo mới</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $sqlshow = mysqli_query($conn, "SELECT * FROM `tintuc` WHERE `id_tintuc`='" . $newss['id_tintuc'] . "'");
                                                                $showtt = mysqli_fetch_assoc($sqlshow);
                                                                if (isset($_GET['action']) && $_GET['action'] == 'updatenews') {
                                                                    $tacgia = $_POST['tacgia'];
                                                                    $nguon = $_POST['nguon'];
                                                                    $theloai = $_POST['theloai'];
                                                                    $tieude = $_POST['tieude'];
                                                                    $noidung = $_POST['noidung'];
                                                                    if (isset($_FILES['imgtintuc'])) {
                                                                        $imgtintuc = $_FILES['imgtintuc']['name'];
                                                                        $allowed = array("" => "imgtintuc/", "jpg" => "imgtintuc/jpg", "jpeg" => "imgtintuc/jpeg", "gif" => "imgtintuc/gif", "png" => "imgtintuc/png");
                                                                        if (empty($imgtintuc)) {
                                                                            $newname = $showtt['imgmota_tintuc'];
                                                                        } else {
                                                                            $extension = pathinfo($imgtintuc, PATHINFO_EXTENSION);
                                                                            $randomno = rand(0, 100000);
                                                                            $rename = 'Upload' . date('Ymd') . $randomno;
                                                                            $newname = $rename . '.' . $extension;
                                                                            if (!array_key_exists($extension, $allowed)) {
                                                                                echo "File không đúng định dạng";
                                                                            } else if (empty($error)) {
                                                                                if (move_uploaded_file($_FILES['imgtintuc']['tmp_name'], './assets/img/news/' . $newname)) {
                                                                                } else {
                                                                                    echo "không up đc";
                                                                                }
                                                                            } else {
                                                                                echo "loi1";
                                                                            }
                                                                        }
                                                                    }
                                                                    $updatenew = mysqli_query($conn, "UPDATE `tintuc` SET `tieude_tintuc`='$tieude',`noidung_tintuc`='$noidung',`imgmota_tintuc`='$newname', `theloai_tintuc`='$theloai',`nguon_tintuc`='$nguon' WHERE `id_tintuc`='" . $newss['id_tintuc'] . "'");
                                                                    if (!$updatenew) {
                                                                        echo '<script> window.history.go(-1); alert ("Cập nhật thất bại");  </script>';
                                                                    } else {
                                                                        echo '<script> window.location.href = "./capnhattintuc.php"; alert ("Cập nhật thành công");  </script>';
                                                                    }
                                                                    mysqli_close($conn);
                                                                }
                                                                ?>
                                                                <form action="capnhattintuc.php?action=updatenews" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có chắc đăng bài đăng này?');">
                                                                    <input type="hidden" name="tacgia" id="tacgia" value="<?php echo $showtt['id_admin'] ?>">
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-md-1 text-right">
                                                                                <label for="theloai">Thể loại</label>
                                                                            </div>
                                                                            <div class="col-md-5 ">
                                                                                <input type="text" class="form-control" name="theloai" id="theloai" value="<?php echo $showtt['theloai_tintuc'] ?>">
                                                                            </div>
                                                                            <div class="col-md-1 text-right">

                                                                                <label for="nguon">Nguồn </label>
                                                                            </div>
                                                                            <div class="col-sm-5 col-md-5 ">
                                                                                <input type="text" class="form-control" name="nguon" id="nguon" value="<?php echo $showtt['nguon_tintuc'] ?>" placeholder="nhập nguồn nếu bạn lấy từ trang khác">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-1 text-right">
                                                                                <label for="tieude">Tiêu đề</label>
                                                                            </div>
                                                                            <div class="col-sm-10 col-md-11 ">
                                                                                <input type="text" class="form-control" name="tieude" id="tieude" placeholder="tieude" value="<?= $showtt['tieude_tintuc'] ?>" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-1">

                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                <?php $img = $showtt['imgmota_tintuc'];
                                                                                if (!empty($img)) { ?>

                                                                                    <img src="./assets/img/news/<?php echo $showtt['imgmota_tintuc'] ?>" alt="" class="img-thumbnail mb-2" id="show-img2" style="height: 200px;">
                                                                                <?php } else {
                                                                                    echo '<img src="./assets/img/news/bg_news.jpg" alt="" class="img-thumbnail mb-2" id="show-img2" style="height: 200px;">';
                                                                                }

                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-1">
                                                                                <label for="imgtintuc" class=" control-label">Ảnh mô tả</label>

                                                                            </div>
                                                                            <div class="col-md-11">
                                                                                <input type="file" class="form-control" onchange="loadFile2(event)" id="imgtintuc" name="imgtintuc">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group ">
                                                                        <div class="row ">
                                                                            <div class="col-md-1 text-right">

                                                                                <label for="noidung" class="control-label">Nội dung </label>
                                                                            </div>

                                                                            <div class="col-md-11">

                                                                                <textarea class="form-control ckeditor " id="noidung" name="noidung" required><?php echo $showtt['noidung_tintuc'] ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group text-right ">

                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                                    </div>

                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <center>
                                                    <form action="capnhattintuc.php?action=xoa" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có xóa bài này?');">
                                                        <input type="hidden" name="id_baibao" value="<?php echo $newss['id_tintuc']; ?>">
                                                        <button type="submit" class="btn"><i class="fa fa-trash-o" style="color:blue;" aria-hidden="true"></i></button>
                                                    </form>
                                                </center>

                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- thêm tin tức -->
<div class="modal fade" id="thembaibao" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="thembaibaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="thembaibaoLabel">Thêm bài báo mới</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="capnhattintuc.php?action=upnews" method="post" enctype="multipart/form-data" onSubmit="return confirm('Bạn có chắc đăng bài đăng này?');">
                    <input type="hidden" name="tacgia" id="tacgia" value="<?php echo $currentadmin['id_admin'] ?>">
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-md-1 text-right">
                                <label for="theloai">Thể loại</label>
                            </div>
                            <div class="col-md-5 ">
                                <input type="text" class="form-control" name="theloai" id="theloai" placeholder="nhập từ khóa ...">
                            </div>
                            <div class="col-md-1 text-right">

                                <label for="nguon">Nguồn </label>
                            </div>
                            <div class="col-sm-5 col-md-5 ">
                                <input type="text" class="form-control" name="nguon" id="nguon" placeholder="nhập nguồn nếu bạn lấy từ trang khác">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1 text-right">
                                <label for="tieude">Tiêu đề</label>
                            </div>
                            <div class="col-sm-10 col-md-11 ">
                                <input type="text" class="form-control" name="tieude" id="tieude" placeholder="tieude" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-1">

                            </div>
                            <div class="col-md-11">
                                <img src="./assets/img/news/bg_news.jpg" alt="" class="img-thumbnail mb-2" id="show-img" style="height: 200px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="imgtintuc" class=" control-label">Ảnh mô tả</label>

                            </div>
                            <div class="col-md-11">
                                <input type="file" class="form-control" onchange="loadFile(event)" id="imgtintuc" name="imgtintuc">
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="row ">
                            <div class="col-md-1 text-right">

                                <label for="noidung" class="control-label">Nội dung </label>
                            </div>

                            <div class="col-md-11">

                                <textarea class="form-control ckeditor " id="noidung" name="noidung" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-right ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                        <button type="submit" class="btn btn-primary">Đăng tin tức</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
<!-- sửa tin tức -->

<script src="../assets/resources/ckeditor/ckeditor.js"></script>
<script src="../assets/resources/ckfinder/ckfinder.js"></script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('show-img');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
    var loadFile2 = function(event) {
        var output = document.getElementById('show-img2');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<?php
include './footeradmin.php';

?>