<?php
session_start();
include './connect.php';
// var_dump($_SESSION['id_to']); exit();

if (isset($_SESSION['id_to']) && !empty($_SESSION['id_to'])) {
    $id_toi = $_SESSION['id_to'];
    $query_get_usr = mysqli_query($conn, "SELECT * FROM `user` WHERE `id_user`='$id_toi'");
    
    while ($rowusr = mysqli_fetch_assoc($query_get_usr)) {


?>

        <div class="col-1 w-auto p-3">
            <img src="./assets/img/user/<?= $rowusr['avatar'] ?>" style="border-radius:50%" height="50px" width="50px" alt="...">

        </div>
        <div class="col-11 w-auto p-3">
            <h5><?= $rowusr['fullname'] ?></h5>
            <?php
            if ($rowusr['hoatdong'] == '1') {
                echo '<p style="margin-top:0px; margin-bottom:0px;  "><i class="fa fa-circle" style="color:green" aria-hidden="true"></i> Online</p>';
            } else {
                echo '<p style="margin-top:0px; margin-bottom:0px; color:#8c95a3;">Offline</p>';
            }
            ?>
        </div>



<?php 
    } 
} else {
    echo '
    <div class="w-auto p-3 col-12" >
                    <h3 style="color:darkblue; font-weight:bold;">Nào cùng trò chuyên nào</h3>
                    </div>
    ';
} ?>