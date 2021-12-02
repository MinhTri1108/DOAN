<?php include_once 'header.php';
$sql1= "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, COUNT(DISTINCT HocKi) AS tong FROM dsmonhoc
INNER JOIN dsdiem ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."'";
$kq1 = mysqli_query($conn, $sql1);
?>
<style>
table {
  counter-reset: section;
}

.count:before {
  counter-increment: section;
  content: counter(section);
}
</style>
<div class="container">
    <h2>Kết quả học tập</h2> 
    <table class="table table-bordered">  
    <thead>
      <tr>
        <th>STT</th>
        <th >Mã Môn Học</th>
        <th>Tên Môn Học</th>
        <th>Số tín chỉ</th>
        <th>Điểm CC</th>
        <th>Điểm GK</th>
        <th>Điểm Thi</th>
        <th>Điểm 10</th>
        <th>Điểm 4</th>
        <th>Điểm chữ</th>
        <th>Kết quả</th>
      </tr>
    </thead>  
<?php
$sumtb =0;
$sumtc = 0;
$sumtb4 =0;
if($data1 = mysqli_fetch_array($kq1))
    {
        for ($x = 1; $x <= $data1['tong']; $x++) {
            // echo "Học kì $x <br>";

            $tongtc = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*,SUM(SoTinChi) AS tongtc  FROM dsmonhoc
            INNER JOIN dsdiem ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
            INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
            WHERE MaLop = '".$_SESSION['profile']['MaLop']."' AND HocKi = '".$x."'";
            $kq2 = mysqli_query($conn, $tongtc);
                if($data2 = mysqli_fetch_array($kq2))
                {

            ?>
 
        <td colspan="11">Học kì: <?php echo $x;?> (<?php echo $data2['tongtc'];?> tín chỉ)</td>
        
        
        <?php
        }
        $sql = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.* FROM dsdiem
        INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
        INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
        WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' AND dsdiem.MaSV = '".$_SESSION['profile']['MaSV']."' ORDER BY dsmonhoc.MaMonHoc ASC";
        $kq = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($kq))
        {
            $i=1;

        ?>
        <tbody>
          <tr style="text-align:center">
            <td class="count"></td>
            <td><?php echo $data['MaMonHoc'];?></td>
            <td style="text-align: left"><?php echo $data['TenMonHoc'];?></td>
            <td><?php echo $data['SoTinChi'];
            $sumtc += $data['SoTinChi'];
            ?></td>
            <td><?php echo $data['DiemCC'];?></td>
            <td><?php echo $data['DiemGK'];?></td>
            <td><?php echo $data['DiemThi'];?></td>
            <td><?php echo round($data['DiemTBMon'],2);?></td>
            <td><?php echo $data['Diem4'];?></td>
              <?php
              $dtb = (double)$data['DiemTBMon'];
              if($dtb>=8.5 && $tb<=10)
              { ?>
                
                <td><?php echo "A";?></td>
              <?php }
              else if($dtb<8.4 && $dtb >=7.8)
              { ?>
                
                <td><?php echo "B+";?></td>
              <?php }
              else if($dtb<7.7 && $dtb>=7.0)
              { ?>
                
                <td><?php echo "B";?></td>
              <?php }
              else if($dtb<6.9 && $dtb>=6.3)
              { ?>
                
                <td><?php echo "C+";?></td>
              <?php }
              else if($dtb<6.2 && $dtb>=5.5)
              { ?>
                
                <td><?php echo "C";?></td>
              <?php }
              else if($dtb<5.4 && $dtb>=4.8)
              {?>
                
                <td><?php echo "D+";?></td>
              <?php}
              else if($dtb<4.7  && $dtb>=4.0)
              { ?>
                
                <td><?php echo "D";?></td>
              <?php }
              else if($dtb<3.9 && $dtb>=3.0)
              { ?>
                
                <td><?php echo "F+";?></td>
              <?php } 
              else
              { ?>
                
                <td><?php echo "F";?></td>
              <?php }
              ?>
            <td>
            <?php
              if($dtb>=4.0)
              {
                echo '<img style="width:15px;height:15px;" src="../images/true.png" title="Bạn đã qua môn này">';
              }
              else
              {
                echo '<img style="width:15px;height:15px;" src="../images/false.png" title="Bạn đã rớt môn này">';
              }
              ?>
            </td>
              <?php 
                // $sumtb +=tongdiem($data['DiemTBMon'], $data['SoTinChi']);
                // $diemtbhocki = $sumtb /$sumtc;
                // $sumtb4 += tongdiem4($data['Diem4'], $data['SoTinChi']);
                // $diemtbhocki4 = $sumtb4 /$sumtc;
              ?>
          </tr>
          
        </tbody>
    
    <?php
            $i++;
        }
        ?><tr colspan="11">
          <td colspan="5">
            <p>- Tổng số tín chỉ: <b><?php echo $data2['tongtc'];?></b> tín chỉ</p>
            <?php $tongtcqm = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, SUM(SoTinChi) AS tongqm FROM dsdiem
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
            INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
            WHERE MaLop = '".$_SESSION['profile']['MaLop']."' AND HocKi = '".$x."' AND dsdiem.DiemTBMon >= 4";
             $kqqm = mysqli_query($conn, $tongtcqm);
             if($tcqm = mysqli_fetch_array($kqqm))
             { ?>
                <p>- Số tín chỉ đạt: <b><?php echo $tcqm['tongqm'];?></b> tín chỉ</p>
            <?php }
            ?> 
            <?php $tongtcrm = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, SUM(SoTinChi) AS tongrm FROM dsdiem
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
            INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
            WHERE MaLop = '".$_SESSION['profile']['MaLop']."' AND HocKi = '".$x."' AND dsdiem.DiemTBMon < 4";
             $kqrm = mysqli_query($conn, $tongtcrm);
             if($tcrm = mysqli_fetch_array($kqrm))
             { 
              if($tcrm['tongrm'] == NULL)
              {
              ?>
              <p>- Số tín chỉ không đạt: <b>0</b> tín chỉ</p> 

            <?php 
              }
              else
              {
            ?>
                <p>- Số tín chỉ không đạt: <b><?php echo $tcrm['tongrm'];?></b> tín chỉ</p> 
            <?php
              }
            
              }
            ?>
            <?php
            $diemhockix = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, iddiem, (DiemTBMon*SoTinChi) AS nhan FROM dsdiem
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
            INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc
            WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' AND dsdiem.MaSV = '".$_SESSION['profile']['MaSV']."'";
            $kqdiemhkx = mysqli_query($conn, $diemhockix);
            $diemx=0;
            $tchk=0;
            while($diemtungki=mysqli_fetch_array($kqdiemhkx))
            {
              $diemx += $diemtungki['nhan'];
              $tchk += $diemtungki['SoTinChi'];
              // echo $diemx;
              

            }
            $diemtbhocki = ($diemx/$tchk);
            ?>
            <p>- Điểm trung bình học kỳ (Hệ 10): <b><?php
                                                                                                             
            echo round($diemtbhocki, 2);
            
            ?></b></p>
            <?php
            $diemhockix4 = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, iddiem, (Diem4*SoTinChi) AS nhan4 FROM dsdiem
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
            INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc
            WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' AND dsdiem.MaSV = '".$_SESSION['profile']['MaSV']."'";
            $kqdiemhkx4 = mysqli_query($conn, $diemhockix4);
            $diemx4=0;
            $tchk4=0;
            while($diemtungki4=mysqli_fetch_array($kqdiemhkx4))
            {
              $diemx4 += $diemtungki4['nhan4'];
              $tchk4 += $diemtungki4['SoTinChi'];
              // echo $diemx;
              

            }
            $diemtbhocki4 = ($diemx4/$tchk4);
            ?>
            <p>- Điểm trung bình học kỳ (Hệ 4): <b><?php
            
            echo round($diemtbhocki4, 2);
            ?></b></p>
          </td>
          <td colspan="6">
          
              <?php
              for($j = 1; $j <=$x; $j++){
                $sqltong = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.* FROM dsdiem
                INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
                INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
                WHERE dsmonhoc.HocKi <= '".$j."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' AND dsdiem.MaSV = '".$_SESSION['profile']['MaSV']."' ORDER BY dsmonhoc.MaMonHoc ASC";
                $kqtong =  mysqli_query($conn, $sqltong);
                $sumtbdiem = 0;
                $sumtb4diem = 0;
                $sumtcdiem =0;
                while($datatong = mysqli_fetch_array($kqtong))
                {
                  $a =1;
                    $sumtcdiem += $datatong['SoTinChi'];
                    $sumtbdiem +=tongdiem($datatong['DiemTBMon'], $datatong['SoTinChi']);
                    $sumtb4diem += tongdiem4($datatong['Diem4'], $datatong['SoTinChi']);
                  $a++;
                }
                $sqltc = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, SUM(SoTinChi) AS tongtcrt FROM dsdiem
                INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
                INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc 
                WHERE MaLop = '".$_SESSION['profile']['MaLop']."' AND HocKi <= '".$j."' AND dsdiem.DiemTBMon >= 4 AND dsdiem.MaSV = '".$_SESSION['profile']['MaSV']."'";
                $kqtc = mysqli_query($conn, $sqltc);
                if($tcrt = mysqli_fetch_array($kqtc))
                {
                  $tinchiratruong = $tcrt['tongtcrt']; 
                }
            }
              ?>
              <p>- Số tín chỉ tích lũy: <b><?php echo $tinchiratruong;?></b></p>

              <p>- Điểm trung bình tích lũy (Hệ 10): <b><?php
              $diemtbhockirt = $sumtbdiem /$sumtcdiem;
              echo round($diemtbhockirt, 2);
              ?></b></p>
              
              <p>- Điểm trung bình tích lũy (Hệ 4): <b><?php
              $diemtbhocki4rt = $sumtb4diem /$sumtcdiem;
              echo round($diemtbhocki4rt, 2);
              ?></b></p>
            
          </td>
        </tr><?php
      }
    }

    function tongdiem($diemtbm, $sotinchi)
    {
      $tong = ($diemtbm * $sotinchi);
      return $tong;
    }
    function tongdiem4($diem4, $sotinchi)
    {
      $tong4 = ($diem4 * $sotinchi);
      return $tong4;
    }
    ?>

  </table>
  <span style = "font-weight:bold;">- Ghi chú: LT : Lý thuyết; TH: Thực hành; TT : Thực tập, thực tế ...</span>
</div>
<?php include '../footer.php'; ?>