<?php
include ('../config/connect.php');

$mamonhoc= $_GET['mamh'];
$sql1= "DELETE FROM dsmonhoc WHERE MaMonHoc= '".$mamonhoc."'";
        $dl1= mysqli_query($conn, $sql1);
        if ($dl1) {
            echo("<script>if(confirm('Xóa mã môn học $mamonhoc thành công. Nhấn OK để quay về danh sách')){
                window.location='listmonhoc.php';
            } else {
                window.location='indexadmin.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
?>