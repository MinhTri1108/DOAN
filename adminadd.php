<?php include_once 'headeradmin.php';
    if(isset($_POST['save3']))
    {
        $password= $_POST['password'];
        $hoten= $_POST['hoten'];
        $ns = $_POST['ngaysinh'];
        $cccd = $_POST['cccd'];
        $gt = isset($_POST['gender']) ? $_POST['gender'] : '';
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $lop = isset($_POST['lop']);
        if($password == NULL || $hoten == NULL || $ns == NULL || $cccd ==  NULL || $diachi == NULL || $sdt == NULL || $email == NULL || $lop == NULL)
        {
            echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
        }
        else
        {
            $sql1= "SELECT * FROM dssinhvien WHERE CMND = '".$cccd."'";
            $kq1 = mysqli_query($conn, $sql1);
            if(mysqli_fetch_array($kq1))
            {
                echo'<script type="text/javascript">alert("Tài khoản đã trùng") </script> ';
            }
            else
            {
                $sql = "INSERT INTO dssinhvien VALUES ('', '".$password."', '".$hoten."', '".$ns."', '".$cccd."','". $gt."','".$diachi."', '".$sdt."', '".$email."', '".$lop."', '3')";
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
    if(isset($_POST['save2']))
    {
        $password= $_POST['password'];
        $hoten= $_POST['hoten'];
        $ns = $_POST['ngaysinh'];
        $cccd = $_POST['cccd'];
        $gt = isset($_POST['gender']) ? $_POST['gender'] : '';
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $chuyennganh = isset($_POST['chuyennganh']) ? $_POST['chuyennganh'] : '';

        if($password == NULL || $hoten == NULL || $ns == NULL || $cccd ==  NULL || $diachi == NULL || $sdt == NULL || $email == NULL || $chuyennganh == NULL)
        {
            echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
        }
        else
        {
            $sql1= "SELECT * FROM dsgiaovien WHERE CMND = '".$cccd."'";
            $kq1 = mysqli_query($conn, $sql1);
            if(mysqli_fetch_array($kq1))
            {
                echo'<script type="text/javascript">alert("Tài khoản đã trùng") </script> ';
            }
            else
            {
                $sql = "INSERT INTO dsgiaovien VALUES ('', '".$password."', '".$hoten."', '".$ns."', '".$cccd."','". $gt."','".$diachi."', '".$sdt."', '".$email."', '".$chuyennganh."', '2')";
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
    if(isset($_POST['save1']))
    {
        $password= $_POST['password'];
        $hoten= $_POST['hoten'];
        $ns = $_POST['ngaysinh'];
        $cccd = $_POST['cccd'];
        $gt = isset($_POST['gender']) ? $_POST['gender'] : '';
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        if($password == NULL || $hoten == NULL || $ns == NULL || $cccd ==  NULL || $diachi == NULL || $sdt == NULL || $email == NULL)
        {
            echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
        }
        else
        {
            $sql1= "SELECT * FROM dsadmin WHERE CMND = '".$cccd."'";
            $kq1 = mysqli_query($conn, $sql1);
            if(mysqli_fetch_array($kq1))
            {
                echo'<script type="text/javascript">alert("Tài khoản đã trùng") </script> ';
            }
            else
            {
                $sql = "INSERT INTO dsadmin VALUES ('', '".$password."', '".$hoten."', '".$ns."', '".$cccd."','". $gt."','".$diachi."', '".$sdt."', '".$email."', '1')";
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
<link rel="stylesheet" type="text/css" href="css/profile.css">
<div id = "container">
    <h1 style="text-align: center" >Thêm tài khoản</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="addadmin-tab" data-toggle="tab" href="#addadmin" role="tab" aria-controls="addadmin" aria-selected="true">Thêm tài khoản ADMIN</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="addgv-tab" data-toggle="tab" href="#addgv" role="tab" aria-controls="addgv" aria-selected="false">Thêm tài khoản Giảng Viên</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="addsv-tab" data-toggle="tab" href="#addsv" role="tab" aria-controls="addsv" aria-selected="false">Thêm tài khoản Sinh Viên</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
    <!-- thêm admin -->
    <div class="tab-pane fade show active" id="addadmin" role="tabpanel" aria-labelledby="addadmin-tab">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thông tin cá nhân ADMIN (Quản lý Khoa)</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" class="form-control" placeholder="" name = "hoten">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="" name ="password">
                <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name = "ngaysinh">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>CMND/CCCD</label>
                <input type="text" class="form-control" name = "cccd">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                    <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam">
                <span class="form-check-label"> Nam </span>
                </label>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ">
                <span class="form-check-label"> Nữ</span>
                </label>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name = "diachi">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name = "sdt">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="" name ="email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name = "save1">Save </button>
            </div> <!-- form-group// -->                                                
        </form>
        </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
        </div> <!-- col.//-->

        </div> <!-- row.//-->


        </div> 
        <!--container end.//-->
    </div>
    <!-- kết thúc
    thêm giảng viên -->
    <div class="tab-pane fade" id="addgv" role="tabpanel" aria-labelledby="addgv-tab">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thông tin cá nhân Giảng Viên</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" class="form-control" placeholder="" name = "hoten">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="" name ="password">
                <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name = "ngaysinh">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>CMND/CCCD</label>
                <input type="text" class="form-control" name = "cccd">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                    <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam">
                <span class="form-check-label"> Nam </span>
                </label>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ">
                <span class="form-check-label"> Nữ</span>
                </label>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name = "diachi">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name = "sdt">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="" name ="email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> <!-- form-group end.// -->
            <div class="form-group">
            <label>Chuyên ngành</label>
                <select id="inputState" class="form-control" name ="chuyennganh">
                    <option value="" disabled selected>---Chọn---</option>
                    <?php
                    $listmon = "SELECT * FROM dsmonhoc";
                    $kqlist = mysqli_query($conn, $listmon);
                    while ($data = mysqli_fetch_array($kqlist))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['MaMonHoc']?>"><?php echo $data['TenMonHoc']?></option>
                    <!-- <option value="" disabled selected>---Chọn---</option>
                    <option value= "6">Lập trình web</option>
                    <option value= "5">Lập trình nhúng</option>
                    <option value= "8">Lập trình mobile</option>
                    <option value= "7">Cơ sở dữ liệu</option>
                    <option value= "9">Thiết kế phần mềm</option>
                    <option value= "10">Phân tích bảo trì phần mềm</option> -->
                    <?php
                        $i++;
                    }
                    ?>
                </select>
            </div> <!-- form-group end.// -->

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name = "save2">Save </button>
            </div> <!-- form-group// -->                                                
        </form>
        </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
        </div> <!-- col.//-->

        </div> <!-- row.//-->


        </div> 
        <!--container end.//-->
    </div>
    <!-- kết thúc
    thêm sinh viên -->
    <div class="tab-pane fade" id="addsv" role="tabpanel" aria-labelledby="addsv-tab">
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thông tin cá nhân Sinh Viên</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" class="form-control" placeholder="" name = "hoten">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="" name ="password">
                <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name = "ngaysinh">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>CMND/CCCD</label>
                <input type="text" class="form-control" name = "cccd">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                    <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam">
                <span class="form-check-label"> Nam </span>
                </label>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ">
                <span class="form-check-label"> Nữ</span>
                </label>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name = "diachi">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name = "sdt">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="" name ="email">
            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div> <!-- form-group end.// -->
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

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name = "save3">Save </button>
            </div> <!-- form-group// -->                                                
        </form>
        </article> <!-- card-body end .// -->
        </div> <!-- card.// -->
        </div> <!-- col.//-->

        </div> <!-- row.//-->


        </div> 
        <!--container end.//-->
    </div>
    <!-- kết thúc -->
    </div>
</div>

<?php include 'footer.php'; ?>