<?php include_once 'header.php';
$mahp = $_GET['mahp'];
$masv = $_GET['masv'];
$tenhp = $_GET['tenmh'];

$sql = "DELETE FROM `dangkymonhoc` WHERE `MaSV` = '".$masv."' AND `MaMonHoc` = '".$mahp."'";
$kq= mysqli_query($conn, $sql);
if($kq)
{
    echo("<script>if(confirm('Bạn Hủy đăng ký học phần: \'$tenhp\' thành công. Bạn đồng ý quay trở về \'DANH SÁCH HỌC PHẦN\' ')){
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