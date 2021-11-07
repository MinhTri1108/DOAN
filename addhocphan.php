<?php include_once 'headeradmin.php';
if(isset($_POST['save']))
{
    $mamonhoc = isset($_POST['mamonhoc']) ? $_POST['mamonhoc'] : '';
    $thu = isset($_POST['thu']) ? $_POST['thu'] : '';
    $tiethoc = isset($_POST['tiethoc']) ? $_POST['tiethoc'] : '';
    $phong = isset($_POST['phong']) ? $_POST['phong'] : '';
    if($mamonhoc == NULL || $thu == NULL || $tiethoc == NULL || $phong == NULL)
    {
        echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
    }
    else
    {
        $sql1= "SELECT * FROM `lichhoc` WHERE `idthu` = '". $thu."' AND `idtiethoc` = '".$tiethoc."' AND `idphong` = '".$phong."'";
            $kq1 = mysqli_query($conn, $sql1);
            if($row = mysqli_fetch_array($kq1))
            {
                echo'<script type="text/javascript">alert("Tài khoản đã trùng") </script> ';
            }
            else
            {
                $sql = "INSERT INTO lichhoc VALUES ('', '".$mamonhoc."', '".$thu."', '".$tiethoc."', '".$phong."')";
                $kq = mysqli_query($conn, $sql);
                if($kq)
                    {
                        echo'<script type="text/javascript">alert("Bạn tạo học phần thành công") </script> ';
                    }
                else
                    {
                        echo'<script type="text/javascript">alert("Thất bại") </script> ';
                    }
            }
    }
}

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thêm Lịch Học Phần</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            
            <div class="form-group">
            <label>Môn Học</label>
                <select id="inputState" class="form-control" name ="mamonhoc">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listmh = "SELECT * FROM dsmonhoc";
                    $kqlistmh = mysqli_query($conn, $listmh);
                    while ($data = mysqli_fetch_array($kqlistmh))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['MaMonHoc']?>"><?php echo $data['TenMonHoc']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->
            
            <div class="form-group">
            <label>Thứ?</label>
                <select id="inputState" class="form-control" name ="thu">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listt = "SELECT * FROM thungay";
                    $kqlistt = mysqli_query($conn, $listt);
                    while ($data1 = mysqli_fetch_array($kqlistt))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data1['idthu']?>"><?php echo $data1['thumay']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->

            <div class="form-group">
            <label>Tiết học</label>
                <select id="inputState" class="form-control" name ="tiethoc">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listth = "SELECT * FROM dstiethoc";
                    $kqlistth = mysqli_query($conn, $listth);
                    while ($data2 = mysqli_fetch_array($kqlistth))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data2['idtiethoc']?>"><?php echo $data2['TietHoc']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->

            <div class="form-group">
            <label>Phòng học</label>
                <select id="inputState" class="form-control" name ="phong">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listp = "SELECT * FROM dsphonghoc";
                    $kqlistp = mysqli_query($conn, $listp);
                    while ($data3 = mysqli_fetch_array($kqlistp))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data3['idphong']?>"><?php echo $data3['SoPhong']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
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
<?php include 'footer.php'; ?>