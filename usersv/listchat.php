<?php include_once 'header.php';?>

<?php
    include_once ('../config/connect.php');
    $masv = $_SESSION['profile']['MaSV'];
    $sql = "SELECT * FROM dssinhvien WHERE NOT MaSV = '".$masv."' ORDER BY MaSV ASC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No Friend";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "datalist.php";
    }
    echo $output;
?>