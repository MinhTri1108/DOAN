<?php

// unset($_SESSION['profile']);
// unset($_SESSION['matk']);
// header('location: login.php');
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:login.php"); //to redirect back to "index.php" after logging out
exit();
?>