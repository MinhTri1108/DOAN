<?php include_once 'header.php';
$sql1= "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, COUNT(DISTINCT HocKi) AS tong FROM dsmonhoc
INNER JOIN dsdiem ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc";
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
    WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' ORDER BY dsmonhoc.MaMonHoc ASC";
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
        <td><?php echo $data['DiemTBMon'];?></td>
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
            echo '<img style="width:15px;height:15px;" src="images/true.png" title="Bạn đã qua môn này">';
          }
          else
          {
            echo '<img style="width:15px;height:15px;" src="images/false.png" title="Bạn đã rớt môn này">';
          }
          ?>
        </td>
          <?php 
            $sumtb +=tongdiem($data['DiemTBMon'], $data['SoTinChi']);
            $sumtb4 += tongdiem4($data['Diem4'], $data['SoTinChi']);
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
            <p>- Điểm trung bình học kỳ (Hệ 10): <?php
            $diemtbhocki = $sumtb /$sumtc;
            echo round($diemtbhocki, 2);
            ?></p>
            
            <p>- Điểm trung bình học kỳ (Hệ 4): <?php
            $diemtbhocki4 = $sumtb4 /$sumtc;
            echo round($diemtbhocki4, 2);
            ?></p>
          </td>
          <td colspan="6">
          
              <?php for($j = 1; $j <= $x; $j++)
                {
                  echo $x;
                  echo '-';
                  echo $j;
              ?>

            <p>- Số tín chỉ tích lũy: </p>
            <p>- Điểm trung bình tích lũy (Hệ 10): </p>
            <p>- Điểm trung bình tích lũy (Hệ 4): </p>
          </td>
        </tr><?php
                }
                echo "<br>";
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
<?php include 'footer.php'; ?>