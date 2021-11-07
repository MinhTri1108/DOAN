<?php include_once 'headeradmin.php';
$sql = "SELECT quyen.*, dsadmin.* FROM dsadmin INNER JOIN quyen ON dsadmin.idloaitk = quyen.idloaitk ORDER BY MaAdmin ASC";
$kq = mysqli_query($conn, $sql);
function tong()
{
    include ('config/connect.php');
    $tong = "SELECT COUNT(*) AS tong FROM dsadmin";
    $kq1 = mysqli_query($conn, $tong);
    if($data1 = mysqli_fetch_array($kq1))
    {
        echo $data1['tong'];
    }
    else
        {
            echo'<script type="text/javascript">alert("lỗi ") </script> ';
        }
}
function tongnam()
{
    include ('config/connect.php');
    $tongnam = "SELECT COUNT(*) AS tongnam FROM dsadmin WHERE GioiTinh = 'Nam'";
    $kq2 = mysqli_query($conn, $tongnam);
    if($data2 = mysqli_fetch_array($kq2))
    {
        echo $data2['tongnam'];
    }
    else
        {
            echo'<script type="text/javascript">alert("lỗi ") </script> ';
        }
}
function tongnu()
{
    include ('config/connect.php');
    $tongnu = "SELECT COUNT(*) AS tongnu FROM dsadmin WHERE GioiTinh = 'Nữ'";
    $kq3 = mysqli_query($conn, $tongnu);
    if($data3 = mysqli_fetch_array($kq3))
    {
        echo $data3['tongnu'];
    }
    else
            {
                echo'<script type="text/javascript">alert("lỗi ") </script> ';
            }
    }
?>
<link rel="stylesheet" type="text/css" href="css/.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<div class="container-fluid">
<div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách Admin</h4>
            
        
        </div>
        <div class="col col-md-4">

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="adminadd.php"><i class="fas fa-user-plus"></i> Thêm Tài Khoản</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số Admin: <?php tong()?></p>
        <p style = "margin-left: 20px"> Tổng số Admin nam: <?php tongnam()?></p>
        <p style = "margin-left: 20px"> Tổng số Admin nữ: <?php tongnu()?></p>
    </div>
    
	<div class="row">
		<div class="col">
			<table id="example" class="display" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
		        <thead>
		            <tr>
                        <th>Mã ADMIN</th>
                        <th>Password</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>CCCD/CMND</th>
                        <th>Giới Tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </thead>
		        <!-- <tfoot>
		            <tr>
                        <th>Mã Giảng viên</th>
                        <th>Password</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>CCCD/CMND</th>
                        <th>Giới Tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </tfoot> -->
		        <tbody>
                <?php
                    while ($data = mysqli_fetch_array($kq))
                    {
                        $i=1;
                    ?>
                    <tr>
                    <th><?php echo $data['matk']?><?php 
                        $s = sprintf('%04d', $data['MaAdmin']);
                        echo $s;
                        ?></th>
                        <th><?php echo $data['Password']?></th>
                        <th><?php echo $data['HoTen']?></th>
                        <th><?php echo $data['NgaySinh']?></th>
                        <th><?php echo $data['CMND']?></th>
                        <th><?php echo $data['GioiTinh']?></th>
                        <th><?php echo $data['DiaChi']?></th>
                        <th><?php echo $data['SDT']?></th>
                        <th><?php echo $data['Email']?></th>
                        <th><a href="adminedit.php?matk=<?php echo $data['matk']?><?php echo $s?>&hoten=<?php echo $data['HoTen']?>&ngaysinh=<?php echo $data['NgaySinh']?>&cmnd=<?php echo $data['CMND']?>&gioitinh=<?php echo $data['GioiTinh']?>&diachi=<?php echo $data['DiaChi']?>&sdt=<?php echo $data['SDT']?>&email=<?php echo $data['Email']?>&pass=<?php echo $data['Password']?>"><i class="fas fa-user-edit"></i></th>
                        <th><a href="admindelete.php?matk=<?php echo $data['matk']?><?php echo $s?>"><i class="fas fa-trash-alt"></i></th>
                    </tr>
                <?php
                    $i++;
                }
                ?>
		        </tbody>
		    </table>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</div>
<?php include 'footer.php'; ?>