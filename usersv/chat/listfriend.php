    <?php
    session_start();
    include_once ("connect.php");
    $outgoing_id = $_SESSION['profile']['MaSV'];
    $sql = "SELECT * FROM dssinhvien WHERE NOT MaSV = {$outgoing_id} ORDER BY MaSV DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "dulieufriend.php";
    }
    echo $output;
?>