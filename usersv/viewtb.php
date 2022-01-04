<?php include_once 'header.php';

$id = $_GET['id'];

$query ="UPDATE `thongbaosv` SET `status` = '0' WHERE `id` = $id;";
$kq= mysqli_query($conn, $query);

$sql = "SELECT dssinhvien.MaSV, thongbaosv.*,dsadmin.* FROM thongbaosv 
INNER JOIN  dssinhvien on dssinhvien.MaSV = thongbaosv.MaSV 
INNER JOIN dsadmin on dsadmin.MaAdmin = thongbaosv.MaAdmin WHERE thongbaosv.MaSV = '".$_SESSION['profile']['MaSV']."' AND
thongbaosv.id = '".$id."'";
$kq1= mysqli_query($conn, $sql);
if($data = mysqli_fetch_array($kq1))
{
?>
<div class="container">
    <div class="row1">
        <div class="well well-lg">
            <div class="col">
                        <div class="col" id="form_container">
                            <h2>Thông báo</h2>
                            <!-- <p>
                            Gửi thông báo tới cho Sinh viên và giảng viên
                            </p> -->
                            <form role="form" method="post" id="reused_form">
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="name">
                                            Người gửi :</label>
                                        <input type="text" class="form-control" value = "<?php echo $data['HoTen']; ?>" readonly = "true">
                                    </div>
                                    <div class="col form-group">
                                        <label for="name">
                                            Thời gian :</label>
                                        <input type="datetime" class="form-control" value = "<?php echo $data['ThoiGian']; ?>"readonly = "true">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="message">
                                            Nội dung:</label>
                                        <textarea class="form-control" type="textarea" maxlength="6000" rows="7" readonly = "true"><?php echo $data['noidung'] ?></textarea>
                                    </div>
                                </div>
                            </form>
                            
                    </div>
            </div>
        </div>
    </div>
</div>
<?php }
else
{
    echo "loi";
}
?>
<?php include '../footer.php'; ?>