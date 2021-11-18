<?php include_once 'headergv.php';
// $sql ="SELECT dsmonhoc.* , lichhoc.*, thungay.*, dstiethoc.*, dsphonghoc.*, dangkymonhoc.* FROM lichhoc
// INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc
// INNER JOIN thungay ON lichhoc.idthu = thungay.idthu
// INNER JOIN  dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc
// INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong
// INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc";
?>

<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/thoikhoabieu.css">
 <!-- time-table -->
    <div class="content" style = "margin-top: 10px;">
        <div class="container">
            
                <div class="row justify-content-center"><h1>Thời Khóa Biểu</h1></div>
                <div class="row ">
                    
                        <div class=" col  col-md-6 ">
                            <div class="form-group">
                            <form action="" method="post">
                            
                                <select id="mySelect" class="form-control" name = "hocki">
                                <option value="" disabled selected>---Học kì---</option>
                                <?php
                                $listmh = "SELECT DISTINCT HocKi FROM dsmonhoc";
                                $kqlistmh = mysqli_query($conn, $listmh);
                                while ($data = mysqli_fetch_array($kqlistmh))
                                {
                                    $i=1;
                                ?>
                                <option value= "<?php echo $data['HocKi']?>">Học kì: <?php echo $data['HocKi']?></option>
                                <?php
                                    $i++;
                                }
                                
                                ?>
                                </select>
                            </div>
                            </div>
                        <div class=" col col-md-6  "><button type="submit" class="btn btn-primary" name = "xem">Xem Thời Khóa Biểu</button></div>
                        </form>
                    </div>

                </div>
            </div>
                <div class="container"  style = "margin-top: 10px;">
            <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb30">
                
                    <table class="timetable table table-striped ">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Phòng</th>
                                <th scope="col">Monday</th>
                                <th scope="col">Tuesday</th>
                                <th scope="col">Wednesday</th>
                                <th scope="col">Thursday</th>
                                <th scope="col">Friday</th>
                                <th scope="col">Saturday</th>
                                <th scope="col">Sunday</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            <?php
                            if(isset($_POST['xem']))
                            {
                            $hocki = isset($_POST['hocki']) ? $_POST['hocki'] : '';
                            $checkp = "SELECT DISTINCT (SoPhong) AS SoPhong FROM dsphonghoc 
                            INNER JOIN lichhoc ON dsphonghoc.idphong = lichhoc.idphong
                            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = lichhoc.MaMonHoc
                            INNER JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."' AND dsmonhoc.HocKi = '".$hocki."' ORDER BY SoPhong ASC";
                            $rest = mysqli_query($conn, $checkp)or die( mysqli_error($conn));
                            while ($p = mysqli_fetch_array($rest)) 
                            {
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $p['SoPhong'] ?></td>
                                <?php
                                // echo $p['SoPhong'];
                                $checklist = "SELECT dsmonhoc.* , lichhoc.*, thungay.*, dstiethoc.*, dsphonghoc.*, dsgiaovien.MaGV, dslop.*,dskhoahoc.* FROM lichhoc
                                INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc
                                INNER JOIN thungay ON lichhoc.idthu = thungay.idthu
                                INNER JOIN  dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc
                                INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong
                                inner JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
                                INNER JOIN dslop ON dsmonhoc.MaLop = dslop.MaLop
                                inner join dskhoahoc on dslop.MaKhoaHoc = dskhoahoc.MaKhoaHoc
                                WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."' AND SoPhong ='".$p['SoPhong']."' AND dsmonhoc.HocKi = '".$hocki."' ";
                                $res = mysqli_query($conn, $checklist);
                                // $week_days = array('Monday','Tuesday','Wednesday','Thurshday','Friday', 'Saturday', 'Sunday');
                                $week_days = array('1','2','3','4','5', '6', '7');
                                $classes = array();
                                while($row = mysqli_fetch_array($res))
                                {
                                    $classes[$row['idthu']] = $row;
                                }
                                foreach ($week_days as $day) {
                                    ?>
                                        <?php 
                                        if (array_key_exists($day, $classes)) 
                                        { $row = $classes[$day]; ?>
                                        <td class = "timetable-workout"><?php echo 'Môn: ' .$row['TenMonHoc'] . '<br />' . $row['TietHoc'] . ': (' . $row['GioHocBD'] . '=>' . $row['GioHocKT'] . ') </br> Lớp học: ' . $row['TenLop'] . '</br> Khóa học: ' . $row['TenKhoaHoc'] . ''?></td>
                                        <?php 
                                        } 
                                        else 
                                        { ?>
                                        <td></td>
                                        <?php 
                                        }?>
                                        <?php    
                                        }
                                        ?>
                                        </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                        </tbody>
                        
                    </table>
                </div>
<!-- timetable -->   
            </div>
            
        </div>
    </div>
    <!-- /.time-table -->
<?php include 'footer.php'; ?>