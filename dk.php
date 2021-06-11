
<?php include 'headeruser.php';
    	if(isset($_SESSION['current_user'])){
            header("location: index.php");
      }
    $error=false;
    if (isset($_GET['action']) && $_GET['action'] == 'register'){
        if (isset ($_POST['username']) && !empty($_POST['username']) && isset($_POST['mk']) && !empty($_POST['mk']) && $_POST['mk'] == $_POST['remk']){
        $username=$_POST['username'];
        $password=md5($_POST['mk']);
        $re_password=md5($_POST['remk']);
        $fullname=$_POST['fullname'];
        $gioitinh=$_POST['gt'];
        $ns=$_POST['ns'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $address=$_POST['address'];
        $avatar=$_FILES['avatar']['name'];
        $allowed = array("" => "avatar/", "jpg" => "avatar/jpg", "jpeg" => "avatar/jpeg", "gif" => "avatar/gif", "png" => "avatar/png");
        $extension = pathinfo($avatar, PATHINFO_EXTENSION);
        $randomno = rand(0, 100000);
        $rename = 'Upload' . date('Ymd') . $randomno;
        $newname = $rename . '.' . $extension;
        
        
        if (!array_key_exists($extension, $allowed)) {
            echo "File không đúng định dạng";
        } else if (empty($error)){
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], 'assets/img/user/' . $newname)) {                 
            } else{

            }
        }
        $sql="INSERT INTO `user`(`username`, `fullname`, `userpassword`, `sex`, `date_of_birth`,`address`, `email`, `phone`, `avatar`, `cretime_user`) VALUES
            ('$username', '$fullname', '$password', '$gioitinh', '$ns','$address', '$email', '$tel', '$newname', '". date('Y-m-d H:i:s'). "') ";
            $result=mysqli_query($conn, $sql);
           
        if(!$result){
            if (strpos(mysqli_error($conn), "Duplicate entry") !== FALSE) {
                $error= "Tài khoản đã tồn tại. Bạn vui lòng chọn tài khoản khác.";
            }
        }
        mysqli_close($conn);
        if ($error !== false) { ?>
       
       <div class="container">
           
           <div id="error-notify" class="col-md-6" >
               <br>
               <h1>Thông báo</h1>
               <h4><?= $error ?></h4>
               <a href="./dk.php">Quay lại</a>
           </div>
           <div class="col-md-6">
                   <br>
                   <img src="./assets/img/infographic.png" height="90%" width="90%" alt="">
               </div>
       </div>
       
        <?php } else { ?>
           
           <div class="container">
               <div class="row">
               <div d class="col-md-7" >
                   <br>
                   <h1><?= ($error !== false) ? $error : "Đăng ký tài khoản thành công" ?></h1>
                   <a href="./login.php">Mời bạn đăng nhập</a>
               </div>
               <div class="col-md-5">
                   <br>
                   <img src="./assets/img/infographic.png" height="100%" width="100%" alt="">
               </div>
               </div>
           </div>
           
        <?php } ?>
        <?php } else { ?>
            <div class="container">
        <div id="edit-notify" class="col-md-6 ">
            <br>
            <?php if ($_POST['mk'] != $_POST['remk']){
                echo "<script> window.history.go(-1); alert('mật khẩu không trùng khớp');</script>";

            }?>
            <h1>Vui lòng nhập đủ thông tin để đăng ký tài khoản</h1>
            <a href="./dk.php">Quay lại đăng ký</a>
        </div>
        <div class="col-md-6">
                   <br>
                   <img src="./assets/img/infographic.png" height="90%" width="90%" alt="">
               </div>
           </div>
           
        <?php
            }
        } else {
            ?>
            

    

<style>
    .container-bg{
        background-color: white;
    }
</style>

<title>Đăng ký thành viên</title>

<div class="container container-bg">
    <div class="row ld">
        <div class="col-md-6 " >
            <div class="col-md-12">
            <h2>Đăng ký thành viên</h2>
            <hr>  
                <form action="./dk.php?action=register" method="post"  enctype="multipart/form-data" onsubmit="return check()">
                    <div class="form-group">
                    <div id="anhdaidien">
                    </div>
                       <input type="file" name="avatar" id="imgdaidien" class="form-control">  
                    </div>
                    <div class="form-group">                
                       <label for="fullname">Fullname</label>
                                   
                       <input type="text" name="fullname" class="form-control"   required>
                    </div>
                    <div class="form-group">                
                        <label for="username">Username</label>
                        <input type="text" name="username"  class="form-control" required>
                    </div>
                    <div class="form-group">                
                        <label for="mk">Password</label>
                        <input type="password" name="mk" id="pwd" class="form-control" maxlength="16" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                    <div class="form-group">                
                       <label for="remk">Nhập lại Password</label>
                       <input type="password" name="remk" id="repwd" class="form-control" required>
                    </div>
                    <div class="form-group">                
                        <input type="checkbox" onclick="myFunction()"> Show Password
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6">
                        <input type="date" min="1900-12-31" max="2020-01-01" name="ns" value="1999-12-07" class="form-control" >
                        </div>
                        <div class="col-md-6">
                            <label class="btn">
                                <input type="radio" name="gt" value="Nam"> Nam 
                            </label>             
                            <label class="btn  ">
                                <input type="radio" name="gt" value="Nữ"> Nữ 
                            </label>             
                            <label class="btn ">
                                <input type="radio" name="gt" value="Khác" checked> Khác 
                            </label>             
                        </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address"  class="form-control" placeholder="Sóc Trăng" >
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"  class="form-control" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com" >
                    </div>
                    <div class="form-group">
                        <label for="tel">Số điện thoại</label>
                        <input type="text" name="tel"  class="form-control" maxlength="11" maxlength="11" pattern="[0-9]{10,11}"
                            title="bắt đầu bằng số 84 và có 11 số " required>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="dangky" class="btn btn-primary btn-lg" value="Đăng ký"> &ensp;
                       <a href="./login.php"> Bạn đã có tài khoản? Đăng nhập</a>
                    </div>
                </form>
                       
            </div>
        </div>
               <div class="col-md-6">
                   <br>
                   <img src="./assets/img/infographic.png" height="90%" width="90%" alt="">
               </div>

            </div>

            <?php
        }
        ?>

        </div>
        
        <script type="text/javascript">
             function check() {
            var x = document.getElementById("pwd").value;
            var y = document.getElementById("repwd").value;
            if (x != y) {
                alert("mật khẩu không trùng khớp");
                return false;
            } else {
                return true;
            }
        }
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
          

        </script>
        <div class="container-fluid">
<div class="card w-100">
      <div class="card-body" style="background-color: #3E7867; color:white;">
           
           <div class="container ">
               <center><h3><b>Hỗ trợ khách hàng</b></h3></center>
               <div class="row">                  
                  <div class="col-md-6 col-sm-6 col-md-6 col-lg-6">
                      <h3><b>Giới thiệu:</b></h3>
                      <p>Trang web nhatrosvha489.com giúp cho mọi người có thể tìm thấy nhà trọ ưng ý.</p>
                      <a href="https://www.facebook.com/"><i class="fa fa-facebook-official fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://www.youtube.com/"><i class="fa fa-youtube-square fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x" style="color:white;" aria-hidden="true"></i></a>
                  </div>
                  <div class="col-md-6 col-sm-6 col-md-6 col-lg-6">
                  <h3>Địa chỉ:</h3>
                  <p><i class="fa fa-map-marker fa-1x" aria-hidden="true"></i>: Trường đại học Cần Thơ, khu Hòa An, huyện Phụng Hiệp, Tỉnh Hậu Giang</p>
                  <p><i class="glyphicon glyphicon-phone-alt"></i> : +(84) 336 644 594 - (+84) 396 325 396</p>
                  <p><i class="glyphicon glyphicon-envelope"></i> : nhatrosinhvienhoaan@gmail.com</p>
                  </div>                 
               </div>              
           </div>           
      </div>
      <div class="card-footer" style="background-color: #003300; color:whitesmoke">
      <center><b>&copy; 2020 Copyright: nhatrosvha.com</b></center>
            
        </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="admin/assets/js/dataTables/jquery.dataTables.js"></script> -->
<script>
$('#imgdaidien').change(function() {
        $("#anhdaidien").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#anhdaidien").append('<center><img src="' + window.URL.createObjectURL(this.files[i]) + '" class="rounded-circle mb-3 mx-auto text-center" style="height: 250px; width:250px;"/></center>');
        }
    });
</script>
</body>

</html>
