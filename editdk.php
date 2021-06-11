<?php include 'headeruser.php';

$error = false;

$hienthi = mysqli_query($conn, " SELECT * FROM `user` WHERE `id_user`='" . $user['id_user'] . "'");

$xuat = mysqli_fetch_assoc($hienthi);
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    $fullname = $_POST['fullname'];
    $gioitinh = $_POST['gt'];
    $ns = $_POST['ns'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];



    $avatar = $_FILES['avatar']['name'];
    $allowed = array("" => "avatar/", "jpg" => "avatar/jpg", "jpeg" => "avatar/jpeg", "gif" => "avatar/gif", "png" => "avatar/png");
    if (empty($avatar)) {
        $newname = $xuat['avatar'];
    } else {
        $extension = pathinfo($avatar, PATHINFO_EXTENSION);
        $randomno = rand(0, 100000);
        $rename = 'Upload' . date('Ymd') . $randomno;
        $newname = $rename . '.' . $extension;

        if (!array_key_exists($extension, $allowed)) {
            echo "File không đúng định dạng";
        } else if (empty($error)) {
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/img/user/' . $newname)) {
            } else {
            }
        }
    }
    $sqluser1 = "UPDATE `user` SET   `fullname`='$fullname', `sex`='$gioitinh', `date_of_birth`='$ns', `address`='$address',
                            `email`='$email', `phone`='$tel', `avatar`='$newname' ,`lastupdate_user`='" . date('Y-m-d H:i:s') . "' WHERE `id_user`='" . $_GET['id'] . "'";

    $result = mysqli_query($conn, $sqluser1);
    if (!$result) {
        echo '<script> window.history.go(-1); alert ("Cập nhật tài khoản thất bại");  </script>';
    } else {
        echo '<script> window.location.href = "./trangcanhan.php"; alert ("Cập nhật tài khoản thành công");  </script>';
    }
    mysqli_close($conn);
} ?>






<title>Chỉnh sửa thông tin</title>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="col-md-12">
                <h2>Chỉnh sửa thông tin thành viên</h2>
                <hr>
                <form action="./editdk.php?action=edit&id=<?= $user['id_user'] ?>" method="post" autocomplete="off" enctype="multipart/form-data">

                    <div class="form-group">

                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <a href="#" class="thumbnail">
                                <img src="./assets/img/user/<?= $xuat['avatar'] ?>" id="show-img" style="height: 150px; max-width:250px;" alt="">
                            </a>
                        </div>

                        <input type="file" name="avatar" id="avatar" class="form-control" onchange="loadFile(event)">
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" name="fullname" class="form-control" value="<?= $xuat['fullname'] ?>" required>
                    </div>


                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="ns">Ngày tháng năm sinh</label>
                                <input type="date" min="1900-12-31" max="2020-01-01" name="ns" value="<?= $xuat['date_of_birth'] ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="gt">Giới Tính</label><br>
                                <label class="btn">
                                    <input type="radio" name="gt" value="nam"> Nam
                                </label>
                                <label class="btn  ">
                                    <input type="radio" name="gt" value="nu"> Nữ
                                </label>
                                <label class="btn ">
                                    <input type="radio" name="gt" value="khac" checked> Khác
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <select name="address" class="form-control">
                            <option value="<?php echo $xuat['address'] ?>" selected><?php echo $xuat['address'] ?></option>
                            <option value="Hậu Giang">Hậu Giang</option>
                            <option value="Sóc Trăng">Sóc Trăng</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="An Giang">An Giang</option>
                            <option value="Bạc Liêu">Bạc Liêu</option>
                            <option value="Cà Mau">Cà Mau</option>
                            <option value="Vĩnh Long">Vĩnh Long</option>
                            <option value="Kiên Giang">Kiên Giang</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $xuat['email'] ?>" class="form-control" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="tel">Số điện thoại</label>
                        <input type="text" name="tel" class="form-control" value="<?php echo $xuat['phone'] ?>" maxlength="11" maxlength="11" pattern="[0-9]{10,11}" title="bắt đầu bằng số 84 và có 11 số " required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-lg" value="Đăng ký"> &ensp;

                    </div>
                </form>

            </div>


        </div>
        <div class="col-md-2">

        </div>

    </div>

</div>
<script>
     var loadFile = function(event) {
    var output = document.getElementById('show-img');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
  

  
  $(document).ready(function(){
		    $("input[type='image']").click(function() {
	    		$("input[id='files']").click();
			});
	 	});	    				


  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {
      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader(); //biến hiện images ra   
      // Closure to capture the file information.
      reader.onload = (function(theFile) {
          return function(e) {
            // render thumbnail.
            var span = document.createElement('span');
            span.innerHTML = ['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '"/>', '<i class="fa fa-times time " ></i>'].join('');
            document.getElementById('previewImg').insertBefore(span, null); //chèn images vào span dựng sẵn có ID previewImg

          };
        })
        (f);
      // Read in the image file as a data URL.     
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
  //hàm xóa
  $(document).on('click', ".time", function() {
    if (confirm("Bạn Có Muốn Xóa ?")) {
      $(this).closest("span").fadeOut();
      $("#files").val(null); //xóa tên của file trong input
    } else
      return false;
  });

</script>

<!-- jQuery -->
<?php include 'footer.php'; ?>