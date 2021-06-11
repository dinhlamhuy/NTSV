<div class="card" style="margin-bottom: 0px;">
      <div class="card-body" style="background-color: #3E7867; color:white;">
           
           <div class="container ">
               <center><h3><b>Hỗ trợ khách hàng</b></h3></center>
               <div class="row">                  
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                      <h3><b>Giới thiệu:</b></h3>
                      <p>Trang web nhatrosvha489.com giúp cho mọi người có thể tìm thấy nhà trọ ưng ý.</p>
                      <a href="https://www.facebook.com/"><i class="fa fa-facebook-official fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://www.linkedin.com/"><i class="fa fa-linkedin-square fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://www.youtube.com/"><i class="fa fa-youtube-square fa-3x"  style="color:white;" aria-hidden="true"></i></a>
                      <a href="https://twitter.com/"><i class="fa fa-twitter-square fa-3x" style="color:white;" aria-hidden="true"></i></a>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                  <h3>Địa chỉ:</h3>
                  <p><i class="fa fa-map-marker " aria-hidden="true"></i>  : Trường đại học Cần Thơ, khu Hòa An, huyện Phụng Hiệp, Tỉnh Hậu Giang</p>
                  <p><i class="fa fa-phone" aria-hidden="true"></i> : +(84) 336 644 594 - (+84) 396 325 396</p>
                  <p><i class="fa fa-envelope-o" aria-hidden="true"></i> : nhatrosinhvienhoaan@gmail.com</p>
                  </div>                 
               </div>              
           </div>           
      </div>
      <div class="card-footer" style="background-color: #003300; color:whitesmoke">
      <center><b>&copy; 2021 Copyright: nhatrosvha.com</b></center>
            
        </div>
</div>
<script src="./vendor/jquery/jquery.min.js"></script>

<script src="./vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="admin/assets/js/custom.js"></script>
<script src="admin/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="admin/assets/js/dataTables/dataTables.bootstrap.js"></script> -->
<script src="./admin/assets/DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function(){
        $("#tinh").change(function() {
           var tinhten = $("#tinh").val();
           
           
            $.post("huyen.php", {tentinh: tinhten}, function(data) {
                $("#huyen").html(data);
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#qlphongtro').dataTable();
    });
    $(document).ready(function() {
        $('#qldattruoc').dataTable();
    });
    $(document).ready(function() {
        $('#dsdangkyphong').dataTable();
    });
</script>

</body>

</html>