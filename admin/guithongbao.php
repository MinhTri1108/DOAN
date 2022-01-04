<?php include_once 'headeradmin.php';
$sqlsv = "SELECT thongbaosv.*, dsadmin.HoTen AS hotenadmin, dssinhvien.*,quyen.* FROM thongbaosv 
INNER JOIN dssinhvien ON thongbaosv.MaSV = dssinhvien.MaSV
INNER JOIN quyen ON quyen.idloaitk=dssinhvien.idloaitk
INNER JOIN dsadmin ON thongbaosv.MaAdmin = dsadmin.MaAdmin";
$kqsv = mysqli_query($conn, $sqlsv);

date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST['send']))
{
    $timestamp = time();
    $thoigian = date ("Y-m-d H:i:s", $timestamp);
    $noidung = $_POST['message'];
    $iduser= $_POST['mauser'];
    $iddau = substr($iduser, 0, 5);
    $idma= substr($iduser, -4);
	$nguoinhan = ltrim($idma, '0');
    $nguoigui= $_SESSION['profileadmin']['MaAdmin'];
    if($nguoinhan == NULL || $noidung == NULL)
    {
        echo "loi";
    }
    else{
        switch($iddau)
        {
            case '22021':
                $sql = "INSERT INTO `thongbaosv`(`id`, `MaAdmin`, `noidung`, `MaSV`, `ThoiGian`) VALUES ('','".$nguoigui."','".$noidung."','".$nguoinhan."','".$thoigian."')";
                $kq= mysqli_query($conn, $sql);
                if($kq)
                {
                    echo("<script>if(confirm('Gửi thông báo cho Mã Tài Khoản $iduser thành công. Bạn đồng ý quay trở về \'Trang chủ\' ')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='guithongbao.php';
                    } else {
                        window.location='guithongbao.php';
                    };</script>");
                }
                else
                {
                    echo'<script type="text/javascript">alert("Thất bại") </script> ';
                }
            break;
            case '12021':
                $sql = "INSERT INTO `thongbaogv`(`id`, `MaAdmin`, `noidung`, `MaGV`, `ThoiGian`) VALUES ('','".$nguoigui."','".$noidung."','".$nguoinhan."','".$thoigian."')";
                $kq= mysqli_query($conn, $sql);
                if($kq)
                {
                    echo("<script>if(confirm('Gửi thông báo cho Mã Tài Khoản $iduser thành công. Bạn đồng ý quay trở về \'Trang chủ\' ')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='guithongbao.php';
                    } else {
                        window.location='guithongbao.php';
                    };</script>");
                }
                else
                {
                    echo'<script type="text/javascript">alert("Thất bại") </script> ';
                }
            break;
            default:
				echo 'Không gửi được';
				break;
        }

    }
}
?>
<div class="container-fluid">
<div class="row" style = "margin-top: 10px;">
    <div class="col-8" id="form_container">
                <div class="row">
                <h2 >Danh sách thông báo(Sinh Viên)</h2>
                <a href="thongbaogiangvien.php" style = "margin-left:45px;" class="btn btn-primary">Danh sách các thông báo đã gửi tới giảng viên <i class="fas fa-chevron-circle-right"></i></a>
                </div>
                <div style = "margin-top: 20px !important;">
                <table  id="example" class="display" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
                    <thead>
                        <th>ID/ Người gửi</th>
                        <th>ID/ Người nhận</th>
                        <th>Nội Dung</th>
                        <th>Thời gian gửi</th>
                        <th>Xóa</th>
                    </thead>
                    <tbody>
                    <?php
                while ($data = mysqli_fetch_array($kqsv))
                {
                    $i=1;
                    ?>
                        <tr>
                        <!-- thêm 0 vào trước
                        $idmauser = str_pad(substr($data['MaGV'], -4), 2, '0', STR_PAD_LEFT);  -->
                            <th><?php echo $data['hotenadmin']?></th>
                            <th>[<?php echo $data['matk']?><?php 
                            $s = sprintf('%04d', $data['MaSV']);
                            echo $s;
                            ?>]-<?php echo $data['HoTen']?></th>
                            <th><?php echo $data['noidung']?></th>
                            <th><?php echo $data['ThoiGian']?></th>
                            <th><a href="xoathongbao.php?mauser=<?php echo $data['matk']?><?php $s = sprintf('%04d', $data['MaSV']); echo $s;?>&thoigian=<?php echo $data['ThoiGian']?>"><i class="fas fa-trash-alt"></i></th>
                        </tr>
                    <?php
                        $i++;
                    }
                    ?>
                    </tbody>
                </table>
                </div>
        
    </div>
    <div class="col-4">
            <div class="col" id="form_container">
                <h2>Gửi thông báo</h2>
                <!-- <p>
                Gửi thông báo tới cho Sinh viên và giảng viên
                </p> -->
                <form role="form" method="post" id="reused_form">

                    <div class="row">
                        <div class="col form-group">
                            <label for="message">
                                Nội dung:</label>
                            <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label for="name">
                                Mã sinh viên/ Giảng viên :</label>
                            <input type="text" class="form-control" id="name" name="mauser" required>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class="btn btn-success" name="send" >Send →</button>
                        </div>
                    </div>

                </form>
                
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/script.js"></script>
<?php include_once '../footer.php';?>