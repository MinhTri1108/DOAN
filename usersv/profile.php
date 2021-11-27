<?php include ('header.php')?>
<link rel="stylesheet" type="text/css" href="../css/profile.css">
<div class ="profile">
		<?php if(isset($_SESSION['profile'])) : 
		
		
		$sql = "SELECT quyen.*, dssinhvien.*, dslop.*, dskhoahoc.*, dskhoa.*,hedaotao.* FROM dssinhvien INNER JOIN dslop ON dssinhvien.MaLop = dslop.MaLop INNER JOIN dskhoahoc ON dslop.MaKhoaHoc = dskhoahoc.MaKhoaHoc INNER JOIN hedaotao ON dslop.MaHeDT = hedaotao.MaHeDT INNER JOIN quyen ON dssinhvien.idloaitk = quyen.idloaitk INNER JOIN dskhoa ON dslop.MaKhoa = dskhoa.MaKhoa WHERE MaSV = '".$_SESSION['profile']['MaSV']."'";
		
		$ds= mysqli_query($conn,$sql) or die ("khong connect duoc");

		$data = mysqli_fetch_array($ds);
		?>
		<div class="row">
	<div class="col-12 col-md-6">
	<h4>THÔNG TIN CÁ NHÂN</h4>
	<h6><a href="thaydoi.php" data-toggle="modal" data-target="#myModal1"><i class="fas fa-user-edit"></i>Cập nhật thông tin cá nhân</a></h6>
  	<table>
		<thead>
			<tr>
				<th>Mã sinh viên: </th>
				<th><?php echo $data['matk']?><?php $s = sprintf('%04d', $data['MaSV']); echo $s;?></th>
			</tr>
			<tr>
				<th>Họ và tên: </th>
				<th><?php echo $data['HoTen']?></th>
			</tr>
			<tr>
				<th>Ngày sinh: </th>
				<th><?php echo $data['NgaySinh']?></th>
			</tr>
			<tr>
				<th>CCCD/CMND: </th>
				<th><?php echo $data['CMND']?></th>
			</tr>
			<tr>
				<th>Giới Tính: </th>
				<th><?php echo $data['GioiTinh']?></th>
			</tr>
			<tr>
				<th>Địa chỉ: </th>
				<th><?php echo $data['DiaChi']?></th>
			</tr>
			<tr>
				<th>Số điện thoại: </th>
				<th><?php echo $data['SDT']?></th>
			</tr>
			<tr>
				<th>Email: </th>
				<th><?php echo $data['Email']?></th>
			</tr>
		</thead>
	</table>
	</div>
	<div class="col-6 col-md-6">
	<h4>THÔNG TIN KHÓA HỌC</h4>
	<table>
		<thead>
		<tr>
			<th>Khóa học: </th>
			<th><?php echo $data['TenKhoaHoc']?></th>
		</tr>
		<tr>
			<th>Hệ đào tạo: </th>
			<th><?php echo $data['TenHDT']?></th>
		</tr>
		<tr>
			<th>Khoa: </th>
			<th><?php echo $data['TenKhoa']?></th>
		</tr>
		<tr>
			<th>Lớp: </th>
			<th><?php echo $data['TenLop']?></th>
		</tr>
		<tr>
			<th>Địa chỉ khoa: </th>
			<th><?php echo $data['DiaChiKhoa']?></th>
		</tr>
		<tr>
			<th>Thông tin liên lạc Khoa: </th>
			<th><?php echo $data['SDTKhoa']?></th>
		</tr>
		</thead>
	</table>
  </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
			<h4 class="modal-title" style = "">Thay đổi thông tin</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form action="thaydoi.php" method = "POST">
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<label>Mã Sinh Viên</label>
					<input type="text" class="form-control" placeholder="" name = "ma" value = "<?php echo $data['matk'];?><?php $s = sprintf('%04d', $_SESSION['profile']['MaSV']); echo $s;?>" readonly = "true">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Họ Tên</label>
					<input type="text" class="form-control" placeholder="" name = "hoten" value = "<?php echo $_SESSION['profile']['HoTen'];?>">
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					<label>Ngày sinh</label>
					<input type="date" class="form-control" name = "ngaysinh" value = "<?php echo $_SESSION['profile']['NgaySinh'];?>">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					<label>CMND/CCCD</label>
					<input type="text" class="form-control" name = "cccd" value = "<?php echo $_SESSION['profile']['CMND'];?>">
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-group">
				<?php if($_SESSION['profile']['GioiTinh'] == "Nam") :?>
					<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="gender" value="Nam" checked>
					<span class="form-check-label"> Nam </span>
					</label>
					<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="gender" value="Nữ">
					<span class="form-check-label"> Nữ</span>
					</label>
				<?php else :?>
					<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="gender" value="Nam">
					<span class="form-check-label"> Nam </span>
					</label>
					<label class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="gender" value="Nữ"checked >
					<span class="form-check-label"> Nữ</span>
					</label>
				<?php endif; ?>
				</div> <!-- form-group end.// -->
				<div class="form-row">
					<div class="form-group col-md-6">
					<label>Địa chỉ</label>
					<input type="text" class="form-control" name = "diachi" value = "<?php echo $_SESSION['profile']['DiaChi'];?>">
					</div> <!-- form-group end.// -->
					<div class="form-group col-md-6">
					<label>Số điện thoại</label>
					<input type="text" class="form-control" name = "sdt" value = "<?php echo $_SESSION['profile']['SDT'];?>">
					</div> <!-- form-group end.// -->
				</div> <!-- form-row.// -->
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="" name ="email" value = "<?php echo $_SESSION['profile']['Email'];?>">
				
				</div> <!-- form-group end.// -->
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name = "edit">Save changes</button>
			</div>
		</form>
        
      </div>
    </div>
  </div>
  
</div>
<?php include '../footer.php'; ?>
<?php endif;?>