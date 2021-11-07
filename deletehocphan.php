<?php
include ('config/connect.php');

$mahp= $_GET['mahp'];
$sql1= "DELETE FROM lichhoc WHERE idlichhoc= '".$mahp."'";
        $dl1= mysqli_query($conn, $sql1);
        if ($dl1) {
            echo("<script>if(confirm('Xóa mã học phần $mahp thành công. Nhấn OK để quay về danh sách')){
                window.location='listhocphan.php';
            } else {
                window.location='indexadmin.php';
            };</script>");
        }
        else {
            echo '<script type="text/javascript">alert("Xóa không thành công") </script> ';
        }
?>