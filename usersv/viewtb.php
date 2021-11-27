<?php include_once 'header.php';

$id = $_GET['id'];

$query ="UPDATE `thongbaosv` SET `status` = '0' WHERE `id` = $id;";
$kq= mysqli_query($conn, $query);

$sql = "SELECT quyen.*, dssinhvien.* FROM dssinhvien INNER JOIN quyen ON dssinhvien.idloaitk = quyen.idloaitk WHERE id = '".$id."'";
$kq1= mysqli_query($conn, $sql);

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
                                        <input type="text" class="form-control" id="name"  >
                                    </div>
                                    <div class="col form-group">
                                        <label for="name">
                                            Thời gian :</label>
                                        <input type="datetime-local" class="form-control" id="name"  >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col form-group">
                                        <label for="message">
                                            Nội dung:</label>
                                        <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="auto" value = "<?php echo $data['noidung'] ?>" required></textarea>
                                    </div>
                                </div>
                            </form>
                            
                    </div>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>