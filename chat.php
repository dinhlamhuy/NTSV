<!doctype html>
<html lang="en">

<head>
    <title>Trò chuyện</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./vendor/bootstrap/css/bootstrap.min.css">
    <style>
        .doantn {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 12px;
            word-wrap: break-word;
            margin-bottom: 10px;
            width: auto;
            float: left;
        }


        .doantnusr {
            background: #dae9ff none repeat scroll 0 0;
            border-radius: 12px;
            word-wrap: break-word;

            width: auto;
            float: right;
            margin-bottom: 10px;

        }

        .gui {
            float: left;
            padding: 5px;
            position: absolute;
            right: 25px;
            outline: none;
        }

        .nd {

            margin-bottom: 10px;

        }
    </style>
</head>

<body>
    <div id="layid">
        <?php include './connect.php';
        include './headeruser.php';
        if (!$usr) {
            header("Location: ./login.php");
        }
        if (isset($_POST['id_to']) && !empty($_POST['id_to'])) {

            $id_toi = $_POST['id_to'];
            $_SESSION['id_to'] = $id_toi;
        }
        ?>

    </div>
    <div class="container border">
        <div class="row" style="height:600px;">
            <div class="col-5">
                <h3>nhatrosvha.com</h3>
                <hr>
                <div class="row overflow-auto" style="height:530px;">

                    <div class="col-12" id="cuonusr">

                    </div>

                </div>
            </div>


            <div class="col-7 " id="contentmess">
                <div class="row" style="background-color: whitesmoke; height: 80px;" id="headerusr" >
                    
                </div>

                <div class="row">

                    <div class="w-auto p-3 overflow-auto col-12" id="cuon" style="background-color: #c0b9b7; height:470px;">

                    </div>
                </div>


                <div class="row " id="formnt" style="margin-top:5px; ">
                    <!-- <div class="col-12 ">
                        <input type="text" class="form-control" placeholder="Nhập tin nhắn ..." value="" style="width:100%; margin-right:4px; float:left;" disabled>
                        <button class="btn btn-white gui " id="btngui" disabled><i class="fa fa-paper-plane" style=" font-size:25px;  color:blue;" id="gui" aria-hidden="true"></i></button>
                    </div> -->
                </div>

            </div>

        </div>
    </div>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./vendor/jquery/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/js/autoload.js"></script>
    <script>
        function scrollToBottom(id) {
            var div = document.getElementById(id);
            div.scrollTop = div.scrollHeight - div.clientHeight;
        }
        $(document).ready(function(){
            $('#headerusr').load('chat_dauusr.php');
                    $('#formnt').load('chat_formnt.php');
                    
        })
        

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
        // $('.usrid').click(function() {

        //     scrollToBottom('cuon');

        // });



        function guiusr(id) {

            $.ajax({
                url: '', // đường dẫn file xử lý
                type: 'POST', // phương thức
                // dữ liệu
                data: {

                    id_to: id

                },
                success: function() {
                    $('#headerusr').load('chat_dauusr.php');
                    $('#formnt').load('chat_formnt.php');
                }
            });
        }
        // 
        // 
    </script>

</body>

</html>