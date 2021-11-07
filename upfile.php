<?php include('headergv.php');?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $error = [];
            $sizebd = 10;
            $mota = $_POST['noidung'];
            $file = $_FILES['fileupload'];
            $timestamp = time();
            $thoigian = date ("Y-m-d H:i:s", $timestamp);
            
            echo '<pre>';
            print_r($file);
            echo '</pre>';

            //Doi ten truoc khi up load

            $filename = $file['name'];
            $filename = explode('.', $filename);
            $ext = end($filename);
            $new_file = md5(uniqid()).'.'.$ext;

            //Kiem tra dinh dang

            $allow_ext = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'txt'];
            if(in_array($ext, $allow_ext))
            {
                //Thoa man dieu kien file
                $size = $file['size']/1024/1024; //doi tu byte sang Mb

                if($size<=$sizebd){
                    $upload = move_uploaded_file($file['tmp_name'], 'downloads/'.$new_file);
                    $sql = "INSERT INTO tailieu VALUES ('', '".$_SESSION['profilegv']['MaGV']."','".$mota."','".$new_file."', '".$thoigian."')";
                    mysqli_query($conn,$sql) or die ("khong connect duoc");

                    if(!$upload)
                    {
                        $error[]= 'upload_error';
                    }
                    else{
                        echo "thanh cong";
                    }
                }
                else
                {
                    $error[] = 'size_error';
                }
            }
            else
            {
                $error[] = 'ext_error';
            }
            if(!empty($error))
            {
                $mess= '';
                if(in_array('ext_error', $error))
                {
                    $mess = 'Dinh dang file khong hop le';
                }
                elseif (in_array('size_error', $error))
                {
                    $mess = 'Dung luong khong duoc vuot qua' .$sizebd. 'MB';
                }
                else
                {
                    $error = 'ban khong the upload tai diem nay';
                }

                if(!empty($mess))
                {
                    echo $mess;
                }
            }
            else
            {
                echo "thanh cong";
            }

        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
    Mô tả chi tiết: 
    <input type="text" name="noidung">
    Chọn file để upload:
    <input type="file" name="fileupload">
    <input type="submit" value="Upload" name="submit">
</form>
<?php include('footer.php');?>

