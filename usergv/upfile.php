<?php include('headergv.php');?>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if(($_POST['noidung']) == NULL)
            {
                echo '<script type="text/javascript">alert("Bạn không được để nội dung trống") </script> ';
            }
            else
            {
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $error = [];
                $sizebd = 10;
                $mota = $_POST['noidung'];
                $file = $_FILES['fileupload'];
                $timestamp = time();
                $thoigian = date ("Y-m-d H:i:s", $timestamp);
                
                // echo '<pre>';
                // print_r($file);
                // echo '</pre>';

                //Doi ten truoc khi up load

                $filename = $file['name'];
                $filename = explode('.', $filename);
                $ext = end($filename);
                $new_file = md5(uniqid()).'.'.$ext;

                //Kiem tra dinh dang

                $allow_ext = ['png', 'jpg', 'jpeg', 'gif', 'ppt', 'zip', 'pptx', 'doc', 'docx', 'xls', 'xlsx', 'txt', 'zip', 'rar'];
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
                            echo '<script type="text/javascript">alert("Thành công") </script> ';
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
                    echo '<script type="text/javascript">alert("Thành công") </script> ';
                }
            }

        }
    ?>
<link rel="stylesheet" type="text/css" href="../css/upfile.css">
    <div class="card-body px-sm-4 px-0">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 col">
                <h3 class="font-weight-bold ml-md-0 mx-auto text-center text-sm-left"> Upload file tài liệu </h3>
            </div>
        </div>
        <div class="row justify-content-center round">
            <div class="col-lg-10 col-md-12 ">
                <div class="card shadow-lg card-1">
                    <form action="" class="md-form" method="POST" enctype="multipart/form-data">
                        <div class="card-body inner-card">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-12">
                                    <div class="form-group files">
                                        <label class="my-auto">Upload Your File </label>
                                        <input id="file" type="file" class="form-control" name="fileupload"/></div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-lg-10 col-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea2">Message</label>
                                        <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="5" name="noidung"></textarea>
                                    </div>
                                    <div class="row justify-content-end mb-5">
                                        <div class="col-lg-4 col-auto ">
                                            <button type="submit" class="btn btn-primary btn-block" name="submit">
                                                <small class="font-weight-bold" >Upload tài liệu</small>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
$(".files").attr('data-before',"Drag file here or click the above button");
$('input[type="file"]').change(function(e){
var fileName = e.target.files[0].name;
$(".files").attr('data-before',fileName);

});
});
</script>
<?php include('../footer.php');?>

