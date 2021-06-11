<?php
    include './connect.php';
    if(!$user){
        header("Location: login.php");
    }
    $id_from =$_POST['id_from'];
    $id_to =$_POST['id_to'];
    $id_baidang = $_POST['baidang'];
	$bt=mysqli_query($conn, "select * from `baidang` where `id_post`='$id_baidang'");
    $rowbd=mysqli_fetch_assoc($bt);
    
    $content='
    <a href="./chitietsp.php?id='.$rowbd["id_post"].'"> <span>http://localhost/NTSV/chitietsp.php?id='.$rowbd["id_post"].'</span></a>
        <div class="row">
            <div class="col-md-3 text-center ml-2 px-1 pb-0"><img src="./assets/img/baidang/'.$rowbd["img_post"].'"  class="w-100 h-75"></div>
            <div class="col-md-7 px-0 pb-0"><h5 style="text-transform: uppercase;" class="pt-2">'.$rowbd["tieude"].'</h5>
            <b style="font-weight:bold;">'.number_format($rowbd["gia"]).' VND/Tháng</b></div>
        </div>';

    // if (){

    // }
	$query_send_msg = mysqli_query($conn, "INSERT INTO `messages`(`id_from`, `id_to`, `content`, `trangthai`, `ngaygui`) 
        VALUES ('$id_from' ,'$id_to', '$content','Đã gửi', '$date_current')");
        ?>
