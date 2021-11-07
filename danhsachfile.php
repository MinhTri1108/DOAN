<?php include('headerlogo.php');?>
<?php
$sql = "SELECT * FROM tailieu";
$kt = mysqli_query($conn, $sql);
?>
<table>
    <tr>
        <th>id</th>
        <th>mo ta</th>
        <th>file</th>
    </tr>
    <?php
			while ($data = mysqli_fetch_array($kt))
			{
				$i=1;
				?>
			<tr>
				<form action="" method="POST">
				<td><?php echo $data['id']; ?></td>
				<td><?php echo $data['MoTa']; ?></td>
				<td><a href="danhsachfile.php?file_id=<?php echo $data['id']; ?>"><?php echo $data['File']; ?></td>
			</tr>
			<?php
				$i++;
			}
			?>
</table>
<?php
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM tailieu WHERE id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_array($result);
    $filepath = 'downloads/' . $file['File'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' .basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('downloads/' . $file['File']));
        readfile($filepath);

        // Now update downloads count
        // $newCount = $file['downloads'] + 1;
        // $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        // mysqli_query($conn, $updateQuery);
        die();
    }
    else
    {
        echo "loi";
    }

}
// if(isset($_GET["id"])){
//     // Get parameters
//     $id = ($_GET["id"]); 
//     // $sql1 = "SELECT * FROM tailieu WHERE id=?";
//     // $kt1 = mysqli_query($conn, $sql1);
//     // $data1 = mysqli_fetch_array($kt1);
//     // Decode URL-encoded string
    
//     $filepath = 'downloads/'.$data1['File'];
    
//     // Process download
//     if(file_exists($filepath)) {
//         header('Content-Description: File Transfer');
//         header('Content-Type: application/octet-stream');
//         header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
//         header('Expires: 0');
//         header('Cache-Control: must-revalidate');
//         header('Pragma: public');
//         header('Content-Trasfer-Emcoding: binary');
//         header('Content-Length: ' . filesize($filepath));
//         flush(); // Flush system output buffer
//         readfile($filepath);
//         exit;
//     }
//     else
//     {
//         echo "lay file that bai";
//     }
// }
?>