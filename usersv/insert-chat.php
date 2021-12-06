<?php 
    session_start();
    include_once "../config/connect.php";
    $nguoigui = $_SESSION['profile']['MaSV'];
    $nguoinhan = mysqli_real_escape_string($conn, $_POST['nguoinhan']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = time();
    $thoigian = date ("Y-m-d H:i:s", $timestamp);
    if(!empty($message)){
        $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, ThoiGian)
                                    VALUES ({$nguoinhan}, {$nguoigui}, '{$message}', ($thoigian))") or die();
    } 
?>