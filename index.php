<?php include 'headeruser.php'; ?>
<style>
    .main-text {
        position: relative;
        top: -150px;
        /* width: 100%; */
        color: #FFF;
        padding-left: 100px;


    }

    .btn-min-block {
        min-width: 170px;
        line-height: 26px;
    }

    .btn-clear {
        color: #FFF;
        background-color: transparent;
        border-color: #FFF;
        margin-right: 15px;
    }

    .btn-clear:hover {
        color: #000;
        background-color: #FFF;
    }

    .bg {

        /* opacity: 0.6; */
        vertical-align: middle;
        height: 100px;
        padding-top: 35px;
        color: #FFF;
        /* background-color: rgb(240, 240, 240); */
       background-color: rgba(0,0,0,0.5);
    }

    .content {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 3;
        /* number of lines to show */
        line-height: 1.4em;
        /* fallback */
        max-height: 4.2em;
        /* cái này phải = line-height x 2 */
    }
   
</style>
<title>Nhà Trọ Hòa An</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 px-0">
            <div id="carouselExampleControls" class="carousel slide  w-100 px-0" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/img/slide1.jpg" style="width:100% " class="d-block w-100" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/slide2.jpg" style="width:100% " class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="./assets/img/slide3.jpg" style="width:100% " class="d-block w-100" alt="Third slide">
                    </div>
                </div>
                <!-- <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                    </span></a> -->
            </div>
            <div class="main-text hidden-xs">

                <form action="timkiem.php" method="GET">
                    <div class="container-fluid">
                        <div class="row hg ">



                            <div class="col-md-2 bg" style="border-radius: 12px 0px 0px 12px;">
                                <div class="form-group " >
                                    <select name="chuyenmuc" id="chuyenmuc" class="form-control fg">
                                        <option selected disabled>--Chuyện mục---</option>
                                        <?php $chuyenmuc = mysqli_query($conn, "SELECT * FROM `chuyenmuc` ");
                                        while ($cm = mysqli_fetch_assoc($chuyenmuc)) {
                                            echo " <option value='" . $cm['id_chuyenmuc'] . "'>" . $cm['tenchuyenmuc'] . "</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 bg">

                                <div class="form-group ">

                                    <select name="tinh" id="tinh" class="form-control">
                                        <option selected disabled>--Tỉnh---</option>
                                        <?php $tinh = mysqli_query($conn, "SELECT * FROM `tinh`");
                                        while ($out = mysqli_fetch_assoc($tinh)) {
                                            echo "<option value='" . $out['tentinh'] . "'>" . $out['tentinh'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2 bg">
                                <div class="form-group">
                                    <select name="huyen" id="huyen" class="form-control">
                                        <option selected disabled>---Huyện---</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 bg">
                                <div class="form-group ">
                                    <select name="dientich" id="dientich" class="form-control">
                                        <option selected disabled>---Diện tích---</option>
                                        <option value="<20">Dưới 20m2</option>
                                        <option value="BETWEEN 20 AND 30">20m2 - 30m2</option>
                                        <option value="BETWEEN 30 AND 50">30m2 - 50m2</option>
                                        <option value="> 50">Trên 50m2</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2 bg">

                                <select name="gia" id="" class="form-control">
                                    <option selected disabled>---Giá---</option>

                                    <option value="< 1000000">Dưới 1 triệu</option>
                                    <option value="BETWEEN 1000000 AND 2000000">1 - 3 triệu</option>
                                    <option value="BETWEEN 5000000 AND 7000000"> 5- 7 triệu</option>
                                    <option value="BETWEEN 7000000 AND 10000000"> 7- 10 triệu</option>

                                    <option value="> 10000000">trên 10 triệu</option>
                                </select>
                            </div>
                            <div class="col-md-1 bg" style="border-radius: 0px 12px 12px 0px;">

                                <input type="submit" value="Tìm Kiếm" name="loc" class="btn btn-success">


                            </div>



                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="row " style="margin-top:-80px;">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <div class="row">

                <div class="card w-100 ">

                    <nav aria-label="breadcrumb w-100 bg-light">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><i class="fa fa-home"></i>&ensp;Trang chủ</li>
                        </ol>
                    </nav>

                    <div class="card-body">
                        Cho thuê phòng trọ, cho thuê nhà trọ, tìm phòng trọ
                    </div>
                </div>
                <?php
                //Nếu không có &per_page thì sẽ cho nó bằng 4 
                $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
                $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($current_page - 1) * $item_per_page;
                $sqli = "SELECT * FROM `baidang` INNER JOIN `chuyenmuc` ON `baidang`.`id_chuyenmuc`  = `chuyenmuc`.`id_chuyenmuc` INNER JOIN `user` ON `user`.`id_user`=`baidang`.`id_user` ORDER BY `lastupdate_post` DESC LIMIT " . $item_per_page . " OFFSET " . $offset;

                $sqlquery = mysqli_query($conn, $sqli);
                $tongsp = mysqli_query($conn, "SELECT * FROM `baidang`");
                $tongsp = $tongsp->num_rows;
                $tongtrang = ceil($tongsp / $item_per_page);

                while ($show = mysqli_fetch_assoc($sqlquery)) { ?>
                    <div class="card w-100 mt-2 mb-2 ">
                        <div class="card-body khungbaidang">

                            <div class="row">

                                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                    <center><img src="./assets/img/baidang/<?php echo $show['img_post'] ?>" class="thumbnail" style="height: 150px; width:270px;" alt=""></center>
                                </div>

                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            <a href="./chitietsp.php?id=<?php echo $show['id_post'] ?>">
                                                <h3 style="margin-top:0px;"  data-toggle="tooltip" data-placement="top" title="<?= $show['tieude'] ?>"><?php echo rutngannd($show['tieude'],42,'...') ?></h3>
                                            </a>
                                            <div><span style="color:red; font-size:15px;"><b>Giá: </b><?php echo number_format($show['gia']) ?> <b>VND/Tháng</b></span> &emsp;&emsp;
                                                <span><?php echo number_format($show['dientich']) ?> <span><b>m<sup>2</sup></b></span></span>
                                            </div>
                                            <span style="overflow: hidden;
                                                text-overflow: ellipsis;
                                                -webkit-line-clamp: 3;
                                                display: -webkit-box;
                                                line-height: 1.4em;
                                                -webkit-box-orient: vertical;  max-height: 4.2em;"><?php echo $show['mota'] ?></span><br>
                                        </div>




                                    </div>

                                    <span style="color:grey; font-size:10;"><?php echo " " . $show['huyen'] . ", " . $show['tinh'] . "" ?></span>
                                    <!-- <span style="color:grey; font-size:11;">Người đăng: <?php echo $show['fullname'] ?></span> -->

                                    <a href="savepost.php?id=<?php echo $show['id_post'] ?>"><?php
                                                                                                if (isset($_SESSION['current_user'])) {
                                                                                                    $bookmark = mysqli_query($conn, "SELECT * FROM `bookmark` WHERE `id_post`= '" . $show['id_post'] . "' AND `id_user`= '" . $user['id_user'] . "'");
                                                                                                    if (mysqli_num_rows($bookmark) > 0) {
                                                                                                        echo '<i class="fa fa-heart" aria-hidden="true" style="color:red; font-size:25px; top:0px; float:right;"></i>';
                                                                                                    } else {
                                                                                                        echo '<i class="fa fa-heart-o" aria-hidden="true" style="color:red; font-size:25px; top:0px; float:right;"></i>';
                                                                                                    }
                                                                                                ?></a>
                                <?php } elseif (!isset($_SESSION['current_user'])) { ?>
                                    <a href="./login.php"><i class="fa fa-heart-o" aria-hidden="true" style="color:red; font-size:25px; bottom:0px; float:right;"></i></a>
                                <?php }



                                ?>

                                </div>


                            </div>

                        </div>
                    </div>
                <?php
                } ?>

                <div class="mx-auto mb-lg-5 mt-lg-3">
                    <center>
                        <div class="">



                            <?php if ($current_page > 3) {
                                $first_page = 1; ?>
                                <a class="btn btn-light" href="?per_page=<?= $item_per_page ?>&page=<?php $first_page ?>">Firts</a>
                            <?php
                            }
                            if ($current_page > 1) {
                                $prev_page = $current_page - 1;
                            ?>
                                <a class="btn btn-light" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
                                <?php
                            }
                            for ($num = 1; $num <= $tongtrang; $num++) {
                                if ($num != $current_page) {
                                    if ($num > $current_page - 3 && $num < $current_page + 3) { ?>

                                        <a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>" class="btn btn-light"><?= $num ?></a>
                                    <?php }
                                } else { ?>
                                    <span class="btn btn-light active"><?= $num ?></span>

                                <?php }
                            }
                            if ($current_page < $tongtrang - 1) {
                                $next_page = $current_page + 1;
                                ?>
                                <a class="btn btn-light" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
                            <?php
                            }
                            if ($current_page < $tongtrang - 3) {
                                $end_page = $tongtrang; ?>
                                <a class="btn btn-light" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
                            <?php }
                            ?>
                        </div>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

    </div>
</div>








<?php include 'footer.php' ?>