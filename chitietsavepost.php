<?php include 'headeruser.php';
?>
<title>Lưu bài đăng</title>
<div class="row">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="row">
            <?php
            //Nếu không có &per_page thì sẽ cho nó bằng 4 
            $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
            $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($current_page - 1) * $item_per_page;
            $sqli = "SELECT * FROM `baidang`  INNER JOIN `user` ON `user`.`id_user`=`baidang`.`id_user` INNER JOIN `bookmark` ON bookmark.id_post = baidang.id_post WHERE bookmark.id_user= '" . $user['id_user'] . "'  ORDER BY `lastupdate_post` DESC  LIMIT " . $item_per_page . " OFFSET " . $offset;

            $sqlquery = mysqli_query($conn, $sqli);
            $tongsp = mysqli_query($conn, "SELECT * FROM `bookmark` WHERE `id_user`= '" . $user['id_user'] . "'");
            $tongsp = $tongsp->num_rows;
            $tongtrang = ceil($tongsp / $item_per_page); ?>

            <div class="card w-100">
                <div class="card-header">
                    <h3 style="color:red; font-weight:bold;">Danh sách bài đăng đã lưu</h3>
                </div>
            </div>
            <?php
            if (mysqli_num_rows($sqlquery) > 0) {
                while ($show = mysqli_fetch_assoc($sqlquery)) { ?>
                    <div class="card w-100 mb-2">

                        <div class="card-body">

                            <div class="row">

                                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                    <center><img src="./assets/img/baidang/<?php echo $show['img_post'] ?>" style="height: 100px; width:150px;" class="thumbnail" alt=""></center>
                                </div>

                                <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                            <a href="./chitietsp.php?id=<?php echo $show['id_post'] ?>">
                                                <h3 style="margin-top:0px;"><?php echo $show['tieude'] ?></h3>
                                            </a>
                                            <p><b>Giá: </b><?php echo number_format($show['gia']) ?> VND/Tháng</p>
                                            <!-- <span style="overflow: hidden;
                                                text-overflow: ellipsis;
                                                -webkit-line-clamp: 3;
                                                display: -webkit-box;
                                                -webkit-box-orient: vertical;"><?php echo $show['mota'] ?></span><br> -->


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
                                                                                                    }
                                                                                                ?></a>
                                <?php } ?>

                                </div>


                            </div>

                        </div>
                    </div>
            <?php
                }
            } ?>

            <div class="card w-100">
                <center>
                    <div class="card-header ">



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
<?php include 'footer.php';
?>