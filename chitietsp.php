<?php

include './headeruser.php';
?>
<style>
    body {
        margin: 0;
    }

    .imgpost {
        vertical-align: middle;

    }

    * {
        box-sizing: border-box;
    }

    /* Position the image khunghinh (needed to position the left and right arrows) */
    .khunghinh {
        position: relative;
        padding: 0px;
        margin: 0px;
        width: 100%;

    }

    /* Hide the images by default */
    .trinhchieu {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* toi & luiious buttons */
    .lui,
    .toi {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
        /* background-color: rgba(0, 0, 0, 0.8); */
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Position the "next button" to the right */
    .toi {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .lui:hover,
    .toi:hover {
        background-color: rgba(0, 0, 0, 0.8);
        text-decoration: none;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: white;
        font-size: 16px;
        padding: 8px 12px;
        position: absolute;
        bottom: 200px;
        right: 0px;
        font-weight: bold;

    }

    /* khunghinh for image text */
    .caption-khunghinh {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .rw {
        vertical-align: middle;
    }

    .rw:after {
        content: "";
        display: table;
        clear: both;

    }


    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }

    .modal {
        display: none;

        position: fixed;

        z-index: 1;

        left: 30%;
        top: 10%;
        width: 500px;

        height: 600px;

        overflow: 500px;

        background-color: wheat;

        padding: auto auto;

    }

    .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
    }

    @-webkit-keyframes animatezoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes animatezoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }

    .modal-content {
        background-color: #fefefe;
        margin: 0;
        /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 100%;
        height: 100%;
        /* Could be more or less, depending on screen size */
    }

    .btn1 {
        margin-left: 20px;
        margin-right: 150px;
        padding: 12 40px;
    }

    .btn2 {
        margin-left: 20px;
        margin-right: 20px;
        padding: 12 40px;
    }
</style>

<div class="container-fluid">

    <div class="row mx-auto">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

            <div class="card w-100">
                <div class="card-header">
                    <a href="./index.php"><i class="fa fa-home"></i> Trang ch???</a> / Chi ti???t b??i ????ng
                </div>
                <div class="card-body">

                    <?php

                    if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $idpost = $_GET['id'];

                        $anhsp = "SELECT * FROM `baidang` INNER JOIN `user`  ON baidang.id_user = user.id_user INNER JOIN `imgmota` ON baidang.id_post = imgmota.id_post   WHERE baidang.id_post ='" . $_GET['id'] . "' ";

                        $img = mysqli_query($conn, $anhsp);
                        if (mysqli_num_rows($img)) {
                            $out = mysqli_fetch_assoc($img);

                            $slphong = $out['soluong'];
                            $latlon = $out['latlng'];
                            $latlon = trim($latlon);


                            $latlong = str_replace(array('{', '"lat":', ' "lng":', '}'), array('', '', '', ''), $latlon);
                            $latlong = trim($latlong);
                           


                    ?>
                            <title><?= $out['tieude']; ?></title>

                            <?php



                            $img2 = mysqli_query($conn, $anhsp);
                            $soluonganh = mysqli_num_rows($img2);
                            $i = 1;
                            // var_dump($soluonganh); exit();
                            $j = 1;
                            $thumimg = mysqli_query($conn, $anhsp);
                            $w = 100 / ($soluonganh + 1);
                            ?>
                            <div class="container-fluid w-100">
                                <div class="row w-100 m-0 ">
                                    <div class="col-md-12 ">

                                        <div class="khunghinh bg-dark w-100">
                                            <div class="trinhchieu">
                                                <center><img src="./assets/img/baidang/<?= $out['img_post'] ?>" class="imgpost" style="max-width:100%; height:450px;">
                                                </center>
                                                <div class="numbertext text-light"><?php echo  $i++ . '/' .  ($soluonganh + 1) ?></div>
                                            </div>
                                            <?php while ($showimgmota = mysqli_fetch_assoc($img2)) { ?>

                                                <div class="trinhchieu">
                                                    <center><img src="./assets/img/anhmota/<?= $showimgmota['nameimg'] ?>" class="imgpost" style="max-width:100%; height:450px;">
                                                    </center>
                                                    <div class="numbertext  text-light"><?php echo  $i++ . '/' .  ($soluonganh + 1) ?></div>
                                                </div>
                                            <?php } ?>



                                            <a class="lui" onclick="plusSlides(-1)">???</a>
                                            <a class="toi" onclick="plusSlides(1)">???</a>

                                            <div class="caption-khunghinh w-100 mx-0">
                                                <p> <?= $out['tieude'] ?> </p>
                                                <p> <?= number_format($out['gia']) ?> VND/th??ng</p>
                                            </div>

                                            <div class="row rw   ">


                                                <div class="col-md-12 ">
                                                    <div style=" float:left; border:1px solid #6c757d;  width:<?= $w ?>%;">
                                                        <img class="demo cursor imgpost" src="./assets/img/baidang/<?= $out['img_post'] ?>" style="width:100%; height:120px;" onclick="currentSlide(<?= $j++ ?>)">
                                                    </div>
                                                    <?php

                                                    while ($thumbnail = mysqli_fetch_assoc($thumimg)) { ?>
                                                        <div style=" float:left;  border:1px solid #6c757d;  width:<?= $w ?>%;">
                                                            <img class="demo cursor imgpost" src="./assets/img/anhmota/<?= $thumbnail['nameimg'] ?>" style="width:100%; height:120px;" onclick="currentSlide(<?= $j++ ?>)">
                                                        </div>
                                                    <?php } ?>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <br>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <h2><?php echo $out['tieude'] ?></h2>
                                            </li>
                                            <li class="list-group-item"><b><?php echo "Gi??: " . number_format($out['gia']) . ""; ?> ?? VND/Th??ng </b></li>
                                            <li class="list-group-item"><b>S??? L?????ng ph??ng cho thu??: </b><?php echo $out['soluong'] ?> ph??ng</li>
                                            <li class="list-group-item"><b>?????a ch???: </b><?php echo  $out['diachi'] . ", " . $out['xa'] . ", " . $out['huyen'] . ", " . $out['tinh']  ?></li>
                                            <li class="list-group-item"><b>Email: </b><?php echo  $out['email_post'] ?></li>

                                            <li class="list-group-item"><b>M?? T??? chi ti???t: </b><br><?php echo $out['mota'] ?></li>

                                            <li class="list-group-item">
                                                <h5><b>B???n ?????</b></h5>
                                                <iframe src="https://maps.google.com/maps?q=<?php echo $latlong ?>&z=14&amp;output=embed" width="550" height="450" style="border:0" loading="lazy" allowfullscreen></iframe>
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </div>




                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <div class="card">
                <div class="card-body mx-auto">


                    <h3>B??i Vi???t c???a:</h3>
                    <center>

                        <img src="./assets/img/user/<?php echo $out['avatar'] ?>" alt="..." style="max-height: 100px; width:100px;" class="rounded-circle">
                        <h1><?php echo $out['fullname'] ?></h1>
                    </center>
                    <div class="row mx-auto">

                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 mx-auto ">
                            <center>
                                <form onsubmit="return false" id="formtn" method="post">

                                    <?php if (isset($user)) {
                                        $_SESSION['id_to'] = $out['id_user'];
                                        echo '<input type="hidden" name="nguoigui" id="nguoigui" value="' . $user['id_user'] . '">';
                                    } else {
                                    } ?>
                                    <input type="hidden" name="nguoinhan" id="nguoinhan" value="<?= $out['id_user'] ?>">
                                    <input type="hidden" name="baidang" id="baidang" value="<?= $out['id_post'] ?>">
                                    <button class="btn btn-success w-100" id="chatchutro">Chat v???i ch??? tr???</button>
                                </form>

                                <!-- <p class="btn btn-success w-100"><span class="fa fa-phone-alt"></span>Chat v???i ch??? tr???</p> -->
                            </center>
                        </div>

                        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 mx-auto w-100">
                            <center>

                                <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-warning mx-auto w-100">?????t Ph??ng Tr?????c</button>
                            </center>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">

                            <center>

                                <p class="btn btn-success w-100"><i class="fa fa-phone" aria-hidden="true"></i> : <?php echo $out['lienhe'] ?></p>
                            </center>
                        </div>
                    </div>

                    <br><br>
                    <hr>

                    <div class="card ">

                        <div class="card-header">
                            <h4><b>B??i ????ng m???i nh???t c???a <?php echo $out['fullname'] ?></b></h4>
                        </div>
                    </div>
                    <?php $lienquan = mysqli_query($conn, "SELECT * FROM `baidang` INNER JOIN `user` ON baidang.id_user = user.id_user WHERE user.id_user='" . $out['id_user'] . "' ORDER BY `post_time` DESC LIMIT 2 ");
                            while ($row = mysqli_fetch_assoc($lienquan)) { ?>

                        <div class="card w-100">
                            <div class="card-body">
                                <center><img src="./assets/img/baidang/<?php echo $row['img_post'] ?>" style="height:150px; max-width:100%;" alt=""></center>
                                <hr>
                                <a href="./chitietsp.php?id=<?php echo $row['id_post'] ?>">
                                    <p><b><?php echo $row['tieude'] ?></b></p>
                                </a>
                                <p><b>Gi??: <?php echo number_format($row['gia']) ?> VND/Th??ng</b></p>
                                <p><?php echo $row['huyen'] . ', ' . $row['tinh'] ?></p>

                            </div>
                        </div>
                    <?php }
                    ?>



                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <?php include 'footer.php'; ?>
</div>



<?php }


                        if (isset($_GET['action']) && $_GET['action'] == 'datphong') {

                            $tendk = $_POST['tendk'];
                            $gt = $_POST['gioitinh'];
                            $nghenghiep = $_POST['nghenghiep'];
                            $ns = $_POST['ns'];
                            $email = $_POST['email'];
                            $sdt = $_POST['sdt'];
                            $sothang = $_POST['sothang'];
                            $sophong = $_POST['sophong'];
                            $tentochuc = $_POST['tentochuc'];
                            $ochung = $_POST['ochung'];

                            $thunuoi = $_POST['thunuoi'];

                            $sqldk = "INSERT INTO `datphong`(`tendk`, `gt`, `ns`, `sdt`, `email`, `id_post`, `dkotheothang`, `sophongdk` , `nghenghiep`,`tentochuc`, `ochungkhacgt`, `thunuoi`, `trangthai`, `noidung`) 
                VALUES ('$tendk', '$gt', '$ns', '$sdt', '$email', '$idpost', '$sothang', '$sophong', '$nghenghiep', '$tentochuc', '$ochung', '$thunuoi', 'Ch??a xem', '?????t ph??ng tr?????c')";
                            $querydk = mysqli_query($conn, $sqldk);

                            if (!$querydk) {
                                var_dump($sqldk);
                            } else {
                                echo '<script> window.location.href = "./chitietsp.php?id=' . $_GET['id'] . '"; alert ("B???n ???? ?????t ph??ng th??nh c??ng");  </script>';
                            }
                        }

?>
<div id="id01" class="modal" style="z-index: 99;">

    <form class="modal-content animate" action="chitietsp.php?action=datphong&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">



        <div class="container">
            <br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="tendk"><b>T??n ????ng k??</b></label>
                                <input type="text" class="form-control" name="tendk" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gioitinh"><b>Gi???i t??nh</b></label>
                                
                                <select name="gioitinh" id="gioitinh" class="form-control" required>
                                   
                                    <option value="Kh??c">Kh??c</option>
                                    <option value="Nam">Nam</option>
                                    <option value="N???">N???</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                            <label for="nghenghiep"><b>Ngh??? Nghi???p</b></label>
                                <select name="nghenghiep" id="nghenghiep" class="form-control" required>
                                    <option selected disabled>--Ch???n ngh??? nghi???p--</option>
                                    <option value="??i L??m">??i L??m</option>
                                    <option value="Sinh Vi??n">Sinh Vi??n</option>
                                    <option value="H???c Sinh">H???c Sinh</option>
                                </select>
                            </div>

                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                            <label for="ns"><b>Ng??y, Th??ng, N??m sinh</b></label>
                                <input type="date" class="form-control" name="ns" min="1980-01-01" max="2005-31-12" required>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tentochuc"><b>T??n C??ng ty/ tr?????ng h???c</b></label>
                                <input type="text" class="form-control" name="tentochuc" id="tentochuc" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tendk"><b>S??? ??i???n Tho???i</b></label>
                            <div class="form-group">
                                <input type="tel" class="form-control" name="sdt" maxlength="11" pattern="[0-9]{10,11}" title="b???t ?????u b???ng s??? 84 v?? c?? 11 s??? " required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="tendk"><b>Email</b></label>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" pattern=".+@gmail.com" title="Email ph???i c?? ??u??i @gmail.com" required>
                            </div>
                        </div>
                    </div>
                    <div class="container-fulid">

                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                <label for="sothang"><b>B???n d??? ?????nh ??? m???y th??ng</b></label>
                                    <input type="number" class="form-control" min="1" name="sothang" required>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="sophong"><b>S??? ph??ng</b></label>
                                <div class="form-group">
                                    <input type="number" class="form-control" min="1" max="<?php echo $out['soluong'];
                                                                                        } ?>" name="sophong" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fulid">
                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="ochung">Nam/N??? c?? ??? chung kh??ng?</label>
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="radio" name="ochung" id="ochungyes" value="c??"> C??</label>
                                    <label class="checkbox-inline"><input type="radio" name="ochung" id="ochungno" value="Kh??ng" checked> Kh??ng</label>
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="thuvung">C?? nu??i th?? c??ng kh??ng?</label>
                                <div class="form-group">
                                    <label class="checkbox-inline"><input type="radio" name="thunuoi" id="nuoithu1" value="c??"> C??</label>
                                    <label class="checkbox-inline"><input type="radio" name="thunuoi" id="nuoithu2" value="Kh??ng" checked> Kh??ng</label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="form-group nut">
                        <input type="submit" class="btn1 btn btn-warning" name="dattruoc" style="float:right;" value="????ng k??" required>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" style="float:right;" class="btn2 btn btn-warning cancelbtn">Cancel</button>
                    </div>

                </div>



                <br>

            </div>
        </div>



    </form>
</div>





<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function trochuyen() {
        $id_gui = $(' #nguoigui').val();
        $id_nhan = $('#nguoinhan').val();
        $id_baidang = $('#baidang').val();

        $.ajax({
            url: 'chat_ketnoi.php', // ???????ng d???n file x??? l??
            type: 'POST', // ph????ng th???c
            // d??? li???u
            data: {
                id_from: $id_gui,
                id_to: $id_nhan,
                baidang: $id_baidang

            },
            success: function() {

                window.location.href = 'chat.php';
            }
        });
    }
    $('#chatchutro').click(function() {
        trochuyen();

    });
</script>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("trinhchieu");
        var dots = document.getElementsByClassName("demo");
        // var captionText = document.getElementById("caption");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        // captionText.innerHTML = dots[slideIndex - 1].alt;
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI9kPkskayYti5ttrZL_UfBlL3OkMEbvs&callback=initMap&libraries=&v=weekly" async></script>