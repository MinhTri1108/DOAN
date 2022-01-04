<?php include_once ('../config/connect.php');
$id = $_GET['id'];
$query ="UPDATE `thongbaogv` SET `status` = '0' WHERE `MaGV` = '".$id."'";
$kq= mysqli_query($conn, $query);
if($kq)
    {
        header("Location: indexgv.php");

    }
    else{
        echo "loi";
    }
?>
