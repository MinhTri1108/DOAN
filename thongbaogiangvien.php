<?php include_once 'headeradmin.php';

$sqlgv = "SELECT thongbaogv.*, dsadmin.HoTen AS hotenadmin, dsgiaovien.*,quyen.* FROM thongbaogv 
INNER JOIN dsgiaovien ON thongbaogv.MaGV = dsgiaovien.MaGV
INNER JOIN quyen ON quyen.idloaitk=dsgiaovien.idloaitk
INNER JOIN dsadmin ON thongbaogv.MaAdmin = dsadmin.MaAdmin";
$kqgv = mysqli_query($conn, $sqlgv);
?>