<?php include ('config/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $layid = isset($_GET['malop']) ? $_GET['malop'] : '';
    $layidm = isset($_GET['mamonhoc']) ? $_GET['mamonhoc'] : '';
    $masv= isset($_POST['masv']) ? $_POST['masv'] : '';
    $diemcc = isset($_POST['diemcc']) ?$_POST['diemcc'] : '';
    $diemgk= isset($_POST['diemgk']) ? $_POST['diemgk'] : '';
    $diemthi= isset($_POST['diemthi']) ? $_POST['diemthi'] : '';
    // echo $diemcc;
    // echo "-";
    // $ks= (float)$diemcc*2;
    // echo $ks;
    // $ka= $diemcc*2;
    // echo $ka;
    $diemtb = ((($diemcc*1)+($diemgk*3)+($diemthi*6))/10);
    if($diemcc === NULL || $diemgk == NULL || $diemthi == NULL)
    {
        echo("<script>if(confirm('Bạn chưa nhập thông tin')){
            // Use AJAX here to send Query to a PHP file
            window.location='uploaddiem.php';
        } else {
            window.location='uploaddiem.php';
        };</script>");
    }
    else
    {
        $checkdk = "SELECT dsdiem.*, dslop.*, dsmonhoc.* FROM dsdiem
        INNER JOIN dsmonhoc ON dsdiem.MaMonHoc = dsmonhoc.MaMonHoc
        INNER JOIN dslop ON dslop.MaLop = dsmonhoc.MaLop
        WHERE dsdiem.MaMonHoc = '".$layidm."' AND dsdiem.MaSV = '".$masv."' AND dslop.MaLop = '".$layid."'";
        $kqcheckdk = mysqli_query($conn, $checkdk);
        if(mysqli_fetch_array($kqcheckdk))
        {
            echo("<script>if(confirm('Đã nhập điểm cho sinh viên này')){
                // Use AJAX here to send Query to a PHP file
                window.location='uploaddiem.php';
            } else {
                window.location='uploaddiem.php';
            };</script>");
        }
        else{
            $nhapdiem = "INSERT INTO `dsdiem`(`iddiem`, `MaMonHoc`, `MaSV`, `DiemCC`, `DiemGK`, `DiemThi`, `DiemTBMon`)
             VALUES ('','".$layidm."','".$masv."','".$diemcc."','".$diemgk."','".$diemthi."','".$diemtb."')";
            $kqnhap = mysqli_query($conn, $nhapdiem);
            if(($kqnhap))
            {
                echo("<script>if(confirm('Update điểm thành công')){
                    // Use AJAX here to send Query to a PHP file
                    window.location='uploaddiem.php';
                } else {
                    window.location='uploaddiem.php';
                };</script>");
            }
            else{
                echo("<script>if(confirm('Update điểm không thành công')){
                    // Use AJAX here to send Query to a PHP file
                    window.location='uploaddiem.php';
                } else {
                    window.location='uploaddiem.php';
                };</script>");
            }
        }
    }


}