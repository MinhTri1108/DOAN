<?php session_start();
include_once('../headerlogo.php');
include_once ('../config/connect.php');
if(!isset($_SESSION['profilegv'])) {
        header("location: ../login.php");
        exit();
    }
?>
<link rel="stylesheet" type="text/css" href="../css/reset.css">
<link rel="stylesheet" type="text/css" href="../css/header.css">
<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../font-awesome/css/all.css">
	<?php
		$sql = "SELECT quyen.*, dsgiaovien.* FROM dsgiaovien INNER JOIN quyen ON dsgiaovien.idloaitk = quyen.idloaitk WHERE MaGV = '".$_SESSION['profilegv']['MaGV']."'";
			
		$ds= mysqli_query($conn,$sql) or die ("khong connect duoc");

		$data = mysqli_fetch_array($ds);
		function tongtb()
		{
			include ('../config/connect.php');
			$tongtb = "SELECT SUM(status) AS tongtb FROM thongbaogv WHERE MaGV = '".$_SESSION['profilegv']['MaGV']."'";
			$kq2 = mysqli_query($conn, $tongtb);
			if($data2 = mysqli_fetch_array($kq2))
			{
				echo '<span style="color: red;">', $data2['tongtb'], '</span>';
			}
			else
				{
					echo'<script type="text/javascript">alert("lỗi ") </script> ';
        		}
			}
		?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
	<a class="navbar-brand" href="indexgv.php"><i class="fas fa-home"></i>_Trường DH Quy Nhơn</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
<div class="container-fluid container-edit">
	<div class="navbar-collapse collapse " id="navbarSupportedContent">
		<ul class="nav navbar-nav">
			<!-- <li class="nav-item active">
				<a class="nav-link" href="#">Home</a>
			</li> -->

			<li class="nav-item dropdown">
				<a class="nav-link" href="#" id="navbarDropdown" >Trang cá nhân</a>
				<div class="dropdown-content">
					<ul class="sub-menu"> 
						<li><a class="dropdown-item" href="profilegv.php">Thông tin cá nhân</a></li>
						<li><a class="dropdown-item" href="#">Nhắn tin</a></li>
					</ul>
				</div>
			</li>

			<li class="nav-item dropdown">
				<a class="nav-link" href=""><i class="fas fa-chalkboard-teacher"></i> Giảng dạy</a>
				<div class="dropdown-content">
					<ul class="sub-menu"> 
						<li><a class="dropdown-item" href="thoikhoabieugv.php">Thời khóa biểu giảng viên</a></li>
						<li><a class="dropdown-item" href="upfile.php">Cập nhật Tài liệu</a></li>
						<li><a class="dropdown-item" href="uploaddiem.php">Cập nhật điểm</a></li>
					</ul>
				</div>
			</li>
			<!-- <li  class="nav-item">
				<a class="nav-link" href=""><i class="fas fa-bell"></i> Thông báo</a>
			</li>
		</ul> -->
		<?php $sqltb = "SELECT thongbaogv.* , dsadmin.* FROM thongbaogv INNER JOIN dsadmin ON thongbaogv.MaAdmin = dsadmin.MaAdmin WHERE `MaGV` = '".$_SESSION['profilegv']['MaGV']."' order by `ThoiGian` DESC";
			$kqtb = mysqli_query($conn, $sqltb);
			?>
			<li class="nav-item dropdown">
				<a class="nav-link text-light" href="viewtb.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-bell"></i><?php tongtb();?> Thông báo
					</a>

						<ul class="dropdown-menu">
						<li class="head text-light bg-dark">
							<div class="row">
							<div class="col-lg-12 col-sm-12 col-12">
							<!-- <span>Xem tất cả</span> -->
							<a href="" class="float-left text-light"><i class="far fa-eye"></i>Xem tất cả</a>
							<a href="danhdaudadoc.php?id=<?php echo $_SESSION['profilegv']['MaGV'];?>" class="float-right text-light"><i class="fas fa-check"></i> Đánh đấu đã đọc</a>
							</div>
							</div>
						</li>
					<li class="notification-box">
					<?php
						while ($tb = mysqli_fetch_array($kqtb))
						{
							$i=1;
					?>
					<a style ="
							<?php
								if($tb['status']=='1'){
									echo " font-weight:bold;";
								} ?>" href="viewtb.php?id=<?php echo $tb['id'] ?>">
						<div class="row" style="width:100% !important;">
						<div class="col-lg-3 col-sm-3 col-3 text-center">
						<img src="../images/avt.png" class="w-50 rounded-circle">
						</div>

						<!-- noidung -->
						<div class="col-lg-9 col-sm-9 col-9" >
							<small class="text-primary">Người gửi: <?php echo $tb['HoTen']?></small>
							<br>
							<em class="text-primary" >
							<?php echo $tb['noidung']?>
							</em>
							<br>
							<small class="text-primary"><?php echo $tb['ThoiGian']?></small>
							<hr>
						</div>
						
						</div>
						</a>
						<?php
							$i++;
						}
						?>
					</li>
					</ul>
				</li>
		</ul>
		
		
	</div>
	<ul class="nav navbar-nav navbar-right">
		<li class="nav-item dropdown">
				<a class="nav-link" href=""><i class="fas fa-user-tie"></i> <?php echo $_SESSION['profilegv']['HoTen'];?>-[<?php echo $data['matk'];?><?php $s = sprintf('%04d', $_SESSION['profilegv']['MaGV']); echo $s;?>]</a>
				<div class="dropdown-content">
					<ul class="sub-menu">
						<li><a class="dropdown-item" href="profilegv.php"><i class="fas fa-id-badge"></i> Thông tin</a></li>
						<li><a class="dropdown-item" href="changepass.php" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fas fa-exchange-alt"></i> Đổi mật khẩu</a></li>
						<li><a class="dropdown-item" href="../logout.php?id=<?php echo $data['matk'];?><?php $s = sprintf('%04d', $_SESSION['profilegv']['MaGV']); echo $s;?>"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
					</ul>
				</div>
			</li>
			<!-- <li  class="nav-item">
					<a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
			</li> -->
		</ul>
</div>
</nav>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
			<h4 class="modal-title" style = "">Đổi mật khẩu</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <form action="../changepass.php" method = "POST">
			<!-- Modal body -->
			<div class="modal-body">
				<div class="form-group">
					<label>Mã Giáo Viên</label>
					<input type="text" class="form-control" placeholder="" name = "ma" value = "<?php echo $data['matk'];?><?php $s = sprintf('%04d', $_SESSION['profilegv']['MaGV']); echo $s;?>" readonly = "true">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Mật khẩu cũ</label>
					<input type="password" class="form-control" placeholder="" name ="passwordold">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Mật khẩu mới</label>
					<input type="password" class="form-control" placeholder="" name ="passwordnew">
				</div> <!-- form-group end.// -->
				<div class="form-group">
					<label>Nhập lại mật khẩu mới</label>
					<input type="password" class="form-control" placeholder="" name ="respasswordnew">
				</div> <!-- form-group end.// -->
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" name = "changepass">Save changes</button>
			</div>
		</form>
        
      </div>
    </div>
  </div>
  
</div>
