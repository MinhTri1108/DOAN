<?php
include ('../config/connect.php');
$matk = $_GET['mauser'];
$madau = substr($matk, 0, 5);
$idcuoi1 = substr($matk, -4);
$idcuoi = ltrim($idcuoi1, '0');
$thoigian =$_GET['thoigian'];
echo $thoigian;
switch($madau)
{
    case '22021':
        $sql1= "DELETE FROM thongbaosv WHERE MaSV= '".$idcuoi."' AND ThoiGian = '".$thoigian."'";
        $dl1= mysqli_query($conn, $sql1);
        if ($dl1) {
            echo("<script>if(confirm('Xóa thông báo của tài khoản $matk thành công. Nhấn OK để quay về danh sách')){
                window.location='guithongbao.php';
            } else {
                window.location='guithongbao.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
        break;
    case '12021':
        $sql1= "DELETE FROM thongbaogv WHERE MaGV= '".$idcuoi."' AND ThoiGian = '".$thoigian."'";
        $dl1= mysqli_query($conn, $sql1);
        if ($dl1) {
            echo("<script>if(confirm('Xóa thông báo của tài khoản $matk thành công. Nhấn OK để quay về danh sách')){
                window.location='thongbaogiangvien.php';
            } else {
                window.location='thongbaogiangvien.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
        break;
    default:
        echo 'Thao tác không thành công';
		break;
}
?>