<?php
    session_start();
    include ('../config/connect.php');

    $masv = $_SESSION['profile']['MaSV'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM dssinhvien WHERE NOT MaSV = {$masv} AND ( HoTen LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if($row= mysqli_num_rows($query) > 0){
        include_once "datalist.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>