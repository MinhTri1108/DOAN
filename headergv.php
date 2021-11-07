<?php include('headerlogo.php');
?>
<?php if(isset($_SESSION['profilegv'])) :?>
	<?php
		$sql = "SELECT quyen.*, dsgiaovien.* FROM dsgiaovien INNER JOIN quyen ON dsgiaovien.idloaitk = quyen.idloaitk WHERE MaGV = '".$_SESSION['profilegv']['MaGV']."'";
			
		$ds= mysqli_query($conn,$sql) or die ("khong connect duoc");

		$data = mysqli_fetch_array($ds);
		?>
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
	<a class="navbar-brand" href="indexgv.php">Trường DH Quy Nhơn</a>
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
						<li><a class="dropdown-item" href="">Thời khóa biểu giảng viên</a></li>
						<li><a class="dropdown-item" href="upfile.php">Cập nhật Tài liệu</a></li>
						<li><a class="dropdown-item" href="">Cập nhật điểm</a></li>
					</ul>
				</div>
			</li>
			<li  class="nav-item">
				<a class="nav-link" href=""><i class="fas fa-bell"></i> Thông báo</a>
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
						<li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
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
        
        <form action="changepass.php" method = "POST">
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
<?php else : ?>
	
	<?php 
		//echo '<script type="text/javascript">alert("Tài khoản của bạn chưa login. Xin mời bạn login") </script> ';
		// header("location:login.php"); 
		echo("<script>if(confirm('Bạn chưa Login, vui lòng nhấn OK để trở về trang Login')){
			// Use AJAX here to send Query to a PHP file
			window.location='login.php';
		 } else {
			window.location='login.php';
		 };</script>");
		?>
<?php endif; ?>