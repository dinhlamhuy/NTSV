<?php include 'headeruser.php';
if (isset($_GET['action']) && $_GET['action'] == 'gopy') {
    $hoten = $_POST['hoten'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];

    $sql = "INSERT INTO `gopy`(`hoten`, `sdt`, `diachi`, `tieude_gopy`, `email`, `noidung`) VALUES ('$hoten', '$sdt', '$diachi', '$tieude', '$email', '$noidung')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<script> window.location.href = "./gopy.php"; alert ("Cám ơn bạn đã góp ý, Hệ thống sẽ rút kinh nghiệm và khắc phục!");  </script>';
    } else {
        echo '<script> window.history.go(-1); alert ("Rất tiếc bạn chưa gửi được!");  </script>';
    }
}
?>
<title>Góp ý - liên hệ</title>

<div class="container">

    <h2 class="text-center">Thông tin góp ý - phản hồi của bạn sẽ giúp chúng tôi phục vụ bạn ngày càng tốt hơn</h2>
    <hr>
    <div class="row ">


        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 "></div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
            <form action="gopy.php?action=gopy" method="POST" enctype="multipart/form-data" onSubmit="return confirm('Bạn chắc chắn muốn gửi?');">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="hoten">Họ tên (*): </label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group ">
                            <input type="text" class="form-control" name="hoten">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="sdt">Điện thoại (*): </label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="sdt">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="email">Email (*): </label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="diachi">Địa chỉ (*): </label>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="form-group">
                            <input type="text" class="form-control" name="diachi">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <label for="tieude">Tiêu đề (*): </label>
                    </div>
                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tieude">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label for="noidung">Nội dung chi tiết (*):</label>
                        <div class="form-group">
                            <textarea class="form-control" name="noidung" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>

                <center>
                    <div class="form-group ">
                        <button type="reset" class="btn btn-primary mx-2 px-4">Làm lại</button>
                        <button type="submit" class="btn btn-primary mx-2 px-4">Góp ý</button>
                    </div>
                </center>

            </form>
        </div>

    </div>

</div>


<?php include 'footer.php'; ?>