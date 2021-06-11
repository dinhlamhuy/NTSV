<?php include 'headeruser.php'; ?>
<title>Tin tức</title>
<div class="container-fluid mx-0 px-0">
    <div class="row w-100">
        <div class="col-md-12">

        <img src="./assets/img/anhtintuc.jpg" class="w-100" style="width:100%;" height="300px" alt="">
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $sqlnew = mysqli_query($conn, "SELECT * FROM `tintuc` ORDER BY `tintuc`.`ngayviet_tintuc` DESC");
            while ($rownews = mysqli_fetch_assoc($sqlnew)) { ?>
                <div class="card w-100 mt-2 mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="./admin/assets/img/news/<?= $rownews['imgmota_tintuc'] ?>" class="img-thumbnail w-100" style="height: 100px;" alt="">
                            </div>
                            <div class="col-md-10 ">
                                <a href="./chitiettintuc.php?id=<?= $rownews['id_tintuc'] ?>" class="">
                                    <h5 class="canhgiua"><?= $rownews['tieude_tintuc'] ?></h5>
                                </a>
                                <p class="canhgiua"><b><?= $rownews['theloai_tintuc'] ?></b></p>
                                <span class="canhgiua" style="text-align: right; font-size:13px;"><?= $rownews['ngayviet_tintuc'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>