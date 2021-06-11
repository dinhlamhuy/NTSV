<?php include './headeruser.php';


if (!isset($_SESSION['current_user'])) {

    header("location:index.php");
}

$error = false;
if (isset($_GET['action']) && $_GET['action'] == 'addpro') {
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
        $latlong = $_POST['latlong'];
        $mota = $_POST['mota'];
        //hình đại diện
        if (isset($_FILES['anhsp'])) {
            $anhsp = $_FILES['anhsp']['name'];
            $allowed = array("" => "anhsp/", "jpg" => "anhsp/jpg", "jpeg" => "anhsp/jpeg", "gif" => "anhsp/gif", "png" => "anhsp/png");
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

        if (isset($_FILES['anhmota'])) {
            $anhmota = $_FILES['anhmota']['name'];
            $amt_type = $_FILES['anhmota']['type'];
            if ($amt_type == 'img/' || $amt_type == 'img/jpg' || $amt_type == 'img/png' || $amt_type == 'img/gif' || $amt_type == 'img/jpeg') {
                echo "File không đúng định dạng";
            } else if (empty($error)) {
                foreach ($anhmota as $key => $value) {
                    $ext = pathinfo($value, PATHINFO_EXTENSION);
                    $randomnos = $value;
                    $renames = 'upload' . date('Ymd') . $randomnos;
                    $newnames = $renames . '.' . $ext;
                    move_uploaded_file($_FILES['anhmota']['tmp_name'][$key], 'assets/img/anhmota/' . $newnames);
                }
            }
        }

        $sql = "INSERT INTO `baidang`(`tieude`, `soluong`, `gia`, `dientich`, `xa`, `huyen`, `tinh`, `diachi`, `lienhe`, `email_post`, `mota`, `img_post`, `id_chuyenmuc`, `id_user`,`latlng` , `post_time`) VALUES (
                                    '$tieude', '$sl', '$gia', '$dientich', '$xa', '$huyen', '$tinh', '$diachi', '$lienhe', '$email', '$mota', '$newname', '$chuyenmuc', " . $user['id_user'] . " ,'$latlong' , '" . date('Y-m-d H:i:s') . "')";

        $query = mysqli_query($conn, $sql);
        $id_post = mysqli_insert_id($conn);
        foreach ($anhmota as $key => $value) {
            $ex = pathinfo($value, PATHINFO_EXTENSION);
            $random = $value;
            $doiten = 'upload'  . date('Ymd') . $random;
            $anhmt = $doiten . '.' . $ex;
            $imgmultiple = mysqli_query($conn, "INSERT INTO `imgmota`( `nameimg`,  `id_post`) VALUES ('$anhmt', '$id_post') ");
        }
        if ($query && $imgmultiple) {
            echo '<script> window.location.href = "./trangcanhan.php"; alert ("Bạn đã thêm bài đăng thành công");  </script>';
        } else {
            echo '<script>alert ("That bai"); </script>';
            require_once './themsp.php';
        }
    }
}

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="http://cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
<style>
    .thum {
        border: 1px solid #000000;
        height: 150px;
        width: auto;
        margin-right: 10px;
        position: relative;
        z-index: 999;
        margin-left: 20px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .thum:hover {
        filter: brightness(0.5);
    }

    .time {
        position: absolute;
        margin-left: -23px;
        z-index: 999;
        cursor: pointer;
        background-color: #ce0122;
        color: white;
        margin-top: 10px;
        
    }
</style>
<title>Đăng bài mới</title>

<div class="container-fluid ">
    <div class="row mx-auto">
        <!-- <div class="col-md-1"></div> -->
        <div class="col-md-5 ml-auto mr-0">
            <div class="row">
                <div class="col-md-12 ">
                    <h2>Đăng bài</h2>
                    <hr>
                    <div class="alert alert-warning alert-dismissible fade show px-3 pt-3 pb-0  " role="alert">
                        <button class="btn btn-link p-0 border-0 out" onclick="getLocation()">Sử dụng vị trí hiện tại!</button> <span class="pl-3">Để có độ chính xác cao nhất.</span>

                        <p id="demo"></p>
                    </div>

                    <form action="themsp.php?action=addpro" method="post" enctype="multipart/form-data">
                        <!-- <div class="form-group">
                       <input type="file" name="avatar" class="form-control">  
                    </div> -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tinh">Tỉnh/Thành Phố</label>
                                    <select name="tinh" id="tinh" class="form-control">
                                        <option selected disabled>----Tỉnh----</option>
                                        <?php $tinh = mysqli_query($conn, "SELECT * FROM `tinh`");
                                        while ($out = mysqli_fetch_assoc($tinh)) {
                                            echo "<option value='" . $out['tentinh'] . "'>" . $out['tentinh'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="huyen">Huyện/Quận</label>
                                    <select name="huyen" id="huyen" class="form-control">
                                        <option selected disabled>----Huyện----</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="xa">Xã/Phường</label>

                                    <input type="text" name="xa" placeholder="Hòa An" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <input type="hidden" class="form-control" id="huyen_lat">

                            <input type="hidden" class="form-control" id="huyen_long">
                        </div>
                        <input type="hidden" name="latlong" class="form-control" id="latlong">
                        <div class="form-group">
                            <label for="address">Địa chỉ chính xác</label>
                            <input type="text" name="address" placeholder="Số nhà 123, Đường xxxx" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tieude">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="lienhe">Liên Hệ</label>
                                    <input type="text" name="lienhe" class="form-control" maxlength="11" placeholder="01234567899" pattern="[0-9]{9,10}" title="bắt đầu bằng số 84 và có 10 số " required>
                                </div>
                                <div class="col-md-8">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="user@gmail.com" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="chuyenmuc">Chuyên mục</label>

                            <select name="chuyenmuc" class="form-control">
                                <option value="1">Cho thuê</option>
                                <option value="2">Tìm người ở ghép</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="gia">Giá phòng</label>
                                    <div class="input-group">

                                        <input type="number" name="gia" min="100000" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">VND</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="dt">Diện tích</label>
                                    <div class="input-group">
                                        <input type="number" name="dt" min="5" class="form-control" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span>m<sup>2</sup></span></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <label for="sl">Số phòng</label>
                                    <input type="number" name="sl" min="1" max="20" class="form-control" required>
                                </div>
                            </div>
                        </div>





                        <!-- <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="user@gmail.com" pattern=".+@gmail.com" title="Email phải có đuôi @gmail.com">
                    </div> -->
                    <div id="anhdaidien"></div>
             
                    
                        <div class="form-group">
                            
                            <label for="anhsp">Ảnh bài đăng (chỉ 1 ảnh)</label>
                            <input type="file" name="anhsp" class="form-control" id="imganhdien">
                        </div>

                        <div class="form-group">
                        <div id="preview"></div>
                            <label for="anhmota">Ảnh mô tả (nhiều ảnh)</label>
                            
                            <input type="file" name="anhmota[]" id="imgmota" class="form-control" multiple="multiple" >
                        </div>
                        <div class="form-group">
                            <label for="mota">Mô tả chi tiết bài đăng</label>
                            <textarea name="mota" class="ckeditor"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="dangbai" class="btn btn-primary btn-lg" value="Đăng Bài">
                            <input type="reset" name="reset" class="btn btn-primary btn-lg" value="Làm Lại">
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <div class="col-md-5 pt-lg-5 mr-auto ml-0">
            <div id="map" class="w-100" style="height: 350px;"></div>

            <div class="alert alert-warning mt-lg-3" role="alert">
                <span>Lưu ý khi đăng tin</span>
                <ul>
                    <li>Nội dung phải viết bằng tiếng Việt có dấu</li>
                    <li>Tiêu đề tin không dài quá 100 kí tự</li>
                    <li>Các bạn nên điền đầy đủ thông tin vào các mục để tin đăng có hiệu quả hơn.</li>
                    <li>Để tăng độ tin cậy và tin rao được nhiều người quan tâm hơn, hãy sửa vị trí tin rao của bạn trên bản đồ bằng cách <strong>Nhấp chuột tại vị trí của bài đăng</strong>.</li>
                    <li>Tin đăng có hình ảnh rõ ràng sẽ được xem và gọi gấp nhiều lần so với tin rao không có ảnh. Hãy đăng ảnh để được giao dịch nhanh chóng!</li>
                </ul>
            </div>
        </div>
        <!-- <div class="col-md-1"></div> -->


    </div>

</div>

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>
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

    // $("#huyen").change(function() {
    //     var cntrol = $(this);

    //     var lat_huyen = document.getElementById('huyen_lat');
    //     var long_huyen = document.getElementById('huyen_long');

    //     lat_huyen.value = cntrol.find(':selected').data('lat');
    //     long_huyen.value = cntrol.find(':selected').data("long");


    // });
    var x = document.getElementById("demo");

    function getLocation() {
        var x = document.getElementById("demo");
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            x.innerHTML = "Geolocation không được hỗ trợ bởi trình duyệt này.";
        }
    }

    function showPosition(position) {

        const myLatlng = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        var latlong = document.getElementById("latlong");
        latlong.value = '{  "lat":' + position.coords.latitude + ', "lng":' + position.coords.longitude + ' }';
        alert(latlong.value);
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 14,
            center: myLatlng,

        });


        let infoWindow = new google.maps.InfoWindow({
            position: myLatlng,
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "You are here!"
        });

        infoWindow.setContent(
            JSON.stringify(myLatlng.toJSON(), null, 2)
        );
        infoWindow.open(map);

    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                x.innerHTML = "Người sử dụng từ chối cho xác định vị trí."
                break;
            case error.POSITION_UNAVAILABLE:
                x.innerHTML = "Thông tin vị trí không có sẵn."
                break;
            case error.TIMEOUT:
                x.innerHTML = "Yêu cầu vị trí người dùng vượt quá thời gian quy định."
                break;
            case error.UNKNOWN_ERROR:
                x.innerHTML = "Một lỗi xảy ra không rõ nguyên nhân."
                break;

        }
    }

    function initMap() {

        // var huyen_lat = document.getElementById("huyen_lat");
        // var huyen_long = document.getElementById("huyen_long");

        $("#huyen").change(function() {
            var x = document.getElementById("demo");
            var cntrol = $(this);

            var lat_huyen = document.getElementById('huyen_lat');
            var long_huyen = document.getElementById('huyen_long');

            lat_huyen.value = cntrol.find(':selected').data('lat');
            long_huyen.value = cntrol.find(':selected').data("long");


            const myLatlng = {
                "lat": parseFloat(lat_huyen.value),
                "lng": parseFloat(long_huyen.value)
            };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: myLatlng,
            });
            let markers = [];

            function addMarker(location) {
                const marker = new google.maps.Marker({
                    position: location,
                    map: map,
                });

                markers.push(marker);
            }


            function setMapOnAll(map) {
                for (let i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }
            // Create the initial InfoWindow.
            // let infoWindow = new google.maps.InfoWindow({
            //     // content: "Click the map to get Lat/Lng!",
            //     position: myLatlng,
            // });

            // infoWindow.open(map);
            // Configure the click listener.
            map.addListener("click", (mapsMouseEvent) => {
                // Close the current InfoWindow.
                // infoWindow.close();
                // Create a new InfoWindow.
                // infoWindow = new google.maps.InfoWindow({
                //     position: mapsMouseEvent.latLng,
                // });

                deleteMarkers();
                addMarker(mapsMouseEvent.latLng);
                // infoWindow.setContent(
                //     // JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)

                // );
                var latlongvt = document.getElementById("latlong");
                latlongvt.value = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                // infoWindow.open(map);
            });
        });


    }


    
</script>
<script>
 $('#imganhdien').change(function() {
        $("#anhdaidien").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#anhdaidien").append('<img src="' + window.URL.createObjectURL(this.files[i]) + '" class="img-thumbnail" style="height:170px; max-width:250px;"/>');
        }
    });

    $('#imgmota').change(function(){
        $("#preview").html('');
        for (var i = 0; i < $(this)[0].files.length; i++) {
            $("#preview").append('<img src="'+window.URL.createObjectURL(this.files[i])+'" class="img-thumbnail" style="height:170px; max-width:250px;"/>');
        }
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI9kPkskayYti5ttrZL_UfBlL3OkMEbvs&callback=initMap&libraries=&v=weekly" async></script>
<!-- jQuery -->


<?php include 'footer.php'; ?>