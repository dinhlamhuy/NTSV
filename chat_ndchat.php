<?php
session_start();
include './connect.php';


$id_toi = '';
if (isset($_SESSION['id_to']) && !empty($_SESSION['id_to'])) {
    $id_toi = $_SESSION['id_to'];
    

            // $id_toi = $_GET['id_to'];

            $ngaythangnam = '';
            $query_get_mess = mysqli_query($conn, "SELECT * FROM `messages` INNER JOIN `user` ON messages.id_from=user.id_user ORDER BY `id_mess` ASC");
            while ($ndmess = mysqli_fetch_assoc($query_get_mess)) {

                // Thời gian gửi tin nhắn
                $date_sent = $ndmess['ngaygui'];
                $day_sent = substr($date_sent, 8, 2); // Ngày gửi
                $month_sent = substr($date_sent, 5, 2); // Thánh gửi
                $year_sent = substr($date_sent, 0, 4); // Năm gửi
                $hour_sent = substr($date_sent, 11, 2); // Giờ gửi
                $min_sent = substr($date_sent, 14, 2); // Phút gửi
                $ddmmyyyy = $day_sent . '/' . $month_sent . '/' . $year_sent;
                // Nếu người gửi là $user thì hiển thị khung tin nhắn màu xanh
                if ($ndmess['id_to'] == $usr['id_user'] && $ndmess['id_from'] == $id_toi) {
                    if ($ngaythangnam !=  $ddmmyyyy) {
                        $ngaythangnam = $ddmmyyyy;
                        echo '<div class="row">
                            <div class="col-md-2 "></div>
                            <div class="col-md-8 text-center"><s style="color:#a09a98;">&emsp;&emsp;&emsp;</s><span class=" rounded-pill " style="background-color:#8f8886; color:#f3f3f3; border:none; padding:2px 15px; font-size:12px;">' . $ngaythangnam . '</span><s style="color:#a09a98;">&emsp;&emsp;&emsp;</s></div>
                            <div class="col-md-2 "></div>
                        </div>';
                    }

                    echo '<div class="row nd canhgiua" >
                        <div class="col-md-1"> <img src="./assets/img/user/' . $ndmess['avatar'] . '" class="rounded-circle" height="40px" width="40px" alt=""></div>
                        <div class="col-md-9">
                            <div class="doantn  p-2 bd-highligh text-break"><span style="padding-bottom:15px;">' . $ndmess['content'] . '</span>
                                <div style="text-align:left; color:#9e9e9e;"><small>' . $hour_sent . ':' . $min_sent . '</small></div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>';
                } else if ($ndmess['id_from'] == $usr['id_user'] && $ndmess['id_to'] == $id_toi) {
                    if ($ngaythangnam !=  $ddmmyyyy){
                        $ngaythangnam = $ddmmyyyy;
                        echo '<div class="row mt-3 mb-3">
                                <div class="col-md-2 "></div>
                                <div class="col-md-8 text-center"><s style="color:#a09a98;">&emsp;&emsp;&emsp;</s><span class=" rounded-pill " style="background-color:#8f8886; color:#f3f3f3; border:none; padding:2px 15px; font-size:12px;">' . $ngaythangnam . '</span><s style="color:#a09a98;">&emsp;&emsp;&emsp;</s></div>
                                <div class="col-md-2 "></div>
                            </div>';
                    }
                    echo '
                    <div class="row ">
                        <div class="col-md-3"></div>
                        <div class="col-md-9 ml-auto mr-1">
                            <div class="doantnusr px-3 pt-1 pb-1 bd-highligh">
                                <span style="padding-bottom:15px;" class="text-break">' . $ndmess['content'] . '</span>
                                <div style="text-align:right; color:#9e9e9e;"><small>' . $hour_sent . ':' . $min_sent . ' &emsp; '.$ndmess['trangthai'].'</small></div>
                            </div>
                    </div>
                </div>';
                }
            }
        } else {
            echo '<div class="row" >
            <div class="w-auto p-3 overflow-auto col-12" id="cuon" style="background-color: #c0b9b7; height:470px;">
                             <br><br> <img src="./assets/img/bgchat.png" style="width:100%"  >
            
                     </div>
                     </div>';
        }

            ?>

       