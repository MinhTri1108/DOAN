<?php include_once 'header.php';
$sql = "SELECT * FROM `tailieu`";
$kq= mysqli_query($conn, $sql);
echo "<table>";
while($data = mysqli_fetch_array($kq))
{
    echo "<tr>";
    echo "<td>"; echo $data['File']; echo "</td>";
    echo "<td>";?><a download="<?php echo $data['File'];?>" href="downloads/<?php echo $data['File'];?>">download</a> <?php echo "</td>";
    echo "</tr>";

}
echo "</table>";
?>
<?php

if(isset($_GET['path']))
{
//Read the filename
$filename = $_GET['path'];
//Check the file exists or not
if(file_exists($filename)) {

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($filename).'"');
header('Content-Length: ' . filesize($filename));
header('Pragma: public');

//Clear system output buffer
flush();

//Read the size of the file
readfile($filename);

//Terminate from the script
die();
}
else{
echo "File does not exist.";
}
}
else
echo "Filename is not defined."
?>
<?php include 'footer.php'; ?>