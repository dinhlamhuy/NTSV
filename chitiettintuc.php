<?php include 'headeruser.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $sqlnew = mysqli_query($conn, "SELECT * FROM `tintuc` WHERE `id_tintuc` = '" . $_GET['id'] . "' ");
                $rownews = mysqli_fetch_assoc($sqlnew); ?>
<title><?= $rownews['tieude_tintuc']?></title>
                <nav aria-label="breadcrumb bg-light w-100">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="./tintuc.php">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $rownews['tieude_tintuc'] ?></li>
                    </ol>
                </nav>
                <div class="container-fluid card  mb-2">
                    <div class="row">
                        <div class="col-md-12 px-4">
                            <h1 class="text-center mt-3"><?php echo $rownews['tieude_tintuc']; ?></h1>
                            <div class="text-right">
                                <span class="text-right text-muted" style="font-size: 12px;"><?php echo $rownews['ngayviet_tintuc']; ?></span>

                            </div>
                            <p><?php echo $rownews['noidung_tintuc']; ?></p>
                            <div class="row mt-5">
                                <div class="col-md-6 text-left">
                                    <p><b>Từ Khóa: </b><?php echo $rownews['theloai_tintuc']; ?></p>
                                </div>
                                <div class="col-md-6 text-right">
                                <p><b>Nguồn: </b><?php echo $rownews['nguon_tintuc']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<?php include 'footer.php' ?>