<?php include 'headeruser.php';


if (!isset($_SESSION['current_user'])) {

    header("location:index.php");
}
$id = $_GET['id'];
$ht = mysqli_query($conn, " SELECT * FROM `baidang` WHERE `id_post`='" . $_GET['id'] . "' ");
$hienthi = mysqli_fetch_assoc($ht);

$error = false;
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    if (isset($_POST['tieude']) && !empty($_POST['tieude']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['lienhe']) && !empty($_POST['lienhe']) && isset($_POST['gia']) && !empty($_POST['gia'])) {
        $tieude = $_POST['tieude'];
        $chuyenmuc = $_POST['chuyenmuc'];
        $sl = $_POST['sl'];
        $gia = $_POST['gia'];
        $dientich = $_POST['dt'];
        $xa = $_POST['xa'];
        $huyen = $_POST['huyen'];
        $tinh = $_POST['tinh'];
        $diachi = $_POST['address'];
        $email = $_POST['email'];
        $lienhe = $_POST['lienhe'];
        $mota = $_POST['mota'];

        //hình đại diện
        if (isset($_FILES['anhsp'])) {
            $anhsp = $_FILES['anhsp']['name'];
            $allowed = array("" => "anhsp/", "jpg" => "anhsp/jpg", "jpeg" => "anhsp/jpeg", "gif" => "anhsp/gif", "png" => "anhsp/png");
            if (empty($anhsp)) {
                $newname = $hienthi['img_post'];
            } else {
                $extension = pathinfo($anhsp, PATHINFO_EXTENSION);
                $randomno = rand(0, 100000);
                $rename = 'baidang' . date('Ymd') . $randomno;
                $newname = $rename . '.' . $extension;

                if (!array_key_exists($extension, $allowed)) {
                    echo "File không đúng định dạng";
                } else if (empty($error)) {
                    if (move_uploaded_file($_FILES['anhsp']['tmp_name'], 'assets/img/baidang/' . $newname)) {
                    } else {
                        echo "không up đc";
                    }
                } else {
                    echo "loi1";
                }
            }
        }


        if (isset($_FILES['anhmota'])) {
            $anhmota = $_FILES['anhmota']['name'];
            $amt_type = $_FILES['anhmota']['type'];

            if ($amt_type == 'img/' || $amt_type == 'img/jpg' || $amt_type == 'img/png' || $amt_type == 'img/gif' || $amt_type == 'img/jpeg') {
                echo "File không đúng định dạng";
            } else if (empty($error)) {

                if (!empty($anhmota[0])) {
                    $xoaimgmota = mysqli_query($conn, "DELETE FROM `imgmota` WHERE `id_post`='$id'");

                    foreach ($anhmota as $key => $value) {

                        $ext = pathinfo($value, PATHINFO_EXTENSION);
                        $randomnos = $value;
                        $renames = 'upload' . date('Ymd') . $randomnos;
                        $newnames = $renames . '.' . $ext;
                        move_uploaded_file($_FILES['anhmota']['tmp_name'][$key], 'assets/img/anhmota/' . $newnames);
                    }
                    foreach ($anhmota as $key => $value) {
                        $ex = pathinfo($value, PATHINFO_EXTENSION);
                        $random = $value;
                        $doiten = 'upload'  . date('Ymd') . $random;
                        $anhmt = $doiten . '.' . $ex;
                        $imgmultiple = mysqli_query($conn, "INSERT INTO `imgmota`( `nameimg`, `id_post`) VALUES ('$anhmt', '$id') ");
                    }
                } else {
                }
            }
        }
        $sql = "UPDATE `baidang` SET `tieude`= '$tieude', `soluong`='$sl', `gia`='$gia', `dientich`='$dientich', `xa`='$xa', `huyen`='$huyen', `tinh`='$tinh', `diachi`='$diachi', `lienhe`='$lienhe', `email_post`='$email', `mota`='$mota', `img_post`='$newname', `id_chuyenmuc`='$chuyenmuc', `lastupdate_post`='" . date('Y-m-d H:i:s') . "' WHERE `id_post`='$id'";
        // var_dump($sql); die();
        $query = mysqli_query($conn, $sql);
        // $id_post = mysqli_insert_id($conn);

        if ($query) {
            echo '<script> window.location.href = "./trangcanhan.php"; alert ("Cập nhật bài đăng thành công");  </script>';
        } else {
            echo '<script>window.history.go(-1); alert ("That bai"); </script>';
        }
    }
}

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="http://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
<title>Sửa bài đăng</title>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-6">
            <div class="col-xs-12">
                <h2>Sửa đăng bài</h2>
                <hr>
                <form action="editbaidang.php?action=edit&id=<?= $id ?>" method="post" enctype="multipart/form-data">
                    <!-- <div class="form-group">
                       <input type="file" name="avatar" class="form-control">  
                    </div> -->
                    <?php $sqll = "SELECT * FROM " ?>
                    <div class="form-group">
                        <label for="tieude">Tiêu đề</label>
                        <input type="text" name="tieude" class="form-control" value="<?= $hienthi['tieude'] ?>" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="chuyenmuc">Chuyên mục</label>

                                <select name="chuyenmuc" class="form-control">
                                    <option value="1">Cho thuê</option>
                                    <option value="2">Tìm người ở ghép</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="lienhe">Liên Hệ</label>
                                <input type="text" name="lienhe" class="form-control" maxlength="11" placeholder="01234567899 or 84123456789" value="<?= $hienthi['lienhe'] ?>" pattern="[0-9]{10,11}" title="bắt đầu bằng số 84 và có 11 số " required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="gia">Giá phòng</label>
                                <div class="input-group">
                                    <input type="number" name="gia" min="100000" class="form-control" value="<?= $hienthi['gia'] ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">VND</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="dt">Diện tích</label>
                                <div class="input-group">
                                    <input type="number" name="dt" min="5" class="form-control" value="<?= $hienthi['dientich'] ?>" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><span>m<sup>2</sup></span></div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4">
                                <label for="sl">Số phòng</label>
                                <input type="number" name="sl" min="1" max="20" class="form-control" value="<?= $hienthi['soluong'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tinh">Tỉnh/Thành Phố</label>
                        <select name="tinh" id="tinh" class="form-control">
                            <!-- <option value="<?= $hienthi['tinh'] ?>"><?= $hienthi['tinh'] ?></option> -->

                            <?php
                            $tinh = mysqli_query($conn, "SELECT * FROM `tinh`");
                            while ($out = mysqli_fetch_assoc($tinh)) {
                                if ($out['tentinh'] == $hienthi['tinh']) {
                                    echo "<option value='" . $out['tentinh'] . "' selected>" . $out['tentinh'] . "</option>";
                                } else {
                                    echo "<option value='" . $out['tentinh'] . "'>" . $out['tentinh'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="huyen">Huyện/Quận</label>
                        <select name="huyen" id="huyen" class="form-control">
                            <option <?= $hienthi['huyen'] ?> selected><?= $hienthi['huyen'] ?></option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="xa">Xã/Phường</label>

                        <input type="text" name="xa" placeholder="Hòa An" class="form-control" value="<?= $hienthi['xa'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" placeholder="Số nhà 123, Đường xxxx" value="<?= $hienthi['diachi'] ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="user@gmail.com" value="<?= $hienthi['email_post'] ?>" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com">
                    </div>
                    <div class="form-group">
                        <div id="anhdaidien">
                            <img src="./assets/img/baidang/<?= $hienthi['img_post'] ?>" class="img-thumbnail" id="hienthianhdaidien" style="height:170px; max-width:250px;">
                        </div>
                        <label for="anhsp">Ảnh bài đăng (chỉ 1 ảnh)</label>
                        <input type="file" name="anhsp" class="form-control" id="imganhdien">


                    </div>
                    <div class="form-group">
                        <div class="row" id="preview">
                            <?php $imgmota = mysqli_query($conn, "SELECT * FROM `imgmota` WHERE `id_post`='" . $hienthi['id_post'] . "'");
                            while ($showimg = mysqli_fetch_assoc($imgmota)) { ?>
                                <div class="col-md-2 px-3 ">
                                    <img src="./assets/img/anhmota/<?= $showimg['nameimg'] ?>" class="img-thumbnail" style="height:170px; max-width:250px;"> &ensp; &ensp;
                                </div>

                            <?php }       ?>
                        </div>
                        <label for="anhmota">Ảnh mô tả (nhiều ảnh)</label><br>
                        <input type="file" name="anhmota[]" id="imgmota" class="form-control" multiple="multiple">
                    </div>
                    <div class="form-group">
                        <label for="mota">Mô tả chi tiết bài đăng</label>
                        <textarea name="mota" class="ckeditor"><?= $hienthi['mota'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" name="dangbai" class="btn btn-primary btn-lg" value="Đăng Bài">
                        <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Làm Lại">
                    </div>
                </form>

            </div>


        </div>
        <div class="col-md-4">

        </div>


    </div>

</div>


<script src="./assets/resources/ckeditor/ckeditor.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("pwd");
        var y = document.getElementById("repwd");

        if (x.type === "password" && y.type === "password") {
            x.type = "text";
            y.type = "text";

        } else {
            x.type = "password";
            y.type = "password";
        }
    }

    jQuery(document).ready(function($) {
        $("#tinh").change(function(event) {
            tinhID = $("#tinh").val();
            $.post('huyen.php', {
                "tentinh": tinhID
            }, function(data) {
                $("#huyen").html(data);
            });
        });
    });
    // var loadFileanhdaidien = function(event) {

    //     var output = document.getElementById('hienthianhdaidien');
    //     $('#hienthianhdaidien').removeClass('d-none');
    //     $('#hienthianhdaidien').addClass('d-print');
    //     output.src = URL.createObjectURL(event.target.files[0]);
    // };


    $('#imganhdien').change(function() {
        $("#anhdaidien").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#anhdaidien").append('<img src="' + window.URL.createObjectURL(this.files[i]) + '" class="img-thumbnail" style="height:170px; max-width:250px;"/>');
        }
    });
    $('#imgmota').change(function() {
        $("#preview").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#preview").append('<img src="' + window.URL.createObjectURL(this.files[i]) + '" class="img-thumbnail"  style="height:170px; max-width:250px;"/>');
        }
    });
</script>
<!-- jQuery -->

<?php include 'footer.php'; ?>