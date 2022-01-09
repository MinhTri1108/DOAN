<?php include_once 'header.php';
$mahp = $_GET['mahp'];
$masv = $_GET['masv'];
$tenhp = $_GET['tenmh'];
$giatien = $_GET['hocphi'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$timestamp = time();
$thoigian = date ("Y-m-d H:i:s", $timestamp);
$sql = "INSERT INTO `dangkymonhoc`VALUES ('','".$masv."','".$mahp."','".$giatien."','".$thoigian."')";
$kq= mysqli_query($conn, $sql);
if($kq)
{
    echo("<script>if(confirm('Bạn Đăng ký học phần: \'$tenhp\' thành công. Bạn đồng ý quay trở về \'DANH SÁCH HỌC PHẦN\' ')){
        // Use AJAX here to send Query to a PHP file
        window.location='dangkyhocphan.php';
    } else {
        window.location='index.php';
    };</script>");
}
else
{
    echo'<script type="text/javascript">alert("Thất bại") </script> ';
}
?> 