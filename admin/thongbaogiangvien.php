<?php include_once 'headeradmin.php';

$sqlgv = "SELECT thongbaogv.*, dsadmin.HoTen AS hotenadmin, dsgiaovien.*,quyen.* FROM thongbaogv 
INNER JOIN dsgiaovien ON thongbaogv.MaGV = dsgiaovien.MaGV
INNER JOIN quyen ON quyen.idloaitk=dsgiaovien.idloaitk
INNER JOIN dsadmin ON thongbaogv.MaAdmin = dsadmin.MaAdmin";
$kqgv = mysqli_query($conn, $sqlgv);
date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
<div class="row">
            <div class="col" id="form_container">
            <a href="guithongbao.php" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Quay lại</a>
            <h2 >Danh sách thông báo(Giảng Viên)</h2>
                <table style = "margin-top: 10px;" id="example" class="display" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                    <thead>
                        <th>ID/ Người gửi</th>
                        <th>ID/ Người nhận</th>
                        <th>Nội Dung</th>
                        <th>Thời gian gửi</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody>
                    <?php
                while ($data = mysqli_fetch_array($kqgv))
                {
                    $i=1;
                    ?>
                        <tr>
                        <!-- thêm 0 vào trước
                        $idmauser = str_pad(substr($data['MaGV'], -4), 2, '0', STR_PAD_LEFT);  -->
                            <th><?php echo $data['hotenadmin']?></th>
                            <th>[<?php echo $data['matk']?><?php 
                            $s = sprintf('%04d', $data['MaGV']);
                            echo $s;
                            ?>]-<?php echo $data['HoTen']?></th>
                            <th><?php echo $data['noidung']?></th>
                            <th><?php echo $data['ThoiGian']?></th>
                            <th><a href=""><i class="fas fa-trash-alt"></i></th>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>