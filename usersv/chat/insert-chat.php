
<?php
session_start();
    include_once "connect.php";
    if(isset($_SESSION['profile']['MaSV'])){
        $outgoing_id =  $_SESSION['profile']['MaSV'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = time();
        $thoigian = date ("Y-m-d H:i:s", $timestamp);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, ThoiGian)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '{$thoigian}')") or die();
        }
    }else{
        header("location: ../login.php");
    }
?>