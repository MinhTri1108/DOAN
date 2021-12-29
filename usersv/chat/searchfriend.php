
<?php
    session_start();
    include_once ("connect.php");
    $outgoing_id = $_SESSION['profile']['MaSV'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM dssinhvien WHERE NOT MaSV = {$outgoing_id} AND (HoTen LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "dulieufriend.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>