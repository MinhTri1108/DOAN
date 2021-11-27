<?php include ('config/connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if(isset($_POST['changepass']))
    {
        $ma = $_POST['ma'];
        $passwordold = $_POST['passwordold'];
        $passwordnew = $_POST['passwordnew'];
        $check = $_POST['respasswordnew'];
        // echo $ma;
        // echo $passwordold;
        // echo $passwordnew;
        $ktrama = substr($ma, 0, 5);
		$idma= substr($ma, -4);
		$mauser = ltrim($idma, '0');
        switch($ktrama)
        {
            case '02021':
                if($passwordnew == NULL || $passwordold == NULL || $check == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='admin/indexadmin.php';
                    } else {
                        window.location='admin/indexadmin.php';
                    };</script>");
                }
                else
                {
                    if($check === $passwordnew)
                    {
                        $checkma = "SELECT * FROM `dsadmin` WHERE `MaAdmin` = '".$mauser."' AND`Password` = '".$passwordold."'";
                        $ktra =  mysqli_query($conn,$checkma);
                        if(mysqli_fetch_array($ktra))
                        {
                            $up = "UPDATE `dsadmin` SET `Password`= '".$passwordnew."' WHERE (`MaAdmin` = '".$mauser."' AND`Password` = '".$passwordold."')";
                            $knup =  mysqli_query($conn,$up);
                            if($knup)
                            {
                                echo("<script>if(confirm('Bạn đổi mật khẩu thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='admin/indexadmin.php';
                                } else {
                                    window.location='admin/indexadmin.php';
                                };</script>");
                            }
                            else{
                                echo("<script>if(confirm('Bạn đổi mật khẩu không thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='admin/indexadmin.php';
                                } else {
                                    window.location='admin/indexadmin.php';
                                };</script>");
                            }
                        }
                        else
                        {
                            echo("<script>if(confirm('Bạn nhập sai mật khẩu cũ. Vui lòng nhập lại.')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='admin/indexadmin.php';
                            } else {
                                window.location='admin/indexadmin.php';
                            };</script>");
                        }
                    }
                    else
                    {
                        echo("<script>if(confirm('Nhập lại mật khẩu mới sai.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='admin/indexadmin.php';
                        } else {
                            window.location='admin/indexadmin.php';
                        };</script>");
                    }
                }
				break;
			case '12021':
                if($passwordnew == NULL || $passwordold == NULL || $check == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='usergv/indexgv.php';
                    } else {
                        window.location='usergv/indexgv.php';
                    };</script>");
                }
                else
                {
                    if($check === $passwordnew)
                    {
                        $checkma = "SELECT * FROM `dsgiaovien` WHERE `MaGV` = '".$mauser."' AND`Password` = '".$passwordold."'";
                        $ktra =  mysqli_query($conn,$checkma);
                        if(mysqli_fetch_array($ktra))
                        {
                            $up = "UPDATE `dsgiaovien` SET `Password`= '".$passwordnew."' WHERE (`MaGV` = '".$mauser."' AND`Password` = '".$passwordold."')";
                            $knup =  mysqli_query($conn,$up);
                            if($knup)
                            {
                                echo("<script>if(confirm('Bạn đổi mật khẩu thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='usergv/indexgv.php';
                                } else {
                                    window.location='usergv/indexgv.php';
                                };</script>");
                            }
                            else{
                                echo("<script>if(confirm('Bạn đổi mật khẩu không thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='usergv/indexgv.php';
                                } else {
                                    window.location='usergv/indexgv.php';
                                };</script>");
                            }
                        }
                        else
                        {
                            echo("<script>if(confirm('Bạn nhập sai mật khẩu cũ. Vui lòng nhập lại.')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='usergv/indexgv.php';
                            } else {
                                window.location='usergv/indexgv.php';
                            };</script>");
                        }
                    }
                    else
                    {
                        echo("<script>if(confirm('Nhập lại mật khẩu mới sai.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='usergv/indexgv.php';
                        } else {
                            window.location='usergv/indexgv.php';
                        };</script>");
                    }
                }
				break;
			case '22021':
                if($passwordnew == NULL || $passwordold == NULL || $check == NULL)
                {
                    echo("<script>if(confirm('Vui lòng không để trống thông tin.')){
                        // Use AJAX here to send Query to a PHP file
                        window.location='usersv/index.php';
                    } else {
                        window.location='usersv/index.php';
                    };</script>");
                }
                else
                {
                    if($check === $passwordnew)
                    {
                        $checkma = "SELECT * FROM `dssinhvien` WHERE `MaSV` = '".$mauser."' AND`Password` = '".$passwordold."'";
                        $ktra =  mysqli_query($conn,$checkma);
                        if(mysqli_fetch_array($ktra))
                        {
                            $up = "UPDATE `dssinhvien` SET `Password`= '".$passwordnew."' WHERE (`MaSV` = '".$mauser."' AND`Password` = '".$passwordold."')";
                            $knup =  mysqli_query($conn,$up);
                            if($knup)
                            {
                                echo("<script>if(confirm('Bạn đổi mật khẩu thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='usersv/index.php';
                                } else {
                                    window.location='usersv/index.php';
                                };</script>");
                            }
                            else{
                                echo("<script>if(confirm('Bạn đổi mật khẩu không thành công.')){
                                    // Use AJAX here to send Query to a PHP file
                                    window.location='usersv/index.php';
                                } else {
                                    window.location='usersv/index.php';
                                };</script>");
                            }
                        }
                        else
                        {
                            echo("<script>if(confirm('Bạn nhập sai mật khẩu cũ. Vui lòng nhập lại.')){
                                // Use AJAX here to send Query to a PHP file
                                window.location='usersv/index.php';
                            } else {
                                window.location='usersv/index.php';
                            };</script>");
                        }
                    }
                    else
                    {
                        echo("<script>if(confirm('Nhập lại mật khẩu mới sai.')){
                            // Use AJAX here to send Query to a PHP file
                            window.location='usersv/index.php';
                        } else {
                            window.location='usersv/index.php';
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