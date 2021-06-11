<?php include 'headeruser.php'; ?>
<style> 


.main-text
{
    position: fixed;
    top: 300px;
    width: 96.66666666666666%;
    color: #FFF;
}
.btn-min-block
{
    min-width: 170px;
    line-height: 26px;
}
.btn-clear
{
    color: #FFF;
    background-color: transparent;
    border-color: #FFF;
    margin-right: 15px;
}
.btn-clear:hover
{
    color: #000;
    background-color: #FFF;
}
.bd{
  background-color: aquamarine;
  vertical-align: middle;
  height: 100px;
  margin: auto 80px;
  padding-top: 30px ;
  border-radius: 12px;
  
}


</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>


<title>Nhà Trọ Hòa An</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="./assets/img/slide1.jpg" style="width:100% " alt="First slide">
                    </div>
                    <div class="item">
                        <img src="./assets/img/slide2.jpg" style="width:100% " alt="Second slide">
                    </div>
                    <div class="item">
                        <img src="./assets/img/slide3.jpg"  style="width:100% " alt="Third slide">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
                        </span></a>
            </div>
            <div class="main-text hidden-xs">
              <div class="col-md-12 text-center">
                <div class="container-bg">
                  <form action="" method="GET">
                  <div class="row bd">
                   
                  <div class="col-md-2 bg">
                  <div class="form-group ">
                    <select name="chuyenmuc" id="chuyenmuc" class="form-control">
                        <option selected disabled>--Chuyện mục--</option>
                        <?php $chuyenmuc=mysqli_query($conn, "SELECT * FROM `chuyenmuc` ");
                            while($cm=mysqli_fetch_assoc($chuyenmuc)){
                            echo " <option value='".$cm['id_chuyenmuc']."'>".$cm['tenchuyenmuc']."</option>";
                            }
                        ?>
                        
                    </select>
                  </div>   
                  </div>

                  <div class="col-md-2 bg">
                    
                    <div class="form-group ">

                    <select name="tinh" id="tinh" class="form-control">
                      <option selected disabled>--Tỉnh--</option>
                      <?php $tinh=mysqli_query($conn,"SELECT * FROM `tinh`");
                            while ($out=mysqli_fetch_assoc($tinh)){
                              echo "<option value='".$out['tentinh']."'>".$out['tentinh']."</option>";
                            }
                      ?>
                    </select>
                    </div>
                  </div>

                  <div class="col-md-2 bg">
                  <div class="form-group">
                      <select name="huyen" id="huyen" class="form-control">
                        <option selected disabled>---Huyện---</option>
                      </select>
                  </div>
                  </div>
                  <div class="col-md-2 bg">
                  <div class="form-group ">
                    <select name="dientich" id="dientich" class="form-control">
                    <option selected disabled>---Diện tích---</option>
                    </select>
                  </div>   
                  </div>
                  
                
                  <div class="col-md-2 bg">
                    
                    <select name="gia" id="" class="form-control">
                      <option selected disabled>---Giá---</option>
                      <option value="">Tất cả</option>
                      <option value="<1000000">Dưới 1 triệu</option>
                      <option value="BETWEEN 1000000 AND 2000000">1 - 3 triệu</option>
                      <option value="BETWEEN 5000000 AND 7000000"> 5- 7 triệu</option>
                      <option value="BETWEEN 7000000 AND 10000000"> 7- 10 triệu</option>

                      <option value="> 10000000">trên 10 triệu</option>
                    </select>
                  </div>
                  <div class="col-md-2 bg">
                    
                    <input type="submit" value="Tìm Kiếm" name="loc" class="btn btn-success">
                    
                  
                  </div>
                </div>
                </form>
                </div>
              </div>
            </div>
        </div>
    </div>

  <div class="row">
  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
  
  <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
    <div class="row">     
      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="glyphicon glyphicon-home"></i> <a href="./index.php">Trang chủ</a> / 
        </div>
          <div class="panel-body">
            Basic panel example
          </div>
      </div>
    </div>
  </div>
  <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
  
</div>
</div>
<script>
  jQuery(document).ready(function($){
    $("#tinh").change(function(event){
      tinhten= $("#tinh").val();
      $.post('huyen.php', {"tentinh":tinhten}, function(data){
        $("#huyen").html(data);
      });
    });
  });
</script>
<?php include 'footer.php' ?>>
