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
        <th>Điểm 10</th>
        <th>Điểm 4</th>
        <th>Điểm chữ</th>
        <th>Kết quả</th>
        <th>Chi tiết</th>
      </tr>
    </thead>  
<?php
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
 
    <td colspan="8">Học kì: <?php echo $x;?> (<?php echo $data2['tongtc'];?> tín chỉ)</td>
    
    
    <?php
    }
    $sql = "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.* FROM dsdiem
    INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
    INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc
     WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."'";
    $kq = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($kq))
    {
        $i=1;

    ?>
    <tbody>
      <tr style="text-align:center">
        <td class="count"></td>
        <td><?php echo $data['MaMonHoc'];?></td>
        <td><?php echo $data['TenMonHoc'];?></td>
        <td><?php echo $data['SoTinChi'];?></td>
        <td><?php echo $data['DiemTBMon'];?></td>
        
          <?php
          $dtb = (double)$data['DiemTBMon'];
          if($dtb>=8.5 && $tb<=10)
          { ?>
            <td><?php echo "4.0";?></td>
            <td><?php echo "A";?></td>
          <?php }
          else if($dtb<8.4 && $dtb >=7.8)
          { ?>
            <td><?php echo "3.5";?></td>
            <td><?php echo "B+";?></td>
          <?php }
          else if($dtb<7.7 && $dtb>=7.0)
          { ?>
            <td><?php echo "3.0";?></td>
            <td><?php echo "B";?></td>
          <?php }
          else if($dtb<6.9 && $dtb>=6.3)
          { ?>
            <td><?php echo "2.5";?></td>
            <td><?php echo "C+";?></td>
          <?php }
          else if($dtb<5.5 && $dtb>=5.2)
          { ?>
            <td><?php echo "2.0";?></td>
            <td><?php echo "C";?></td>
          <?php }
          else if($dtb<5.4 && $dtb>=4.8)
          {?>
            <td><?php echo "1.5";?></td>
            <td><?php echo "D+";?></td>
          <?php}
          else if($dtb<4.7  && $dtb>=4.0)
          { ?>
            <td><?php echo "1.0";?></td>
            <td><?php echo "D";?></td>
          <?php }
          else if($dtb<3.9 && $dtb>=3.0)
          { ?>
            <td><?php echo "0.5";?></td>
            <td><?php echo "C+";?></td>
          <?php }
          else if($dtb<5.4 && $dtb>=4.8)
          { ?>
            <td><?php echo "0.0";?></td>
            <td><?php echo "F+";?></td>
          <?php }
          else
          { ?>
            <td><?php echo "4.0";?></td>
            <td><?php echo "F";?></td>
          <?php }
          ?>
        <td>
        <?php
          if($dtb>=4.0)
          {
            echo '<img src="images/true.png" title="Bạn đã qua môn này">';
          }
          else
          {
            echo '<img src="images/false.png" title="Bạn đã qua môn này">';
          }
          ?>
        </td>
        <td style = "display: flex; justify-content: center; align-items: center;">
        <img src="images/detail.png" title="View">
      </td>
      </tr>
      
    </tbody>
    
    <?php
            $i++;
        }
        ?><tr colspan="9">
          <td colspan="4">
            <p>- Tổng số tín chỉ: <?php echo $data2['tongtc'];?></p>
            <p>- Số tín chỉ đạt: Số tín chỉ không đạt: </p>
            <p>- Điểm trung bình học kỳ (Hệ 10): </p>
            <p>- Điểm trung bình học kỳ (Hệ 4): </p>
          </td>
          <td colspan="5">
          


            <p>- Số tín chỉ tích lũy: 17</p>
            <p>- Điểm trung bình tích lũy (Hệ 10): </p>
            <p>- Điểm trung bình tích lũy (Hệ 4): </p>
          </td>
        </tr><?php
      }
      
    }

    ?>
  </table>
  <span style = "font-weight:bold;">- Ghi chú: LT : Lý thuyết; TH: Thực hành; TT : Thực tập, thực tế ...</span>
</div>
<?php include 'footer.php'; ?>