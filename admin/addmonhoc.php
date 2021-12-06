<?php include_once 'headeradmin.php';
if(isset($_POST['save']))
{
    $tenmonhoc = isset($_POST['tenmonhoc']) ? $_POST['tenmonhoc'] : '';
    $tinchi = isset($_POST['tinchi']) ? $_POST['tinchi'] : '';
    $hocki = isset($_POST['hocki']) ? $_POST['hocki'] : '';
    $lop = isset($_POST['lop']) ? $_POST['lop'] : '';
    if($tenmonhoc == NULL || $tinchi == NULL || $hocki == NULL || $lop == NULL)
    {
        echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
    }
    else
    {
        $sql1= "SELECT * FROM dsmonhoc WHERE TenMonHoc = '".$tenmonhoc."' AND MaLop = '".$lop."'";
            $kq1 = mysqli_query($conn, $sql1);
            if($row = mysqli_fetch_array($kq1))
            {
                echo'<script type="text/javascript">alert("Tài khoản đã trùng") </script> ';
            }
            else
            {
                $sql = "INSERT INTO dsmonhoc VALUES ('', '".$tenmonhoc."', '".$hocki."', '".$tinchi."', '".$lop."')";
                $kq = mysqli_query($conn, $sql);
                if($kq)
                    {
                        echo'<script type="text/javascript">alert("Bạn đăng ký thành công") </script> ';
                    }
                else
                    {
                        echo'<script type="text/javascript">alert("Thất bại") </script> ';
                    }
            }
    }
}

?>
<div class="row ml-3 mt-3">
    <a href="listctdtlop.php" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Quay lại</a>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thêm Môn Học</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label>Tên môn học</label>
                <input type="text" class="form-control" placeholder="" name = "tenmonhoc">
            </div> <!-- form-group end.// -->

            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Số tín chỉ</label>
                <select id="inputState" class="form-control" name ="tinchi">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listhp = "SELECT * FROM hocphi";
                    $kqlisthp = mysqli_query($conn, $listhp);
                    while ($data = mysqli_fetch_array($kqlisthp))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['SoTinChi']?>"><?php echo $data['SoTinChi']?> Tín chỉ</option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>Học kì</label>
                <select id="inputState" class="form-control" name ="hocki">
                    <option value="" disabled selected>---Chọn---</option>
                    <option value="1" >Học kì 1</option>
                    <option value="2" >Học kì 2</option>
                    <option value="3" >Học kì 3</option>
                    <option value="4" >Học kì 4</option>
                    <option value="5" >Học kì 5</option>
                    <option value="6" >Học kì 6</option>
                    <option value="7" >Học kì 7</option>
                    <option value="8" >Học kì 8</option>
                    <option value="9" >Học kì 9</option>
                </select>
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
            <label>Lớp</label>
                <select id="inputState" class="form-control" name ="lop">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listlop = "SELECT * FROM dslop";
                    $kqlistl = mysqli_query($conn, $listlop);
                    while ($data = mysqli_fetch_array($kqlistl))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['MaLop']?>"><?php echo $data['TenLop']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->
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