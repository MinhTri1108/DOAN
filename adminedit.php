<?php include_once 'headeradmin.php';
$masinhvien = $_GET['matk'];
// $madau = substr($masinhvien, 0, 5);
// $idcuoi1 = substr($masinhvien, -4);
$hoten = $_GET['hoten'];
$ngaysinh = $_GET['ngaysinh'];
$cmnd = $_GET['cmnd'];
$gioitinh = isset($_GET['gioitinh']) ? $_GET['gioitinh'] : '';
$diachi = $_GET['diachi'];
$sdt = $_GET['sdt'];
$email = $_GET['email'];
$password= $_GET['pass'];
$malop = isset($_GET['malop']) ? $_GET['malop'] : '';
$tenlop = isset($_GET['tenlop']) ? $_GET['tenlop'] : '';
$mamonhoc = isset($_GET['mamonhoc']) ? $_GET['mamonhoc'] : '';
$tenmonhoc = isset($_GET['tenmonhoc']) ? $_GET['tenmonhoc'] : '';
// $idcuoi = ltrim($idcuoi1, '0');
// $sql = "SELECT quyen.*, dssinhvien.*, dslop.*, dskhoahoc.*, dskhoa.*,hedaotao.* FROM dssinhvien INNER JOIN dslop ON dssinhvien.MaLop = dslop.MaLop INNER JOIN dskhoahoc ON dslop.MaKhoaHoc = dskhoahoc.MaKhoaHoc INNER JOIN hedaotao ON dslop.MaHeDT = hedaotao.MaHeDT INNER JOIN quyen ON dssinhvien.idloaitk = quyen.idloaitk INNER JOIN dskhoa ON dslop.MaKhoa = dskhoa.MaKhoa WHERE MaSV = '".$idcuoi."' AND matk = '".$madau."'";
// $ds= mysqli_query($conn,$sql);
// if($data1 = mysqli_fetch_array($ds);)
// {
//     $s = sprintf('%04d', $data1['MaSV']);
// }
echo $malop;
echo $mamonhoc;
if(isset($_POST['save']))
{
    $masinhvien1 = $_POST['masv'];
    $madau = substr($masinhvien, 0, 5);
    $idcuoi = substr($masinhvien, -4);
    $idc = ltrim($idcuoi, '0');
    $hoten1 = $_POST['hoten'];
    $ngaysinh1 = $_POST['ngaysinh'];
    $cmnd1 = $_POST['cccd'];
    $gioitinh1 = isset($_POST['gender']) ? $_POST['gender'] : '';
    $diachi1 = $_POST['diachi'];
    $sdt1 = $_POST['sdt'];
    $email1 = $_POST['email'];
    $password1= $_POST['password'];
    $malop1 = isset($_POST['lop']) ? $_POST['lop'] : '';
    $mamonhoc1 = isset($_POST['monhoc']) ? $_POST['monhoc'] : '';
    if($password1 == NULL || $hoten1 == NULL || $ngaysinh1 == NULL || $cmnd1 ==  NULL || $gioitinh1 == NULL || $diachi1 == NULL || $sdt1 == NULL || $email1 == NULL)
        {
            echo'<script type="text/javascript">alert("Vui lòng điền đầy đủ thông tin") </script> ';
        }
    else
        {
            // $check1= "SELECT * FROM dsadmin WHERE CMND = '".$cmnd1."'";
            // $check2= "SELECT * FROM dsgiaovien WHERE CMND = '".$cmnd1."'";
            // $check3= "SELECT * FROM dssinhvien WHERE CMND = '".$cmnd1."'";
            // $kqc1 = mysqli_query($conn, $check1);
            // $kqc2 = mysqli_query($conn, $check2);
            // $kqc3 = mysqli_query($conn, $check3);
            // if(mysqli_fetch_array($kqc1) || mysqli_fetch_array($kqc2) || mysqli_fetch_array($kqc3))
            // {
            //     echo'<script type="text/javascript">alert("CMND đã trùng") </script> ';
            // }
            // else
            // {
                switch($madau)
                {
                    case '02021':
                        $sql ="UPDATE `dsadmin` SET `Password`='".$password1."',`HoTen`='".$hoten1."',`NgaySinh`='".$ngaysinh1."',`CMND`='".$cmnd1."',`GioiTinh`='".$gioitinh1."',`DiaChi`='".$diachi1."',`SDT`='".$sdt1."',`Email`='".$email1."' WHERE `MaAdmin` = '".$idc."'";
                        $qr= mysqli_query($conn, $sql);
                        if($qr)
                        {
                            echo("<script>if(confirm('Bạn thay đổi Mã Tài Khoản $masinhvien1 thành công. Bạn đồng ý quay trở về \'DANH SÁCH TÀI KHOẢN ADMIN\' ')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='listaccountadmin.php';
                            } else {
                                window.location='';
                            };</script>");
                        }
                        else
                        {
                            echo'<script type="text/javascript">alert("Thất bại") </script> ';
                        }
                    break;
                    case '12021':
                        $sql ="UPDATE `dsgiaovien` SET `Password`='".$password1."',`HoTen`='".$hoten1."',`NgaySinh`='".$ngaysinh1."',`CMND`='".$cmnd1."',`GioiTinh`='".$gioitinh1."',`DiaChi`='".$diachi1."',`SDT`='".$sdt1."',`Email`='".$email1."', `MaMonHoc`= '".$mamonhoc1."' WHERE `MaGV` = '".$idc."'";
                        $qr= mysqli_query($conn, $sql1);
                        if($qr)
                        {
                            echo("<script>if(confirm('Bạn thay đổi Mã Tài Khoản $masinhvien1 thành công. Bạn đồng ý quay trở về \'DANH SÁCH TÀI KHOẢN GIẢNG VIÊN\' ')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='listaccountgv.php';
                            } else {
                                window.location='';
                            };</script>");
                        }
                        else
                        {
                            echo'<script type="text/javascript">alert("Bạn chưa click chọn \'CHUYÊN NGÀNH\' của giảng viên") </script> ';
                        }
                    break;
                    case '22021':
                        $sql ="UPDATE `dssinhvien` SET `Password`='".$password1."',`HoTen`='".$hoten1."',`NgaySinh`='".$ngaysinh1."',`CMND`='".$cmnd1."',`GioiTinh`='".$gioitinh1."',`DiaChi`='".$diachi1."',`SDT`='".$sdt1."',`Email`='".$email1."', `MaLop`= '".$malop1."' WHERE `MaSV` = '".$idc."'";
                        $qr= mysqli_query($conn, $sql2);
                        if($qr)
                        {
                            echo("<script>if(confirm('Bạn thay đổi Mã Tài Khoản $masinhvien1 thành công. Bạn đồng ý quay trở về \'DANH SÁCH TÀI KHOẢN SINH VIÊN\' ')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='listaccountsv.php';
                            } else {
                                window.location='';
                            };</script>");
                        }
                        else
                        {
                            echo'<script type="text/javascript">alert("Bạn chưa click chọn \'LỚP\' của sinh viên") </script> ';
                        }
                    break;
                    default:
                        echo'<script type="text/javascript">alert("KHÔNG THỂ UPDATE") </script> ';
                            break;
                }
            }
        }
}


?>
<link rel="stylesheet" type="text/css" href="css/.css">
<div>

<a href="listaccountsv.php"><i class="fas fa-arrow-circle-left"></i> Quay về trang danh sách sinh viên</a>
<div class="container">
<form action="" method="POST">
        <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card">
        <header class="card-header">
        <h4 class="card-title mt-2">Thông tin cá nhân Sinh Viên</h4>
        </header>
        <article class="card-body">
        <form method="POST" action="">
        <div class="form-group">
                <label>Mã Sinh Viên</label>
                <input type="text" class="form-control" placeholder="" name = "masv" value = "<?php echo $masinhvien;?>"  readonly = "true">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Họ Tên</label>
                <input type="text" class="form-control" placeholder="" name = "hoten" value = "<?php echo $hoten;?>">
            </div> <!-- form-group end.// -->
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="" name ="password" value = "<?php echo $password;?>">
                <!-- <small class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name = "ngaysinh" value = "<?php echo $ngaysinh;?>">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>CMND/CCCD</label>
                <input type="text" class="form-control" name = "cccd" value = "<?php echo $cmnd;?>">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
            <?php if($gioitinh == "Nam") :?>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam" checked>
                <span class="form-check-label"> Nam </span>
                </label>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ">
                <span class="form-check-label"> Nữ</span>
                </label>
            <?php else :?>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nam">
                <span class="form-check-label"> Nam </span>
                </label>
                <label class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="Nữ"checked >
                <span class="form-check-label"> Nữ</span>
                </label>
            <?php endif; ?>
            </div> <!-- form-group end.// -->
            <div class="form-row">
                <div class="form-group col-md-6">
                <label>Địa chỉ</label>
                <input type="text" class="form-control" name = "diachi" value = "<?php echo $diachi;?>">
                </div> <!-- form-group end.// -->
                <div class="form-group col-md-6">
                <label>Số điện thoại</label>
                <input type="text" class="form-control" name = "sdt" value = "<?php echo $sdt;?>">
                </div> <!-- form-group end.// -->
            </div> <!-- form-row.// -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="" name ="email" value = "<?php echo $email;?>">
            
            </div> <!-- form-group end.// -->
            <?php if($malop) :?>
            <div class="form-group">
            <label>Lớp</label>
                <select id="inputState" class="form-control" name ="lop">
                    <option value = "<?php echo $malop;?>" disabled selected><?php echo $tenlop?></option>
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
                <small class="form-text text-muted" style = "color: #DC143C;">BẠN VUI LÒNG CLICK VÀO CHỌN LẠI LẠI. XIN LỖI VỀ SỰ CỐ NÀY</small>
            </div> <!-- form-group end.// -->
            <?php elseif($mamonhoc) : ?>
            <div class="form-group">
            <label>Chuyên môn</label>
                <select id="inputState" class="form-control" name ="monhoc">
                    <option value = "<?php echo $mamonhoc;?>" disabled selected><?php echo $tenmonhoc?></option>
                    <?php
                    $listlop = "SELECT * FROM dsmonhoc";
                    $kqlistl = mysqli_query($conn, $listlop);
                    while ($data = mysqli_fetch_array($kqlistl))
                    {
                        $i=1;
                    ?>
                    <option value= "<?php echo $data['MaMonHoc']?>"><?php echo $data['TenMonHoc']?></option>
                    <?php
                        $i++;
                    }
                    ?>
                </select>
                <small class="form-text text-muted" style = "color: #DC143C;">BẠN VUI LÒNG CLICK VÀO CHỌN LẠI. XIN LỖI VỀ SỰ CỐ NÀY</small>
            </div>
            <?php else : ?>
            <?php endif; ?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block" name = "save">Save </button>
            </div> <!-- form-group// --> 
</form>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>