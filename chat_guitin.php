<?php
session_start();
include './connect.php';
if (!$usr) {
    header("Location: login.php");
}
$body_msg = @mysqli_real_escape_string($conn, $_POST['body_msg']);
$id_to = @mysqli_real_escape_string($conn, $_POST['id_to']);

$body_msg = htmlentities($body_msg);
$body_msg = trim($body_msg);

if ($body_msg != '') {
    $query_send_msg = mysqli_query($conn, "INSERT INTO `messages`(`id_from`, `id_to`, `content`, `trangthai`, `ngaygui`) VALUES ('" . $usr['id_user'] . "' ,'$id_to', '$body_msg','Đã gửi', '$date_current')");
}
