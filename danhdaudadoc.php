<?php include ('config/connect.php');
$id = $_GET['id'];
$query ="UPDATE `thongbaosv` SET `status` = '0' WHERE `MaSV` = '".$id."'";
$kq= mysqli_query($conn, $query);
if($kq)
    {
        header("Location: index.php");

    }
    else{
        echo "loi";
    }
?>
