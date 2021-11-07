<?php include_once 'header.php';
$sql ="SELECT dsmonhoc.* , lichhoc.*, thungay.*, dstiethoc.*, dsphonghoc.*, dangkymonhoc.* FROM lichhoc
INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc
INNER JOIN thungay ON lichhoc.idthu = thungay.idthu
INNER JOIN  dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc
INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc";
?>

<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="css/thoikhoabieu.css">
 <!-- time-table -->
    <div class="content" style = "margin-top: 10px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mb30">
                <h2>Thời khóa biểu</h2>
                
                <div class="table-responsive">
                </div>
                <h4>Học kì</h4>
                <select id="mySelect" onchange="myFunction()">
                <option value="Audi">Audi
                <option value="BMW">BMW
                <option value="Mercedes">Mercedes
                <option value="Volvo">Volvo
                </select>
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
                            $checkp = "SELECT DISTINCT (SoPhong) AS SoPhong FROM dsphonghoc 
                            INNER JOIN lichhoc ON dsphonghoc.idphong = lichhoc.idphong
                            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = lichhoc.MaMonHoc
                            INNER JOIN dangkymonhoc ON dangkymonhoc.MaMonHoc = dsmonhoc.MaMonHoc WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."' ORDER BY SoPhong ASC";
                            $rest = mysqli_query($conn, $checkp);
                            while ($p = mysqli_fetch_array($rest)) 
                            {
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $p['SoPhong'] ?></td>
                                <?php
                                // echo $p['SoPhong'];
                                $checklist = "SELECT dsmonhoc.* , lichhoc.*, thungay.*, dstiethoc.*, dsphonghoc.*, dangkymonhoc.*, dsgiaovien.HoTen FROM lichhoc
                                INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc
                                INNER JOIN thungay ON lichhoc.idthu = thungay.idthu
                                INNER JOIN  dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc
                                INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong
                                inner JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
                                INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."' AND SoPhong ='".$p['SoPhong']."' ";
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
                                        <td class = "timetable-workout"><?php echo 'Môn: ' .$row['TenMonHoc'] . '<br />' . $row['TietHoc'] . ': (' . $row['GioHocBD'] . '=>' . $row['GioHocKT'] . ') </br> Giảng viên: ' . $row['HoTen'] . ''?></td>
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