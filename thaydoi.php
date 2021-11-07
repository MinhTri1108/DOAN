<?php include ('config/connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['edit']))
    {
        $ma = $_POST['ma'];
        $hoten= $_POST['hoten'];
        $ns = $_POST['ngaysinh'];
        $cccd = $_POST['cccd'];
        $gt = isset($_POST['gender']) ? $_POST['gender'] : '';
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];

        $ktrama = substr($ma, 0, 5);
		$idma= substr($ma, -4);
		$mauser = ltrim($idma, '0');

        switch($ktrama)
        {
            case '02021':
                if($hoten == NULL || $ns == NULL || $cccd == NULL ||$gt == NULL || $diachi == NULL || $sdt == NULL || $email == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='profileadmin.php';
                    } else {
                        window.location='profileadmin.php';
                    };</script>");
                }
                else
                {
                    // $checkcm = "SELECT * FROM dsadmin WHERE CMND = '".$cccd."'";
                    // $ktracheck = mysqli_query($conn, $checkcm) or die ("khong connect duoc");
                    // if(mysqli_fetch_array($ktracheck))
                    // {
                    //     echo("<script>if(confirm('CMND/CCCD đã tồn tại, vui lòng nhập lại.')){
                    //         // Use AJAX here to send Query to a PHP file
                    //         window.location='profileadmin.php';
                    //     } else {
                    //         window.location='profileadmin.php';
                    //     };</script>");
                    // }
                    // else
                    // {
                        $up = "UPDATE `dsadmin` SET `HoTen`='".$hoten."',`NgaySinh`='".$ns."',`CMND`='".$cccd."',`GioiTinh`='".$gt."',`DiaChi`='".$diachi."',`SDT`='".$sdt."',`Email`='".$email."' WHERE `MaAdmin` = '".$mauser."'";
                        $ktraup = mysqli_query($conn, $up) or die ("khong connect duoc");
                        if($ktraup)
                        {
                            echo("<script>if(confirm('Thay đổi thông tin thành công.')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='profileadmin.php';
                            } else {
                                window.location='profileadmin.php';
                            };</script>");
                        }
                        else
                        {
                            echo("<script>if(confirm('Cập nhật thông tin thất bại.')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='profileadmin.php';
                            } else {
                                window.location='profileadmin.php';
                            };</script>");
                        }
                    // }
                }
                break;
            case '12021':
                if($hoten == NULL || $ns == NULL || $cccd == NULL ||$gt == NULL || $diachi == NULL || $sdt == NULL || $email == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='profilegv.php';
                    } else {
                        window.location='profilegv.php';
                    };</script>");
                }
                else
                {
                    $up = "UPDATE `dsgiaovien` SET `HoTen`='".$hoten."',`NgaySinh`='".$ns."',`CMND`='".$cccd."',`GioiTinh`='".$gt."',`DiaChi`='".$diachi."',`SDT`='".$sdt."',`Email`='".$email."' WHERE `MaGV` = '".$mauser."'";
                    $ktraup = mysqli_query($conn, $up) or die ("khong connect duoc");
                    if($ktraup)
                    {
                        echo("<script>if(confirm('Thay đổi thông tin thành công.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='profilegv.php';
                        } else {
                            window.location='profilegv.php';
                        };</script>");
                    }
                    else
                    {
                        echo("<script>if(confirm('Cập nhật thông tin thất bại.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='profilegv.php';
                        } else {
                            window.location='profilegv.php';
                        };</script>");
                    }
                }
                break;
            case '22021':
                if($hoten == NULL || $ns == NULL || $cccd == NULL ||$gt == NULL || $diachi == NULL || $sdt == NULL || $email == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='profile.php';
                    } else {
                        window.location='profile.php';
                    };</script>");
                }
                else
                {
                    $up = "UPDATE `dssinhvien` SET `HoTen`='".$hoten."',`NgaySinh`='".$ns."',`CMND`='".$cccd."',`GioiTinh`='".$gt."',`DiaChi`='".$diachi."',`SDT`='".$sdt."',`Email`='".$email."' WHERE `MaSV` = '".$mauser."'";
                    $ktraup = mysqli_query($conn, $up) or die ("khong connect duoc");
                    if($ktraup)
                    {
                        echo("<script>if(confirm('Thay đổi thông tin thành công.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='profile.php';
                        } else {
                            window.location='profile.php';
                        };</script>");
                    }
                    else
                    {
                        echo("<script>if(confirm('Cập nhật thông tin thất bại.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='profile.php';
                        } else {
                            window.location='profile.php';
                        };</script>");
                    }
                }
                break;
            default:
				echo 'Không tìm thấy tài khoản';
				break;
        }
    }
}
?>