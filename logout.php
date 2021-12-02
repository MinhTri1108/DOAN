<?php
session_start();
include ('config/connect.php');
$matk = $_GET['id'];
$idmatk = substr($matk, 0, 5);
$idma= substr($matk, -4);
$idmauser = ltrim($idma, '0');
// echo $idmatk;
// echo "-";
// echo $idmauser;
$status = "Offline now";
switch($idmatk)
{
    case '12021':
        $sqloff= "UPDATE `dsgiaovien` SET `Status`='".$status."' WHERE `MaGV`= '".$idmauser."'";
        $kqonl= mysqli_query($conn,$sqloff);
        if($kqonl)
        {
            session_destroy(); //destroy the session
            header("location:login.php"); //to redirect back to "index.php" after logging out
            exit();
        }
        break;
    case '22021':
        $sqloff= "UPDATE `dssinhvien` SET `Status`='".$status."' WHERE `MaSV`= '".$idmauser."'";
        $kqonl= mysqli_query($conn,$sqloff);
        if($kqonl)
        {
            session_destroy(); //destroy the session
            header("location:login.php"); //to redirect back to "index.php" after logging out
            exit();
        }
        break;
    default:
        echo 'Không tìm thấy tài khoản';
        break;

}
// $sqloff= "UPDATE `dssinhvien` SET `Status`='".$status."' WHERE `MaSV`= '".$idmauser."'";
// $kqonl= mysqli_query($conn,$sqloff);
// unset($_SESSION['profile']);
// unset($_SESSION['matk']);
// header('location: login.php');
// session_start(); //to ensure you are using same session
// session_destroy(); //destroy the session
// header("location:login.php"); //to redirect back to "index.php" after logging out

?>