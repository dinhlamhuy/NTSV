<div class="list-group list-group-flush col-md-12">

    <?php
    session_start();
    ob_start();
    include './connect.php';


    $sql = mysqli_query($conn, "SELECT * FROM `user`  WHERE (`id_user` IN (SELECT DISTINCT `id_to` FROM `messages` WHERE `id_from`='" . $usr['id_user'] . "' OR `id_to`='" . $usr['id_user'] . "' ORDER BY `messages`.`id_mess` DESC) 
                        OR `id_user` IN (SELECT DISTINCT `id_from` FROM `messages` WHERE `id_from`='" . $usr['id_user'] . "' OR `id_to`='" . $usr['id_user'] . "' ORDER BY `messages`.`id_mess` DESC)) 
                        AND `id_user` <> '" . $usr['id_user'] . "'");
                        
    // var_dump($a); exit();
 

    
    $id_toi = '';
    if (isset($_SESSION['id_to']) && !empty($_SESSION['id_to'])) {
        $id_toi = $_SESSION['id_to'];
    }
    while ($row = mysqli_fetch_assoc($sql)) {
        $thongbao = mysqli_query($conn, "SELECT * FROM `messages` WHERE `id_to`= '" . $usr['id_user'] . "' AND`id_from`='" . $row['id_user'] . "' AND `trangthai`='Đã gửi' ORDER BY `messages`.`id_mess` DESC");
        if ($row['id_user'] ==  $id_toi && !empty( $id_toi)) {
            $seen = mysqli_query($conn, "UPDATE `messages` SET `trangthai`='Đã xem' WHERE `id_from`='" . $_SESSION['id_to'] . "' AND `id_to`= '" . $usr['id_user'] . "' ");
    ?>
            <button class="list-group-item list-group-item-action  active" style="outline:none; cursor: pointer;" onclick="guiusr('<?= $row['id_user'] ?>')" disabled>
                <div class="row  ">
                    <div class="col-md-2 col-sm-12  ">
                        <img src="./assets/img/user/<?= $row['avatar'] ?>" class="rounded-circle" width="60px" height="60px" alt="...">

                    </div>

                    <div class="col-md-9 " style="float:left;">
                        <h5><?= $row['fullname'] ?></h5>
                        <?php if ($row['hoatdong'] == '1') {
                            echo '<p style="margin-top:0px; margin-bottom:0px;  "><i class="fa fa-circle" style="color:green" aria-hidden="true"></i> Online</p>';
                        } else {
                            echo '<p style="margin-top:0px; margin-bottom:0px; color:white;">Offline</p>';
                        }

                        ?>
                    </div>
                    <div class="col-1">
                        <br>
                        <?php if (mysqli_num_rows($thongbao) > 0) { ?>

                            <span class="badge badge-pill badge-danger" style="float:right;"><?php if (mysqli_num_rows($thongbao) >= 5) {
                                                                                                    echo '5+';
                                                                                                } else {
                                                                                                    echo mysqli_num_rows($thongbao);
                                                                                                } ?></span>
                        <?php } ?>
                    </div>
                </div>
            </button>
        <?php  } else {



        ?>




            <button class="list-group-item list-group-item-action" style="outline:none; cursor: pointer;" onclick="guiusr('<?= $row['id_user'] ?>')">
                <div class="row">
                    <div class="col-md-2 col-sm-12">
                        <img src="./assets/img/user/<?= $row['avatar'] ?>" class="rounded-circle" width="60px" height="60px" alt="...">

                    </div>

                    <div class="col-md-9 " style="float:left;">
                        <h5><?= $row['fullname'] ?></h5>
                        <?php if ($row['hoatdong'] == '1') {
                            echo '<p style="margin-top:0px; margin-bottom:0px;  "><i class="fa fa-circle" style="color:green" aria-hidden="true"></i> Online</p>';
                        } else {
                            echo '<p style="margin-top:0px; margin-bottom:0px; color:#8c95a3;">Offline</p>';
                        }

                        ?>
                    </div>
                    <div class="col-1">
                        <br>

                        <?php if (mysqli_num_rows($thongbao) > 0) { ?>

                            <span class="badge badge-pill badge-danger" style="float:right;"><?php if (mysqli_num_rows($thongbao) >= 5) {
                                                                                                    echo '5+';
                                                                                                } else {
                                                                                                    echo mysqli_num_rows($thongbao);
                                                                                                } ?></span>
                        <?php } ?>
                    </div>
                </div>
            </button>

    <?php }
    }  ?>


</div>