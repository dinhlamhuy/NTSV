<?php
session_start();

include './connect.php';


if (isset($_SESSION['id_to']) && !empty($_SESSION['id_to'])) {
    $id_toi = $_SESSION['id_to']; ?>



    <div class="col-12 ">
        <form method="post" id="formSendMsg" onsubmit="return false">
            <input type="hidden" value="<?= $id_toi ?>">
            <input type="text" class="form-control" placeholder="Nhập tin nhắn ..." value="" style="width:100%; margin-right:4px; float:left;" onclick="scrollToBottom('cuon')">
            <button class="btn btn-white gui" id="btngui"><i class="fa fa-paper-plane" style=" font-size:25px;  color:blue;" id="gui" aria-hidden="true"></i></button>
        </form>
    </div>

<?php } else { ?>

    <div class="col-12 ">
        <input type="text" class="form-control" placeholder="Nhập tin nhắn ..." value="" style="width:100%; margin-right:4px; float:left;" disabled>
        <button class="btn btn-white gui " id="btngui" disabled><i class="fa fa-paper-plane" style=" font-size:25px;  color:blue;" id="gui" aria-hidden="true"></i></button>
    </div>

<?php  } ?>
<script>
 function sendMsg() {
            // Khai ba1oca1c biến trong form
            $id_to = $('#formSendMsg input[type="hidden"]').val();
            $body_msg = $('#formSendMsg input[type="text"]').val();

            // Gửi dữ liệu
            $.ajax({
                url: 'chat_guitin.php', // đường dẫn file xử lý
                type: 'POST', // phương thức
                // dữ liệu
                data: {
                    body_msg: $body_msg,
                    id_to: $id_to

                },
                success: function() {
                    $('#formSendMsg input[type="text"]').val('');
                    scrollToBottom('cuon');
                }
            });
        }


        // $('#formSendMsg input[type="text"]').keypress(function() {
        //     var keycode = (event.keyCode ? event.keyCode : event.which);
        //     if (keycode == '13') {
        //         // Chạy hàm gửi tin nhắn
        //         sendMsg();
        //         scrollToBottom('cuon');
        //     }
        // });

        $('#btngui').click(function() {
            sendMsg();
            scrollToBottom('cuon');

        });
</script>