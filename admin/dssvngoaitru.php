<?php include './headeradmin.php' ?>
<title>DSSV ngoại trú</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header">
                    <h5><b><i>Danh sách sinh viên ngoại trú đã sử dụng website tìm kiếm nhà trọ</i></b></h5>
                </div>
                <div class="card-body">

                    <?php
                    $sqlsv = "SELECT *  FROM  `datphong` WHERE `nghenghiep`='Sinh Viên'";
                    $resultsvnt = mysqli_query($conn, $sqlsv);
                    $resultsv = mysqli_query($conn, $sqlsv);
                    ?>
                    <button class="btn  mb-2 float-right text-muted" id="xuatfile">Xuất File Excel</button>
                    <table id="indsngoaitru" border="1" class="d-none">
                        <thead>
                            <tr style="height: 50px;" >
                                <th colspan="7" class="text-center ">
                                <center>
                                    <h3><b><i>Danh sách sinh viên ngoại trú đã sử dụng website tìm kiếm nhà trọ</i></b></h3>
                                </center>
                                </th>
                            </tr>

                            <tr style="border-bottom: 3px solid red ;" class="canhgiua">
                                <th><center><b>STT</b></center></th>
                                <th><center><b>Tên Sinh Viên</b></center></th>
                                <th><center><b>Giới tính</b></center></th>
                                <th><center><b>Năm sinh</b></center></th>
                                <th><center><b>SDT</b></center></th>
                                <th><center><b>Email</b></center></th>
                                <th><center><b>Tên Trường</b></center></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $j = 1;
                            $tensvnt = '';
                            while ($rowsvnt = mysqli_fetch_assoc($resultsvnt)) {
                                if ($rowsvnt['tendk'] != $tensvnt) {
                                    $tensvnt = $rowsvnt['tendk'];
                            ?>
                                    <tr>
                                        <td><?= $j++ ?></td>
                                        <td><?= $rowsvnt['tendk'] ?></td>
                                        <td><?= $rowsvnt['gt'] ?></td>
                                        <td><?= $rowsvnt['ns'] ?></td>
                                        <td><?= $rowsvnt['sdt'] ?></td>
                                        <td><?= $rowsvnt['email'] ?></td>
                                        <td><?= $rowsvnt['tentochuc'] ?></td>
                                    </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>

                    <table id="dsngoaitru" class="table  " border="1" style="width:100%; height:auto;">

                        <thead>
                            <tr style="border-bottom: 3px solid red ;" class="canhgiua">
                                <th class="canhgiua text-center">#</th>
                                <th class="canhgiua text-center">Tên Sinh Viên</th>
                                <th class="canhgiua text-center">Giới tính</th>
                                <th class="canhgiua text-center">Năm sinh</th>
                                <th class="canhgiua text-center">SDT</th>
                                <th class="canhgiua text-center">Email</th>
                                <th class="canhgiua text-center">Tên Trường</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            $tensv = '';
                            $gtsv = '';
                            $nssv = '';
                            $sdtsv = '';
                            $tentruong = '';
                            while ($rowsv = mysqli_fetch_assoc($resultsv)) {

                                if ($rowsv['tendk'] != $tensv) {

                                    $tensv = $rowsv['tendk'];
                                    // $gtsv = $rowsv['gt'];
                                    // $nssv = $rowsv['ns'];
                                    // $sdtsv = $rowsv['sdt'];
                                    // $tentruong = $rowsv['tentochuc'];
                            ?>
                                    <tr>
                                        <td class="canhgiua"><?= $i++ ?></td>
                                        <td class="canhgiua"><?= $rowsv['tendk'] ?></td>
                                        <td class="canhgiua"><?= $rowsv['gt'] ?></td>
                                        <td class="canhgiua"><?= $rowsv['ns'] ?></td>
                                        <td class="canhgiua"><?= $rowsv['sdt'] ?></td>
                                        <td class="canhgiua"><?= $rowsv['email'] ?></td>
                                        <td class="canhgiua"><?= $rowsv['tentochuc'] ?></td>

                                    </tr>


                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'footeradmin.php'; ?>