<?php include_once 'header.php';
$sql = "SELECT dsmonhoc.* , lichhoc.*, thungay.*, dstiethoc.*, dsphonghoc.*, dsgiaovien.*,dslop.MaLop,dslop.TenLop FROM lichhoc
INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc
INNER JOIN thungay ON lichhoc.idthu = thungay.idthu
INNER JOIN  dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc
INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong
INNER JOIN dsgiaovien ON dsmonhoc.MaMonHoc = dsgiaovien.MaMonHoc
INNER JOIN dslop ON dsmonhoc.MaLop = dslop.MaLop WHERE dslop.MaLop = '".$_SESSION['profile']['MaLop']."'";
$kq = mysqli_query($conn,$sql);
?> 
<div class="container-fluid">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Đăng ký học phần</h4>
            
        
        </div>
        <div class="col col-md-4">

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6></h6>
        </div>
    </div>
    
    
	<div class="row">
		<div class="col">
			<table id="example" class="display" width="100%" data-page-length="25" data-order="[[ 1, &quot;asc&quot; ]]">
		        <thead>
		            <tr>
                        <th>Học kì</th>
                        <th>Môn học</th>
                        <th>Thời gian</th>
                        <th>Giảng viên</th>
                        <th>Đăng ký</th>
                        <th>Hủy đăng ký</th>
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
                        <th><?php echo $data['HocKi']?></th>
                        <th><?php echo $data['TenMonHoc']?></th>
                        <th>
                            <?php echo $data['thumay']?>
                            <br>
                            <?php echo $data['TietHoc']?>
                            <br>
                            Bắt đầu: <?php echo $data['GioHocBD']?>
                            <br>
                            Kết thúc: <?php echo $data['GioHocKT']?>
                            <br>
                            Phòng: <?php echo $data['SoPhong']?>
                        </th>
                        <th><?php echo $data['HoTen']?></th>
                        <th><a href="dangkyhp.php?mahp=<?php echo $data['MaMonHoc']?>&tenmh=<?php echo $data['TenMonHoc']?>&masv=<?php echo $_SESSION['profile']['MaSV']?>"><i class="fas fa-user-edit"></i></th>
                        <th><a href="huydangkyhp.php?mahp=<?php echo $data['MaMonHoc']?>&tenmh=<?php echo $data['TenMonHoc']?>&masv=<?php echo $_SESSION['profile']['MaSV']?>"><i class="fas fa-trash-alt"></i></th>
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