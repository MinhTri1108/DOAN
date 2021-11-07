<?php include_once 'header.php';
$sql1= "SELECT COUNT(DISTINCT HocKi) AS tong FROM dsmonhoc";
$kq1 = mysqli_query($conn, $sql1);
?>
<div class="container">
    <h2>Chương trình đào tạo</h2> 
    <table class="table table-bordered">  
    <thead>
      <tr>
        <th >Mã Môn Học djsadsạkldj</th>
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

            $tongtc = "SELECT SUM(SoTinChi) AS tongtc FROM dsmonhoc WHERE MaLop = '".$_SESSION['profile']['MaLop']."' AND HocKi = '".$x."'";
            $kq2 = mysqli_query($conn, $tongtc);
                if($data2 = mysqli_fetch_array($kq2))
                {

?>
 
    <td colspan="8">Học kì: <?php echo $x;?> (<?php echo $data2['tongtc'];?> tín chỉ)</td>
    
    
    <?php
    }
    $sql = "SELECT * FROM `dsmonhoc` WHERE `HocKi` = '".$x."' AND MaLop = '".$_SESSION['profile']['MaLop']."'";
    $kq = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($kq))
    {
        $i=1;

    ?>
    <tbody>
      <tr>
        <td><?php echo $data['MaMonHoc'];?></td>
        <td><?php echo $data['TenMonHoc'];?></td>
        <td><?php echo $data['SoTinChi'];?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td style = "display: flex; justify-content: center; align-items: center;"><i class="far fa-list-alt"></i></td>
      </tr>
      
    </tbody>
    
    <?php
            $i++;
        }
        ?><tr colspan="8">
          <td colspan="4">hihi</td>
          <td colspan="4">hihi</td>
        </tr><?php
      }
      
    }

    ?>
  </table>
  <span style = "font-weight:bold;">- Ghi chú: LT : Lý thuyết; TH: Thực hành; TT : Thực tập, thực tế ...</span>
</div>
<?php include 'footer.php'; ?>