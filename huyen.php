<option selected disabled>--chọn quận huyện--</option>
<?php
$con = mysqli_connect('127.0.0.1', 'root', '', 'ntsv');
mysqli_set_charset($con, 'UTF8');
$tinh = $_POST['tentinh'];
$huyen = "SELECT * FROM `huyen` INNER JOIN `tinh` ON huyen.id_tinh = tinh.id_tinh WHERE tinh.tentinh='$tinh'";

$result = mysqli_query($con, $huyen);
if (mysqli_num_rows($result) > 0) {

    while ($out = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $out['tenhuyen'] . "' data-lat='".$out['huyen_lat'] ."' data-long='".$out['huyen_long'] ."' >" . $out['tenhuyen'] . "</option>";
    }
}
else {
    echo "<option  disabled> không có gì hết</option>";
    }

?>