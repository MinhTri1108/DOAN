<?php include_once 'header.php';
$sql1= "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, COUNT(DISTINCT HocKi) AS tong FROM dsmonhoc
INNER JOIN dsdiem ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc";
$kq1 = mysqli_query($conn, $sql1);
if($data1 = mysqli_fetch_array($kq1))
    {
        for ($x = 1; $x <= $data1['tong']; $x++) {
            echo $x;
            for($j = 1; $j <=$x; $j++){
                echo "Học kì $j <br>";
            }
        }}
?>