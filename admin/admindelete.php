<?php
include ('../config/connect.php');
$matk = $_GET['matk'];
$madau = substr($matk, 0, 5);
$idcuoi1 = substr($matk, -4);
$idcuoi = ltrim($idcuoi1, '0');
switch($madau)
{
    case '22021':
        $sql1= "DELETE FROM dssinhvien WHERE MaSV= '".$idcuoi."'";
        $dl1= mysqli_query($conn, $sql1);
        if ($dl1) {
            echo("<script>if(confirm('Xóa tài khoản $matk thành công. Nhấn OK để quay về danh sách')){
                window.location='listaccountsv.php';
            } else {
                window.location='indexadmin.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
        break;
    case '12021':
        $sql2= "DELETE FROM dsgiaovien WHERE MaGV= '".$idcuoi."'";
        $dl2= mysqli_query($conn, $sql2);
        if ($dl2) {
            echo("<script>if(confirm('Xóa tài khoản $matk thành công. Nhấn OK để quay về danh sách')){
                window.location='listaccountgv.php';
            } else {
                window.location='indexadmin.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
        break;
    case '02021':
        $sql3= "DELETE FROM dsadmin WHERE MaAdmin= '".$idcuoi."'";
        $dl3= mysqli_query($conn, $sql3);
        if ($dl3) {
            echo("<script>if(confirm('Xóa tài khoản $matk thành công. Nhấn OK để quay về danh sách')){
                window.location='listaccountadmin.php';
            } else {
                window.location='indexadmin.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Không Xóa không thành công") </script> ';
        }
        break;
    default:
        echo 'Không tìm thấy tài khoản';
		break;
}
?>