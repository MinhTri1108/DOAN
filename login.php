<?php 
session_start();
include ('config/connect.php');
include_once('headerlogo.php');
if(isset($_POST['dn']))
{
	$matk = $_POST['MaTK'];
	$password = $_POST['password']; 


	if($matk == "" || $password == "")
	{
		echo "khong duoc de trong mas hoac matkau";
	}
	else
	{
		//cat lay 5 gia tri dau
		// echo substr($matk, 0, 5);
		// echo "-";
		// echo substr($matk, -5);
		$idmatk = substr($matk, 0, 5);
		// echo $idmatk;
		// echo $matk - $idmatk;
		$idma= substr($matk, -4);
		$idmauser = ltrim($idma, '0');
		// echo "-";
		//thêm 0 vào trước
		// $idmauser = str_pad(substr($matk, -4), 4, '0', STR_PAD_LEFT); 
		// echo $idmauser;
		// echo "-";
		// loại bỏ các số 0 đầu tiên
		// $idmauser = ltrim($idmauser, '0');
		// echo $idmauser;
		// $sql= "SELECT * FROM quyen";
		// $qr= mysqli_query($conn,$sql);
		// $quyen = mysqli_fetch_array($qr)
		$status = 'Active now';
		switch($idmatk)
		{
			case '02021':
				$sql3= "SELECT * FROM dsadmin WHERE MaAdmin = '".$idmauser."' AND Password = '".$password."'";
				$qr3 =  mysqli_query($conn,$sql3) or die( mysqli_error($conn));
				
				if($row3 = mysqli_fetch_array($qr3))
				{
					$_SESSION['profileadmin']= $row3;
			 		header("Location: admin/indexadmin.php?id=$matk");

				}
				else
				{
					echo "That bai";
				}
				break;
			case '12021':
				$sql2= "SELECT * FROM dsgiaovien WHERE MaGV = '".$idmauser."' AND Password = '".$password."'";
				$qr2 =  mysqli_query($conn,$sql2);
				if($row2 = mysqli_fetch_array($qr2))
				{
					$_SESSION['profilegv']= $row2;
					$sqlonl= "UPDATE `dsgiaovien` SET `Status`='".$status."' WHERE `MaGV`= '".$idmauser."'";
					echo $sqlonl;
					$kqonl= mysqli_query($conn,$sqlonl);
					if($kqonl)
					{
						header("Location: usergv/indexgv.php?id=$matk");
					}
					else
					{
						echo "That bai";
					}
			 		
				}
				else
				{
					echo "That bai";
				}
				break;
			case '22021':
				$sql1= "SELECT * FROM dssinhvien WHERE MaSV = '".$idmauser."' AND Password = '".$password."'";
				$qr1 =  mysqli_query($conn,$sql1);
				if($row1 = mysqli_fetch_array($qr1))
				{
					$_SESSION['profile']= $row1;
					$sqlonl= "UPDATE `dssinhvien` SET `Status`='".$status."' WHERE `MaSV`= '".$idmauser."'";
					$kqonl= mysqli_query($conn,$sqlonl);
					if($kqonl)
					{
						header("Location: usersv/index.php?id=$matk");
					}
					else
					{
						echo "That bai";
					}
				}
				else
				{
					echo "That bai";
				}
				break;
			default:
				echo 'Không tìm thấy tài khoản';
				break;

		}
 	}
}
?>
<link rel="stylesheet" type="text/css" href="css/login.css">
	<div id="login">
		<form action="" method="POST" role="" id="form-login">
			<h2 class="form-heading"> Đăng nhập </h2>	
				<div class="form-group">
					<i class="fas fa-user"></i>
					<input type = "text" name="MaTK" placeholder = "Mã sinh viên" class="form-input">
				</div>
				<div class="form-group">
					<i class="fas fa-key"></i>
					<input type = "password" name="password" placeholder = "Mật khẩu" class="form-input">
					<div id="eye">
					<i class="fas fa-eye"></i>
					</div>
				</div>
				
				<button class="form-submit" name='dn'>Đăng nhập</button>
		</form>
	</div>
	<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous">
	</script>
	<script src="js/app.js"></script>
 