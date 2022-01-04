<?php include_once 'headeradmin.php';
if(isset($_POST['save']))
{
    $doituong = $_POST['doituong'];
    $noidung = $_POST['message'];
    $diadiem = $_POST['diadiem'];
    $thoigian = $_POST['thoigian'];
    $ghichu = $_POST['ghichu'];
    // echo $doituong;
    // echo "-";
    // echo $noidung;
    // echo "-";
    // echo $diadiem;
    // echo "-";
    // echo $thoigian;
    // echo "-";
    // echo $ghichu;
}
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thêm Lịch làm việc</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            
            <div class="form-group">
            <label>Chọn đối tượng: (Sinh viên/ Giảng viên)</label>
                <select id="inputState" class="form-control" name ="doituong">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listmh = "SELECT * FROM quyen WHERE NOT matk = '02021'";
                    $kqlistmh = mysqli_query($conn, $listmh);
                    while ($data = mysqli_fetch_array($kqlistmh))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['matk']?>"><?php echo $data['tentk']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->
            
            <div class="form-group">
                <label for= "message">Nội dung</label>
                <br>
                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7" required></textarea>
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <label>Địa điểm</label>
                <input type="text" class="form-control" placeholder="" name = "diadiem">
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <label>Thời gian</label>
                <input type="datetime-local" class="form-control" placeholder="" name = "thoigian">
            </div> <!-- form-group end.// -->
            
            <div class="form-group">
                <label>Ghi chú</label>
                <input type="text" class="form-control" placeholder="" name = "ghichu">
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name = "save">Save </button>
            </div> <!-- form-group// -->                                                
        </form>
        </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
        </div> <!-- col.//-->
    </div> <!-- row.//-->
</div> 
<?php include '../footer.php'; ?>