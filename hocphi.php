<?php include_once 'header.php';
$sql1= "SELECT COUNT(DISTINCT HocKi) AS tong, dangkymonhoc.* FROM dsmonhoc INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc";
$kq1 = mysqli_query($conn, $sql1);
function tongtien()
{
  include ('config/connect.php');
  $tongtc = "SELECT dsmonhoc.*, hocphi.*, dangkymonhoc.*, SUM(GiaTien) AS tongtt
            FROM dangkymonhoc 
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
            INNER JOIN hocphi ON dsmonhoc.SoTinChi = hocphi.SoTinChi WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."'";
            $kq2 = mysqli_query($conn, $tongtc);
                if($data2 = mysqli_fetch_array($kq2))
                {
                  echo $data2['tongtt'];
                }
                else
                {
                  echo "loi";
                }

}
?>
<div class="container">
    <h2>Học phí</h2> 
    <table class="table table-bordered">  
    <thead>
      <tr>
        <th>Mã Môn Học</th>
        <th>Tên Môn Học</th>
        <th>Số tín chỉ</th>
        <th>Giá tiền</th>
      </tr>
    </thead>  
<?php
if($data1 = mysqli_fetch_array($kq1))
    {
        for ($x = 1; $x <= $data1['tong']; $x++) {
            // echo "Học kì $x <br>";

            $tongtc = "SELECT dsmonhoc.*, hocphi.*, dangkymonhoc.*, SUM(GiaTien) AS tongtc
            FROM dangkymonhoc 
            INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
            INNER JOIN hocphi ON dsmonhoc.SoTinChi = hocphi.SoTinChi WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."' AND dsmonhoc.HocKi = '".$x."'";
            $kq2 = mysqli_query($conn, $tongtc);
                if($data2 = mysqli_fetch_array($kq2))
                {
        ?>

    <th colspan="7">Học kì: <?php echo $x;?> (Tổng học phí học kì <?php echo $x;?> là: <?php echo $data2['tongtc'];?> VND)</th>
    <?php
    }
    $sql = "SELECT dsmonhoc.*, hocphi.*, dangkymonhoc.*
    FROM dangkymonhoc 
    INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
    INNER JOIN hocphi ON dsmonhoc.SoTinChi = hocphi.SoTinChi WHERE dsmonhoc.HocKi = '".$x."' AND dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."'";
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
        <td><?php echo $data['GiaTien'];?></td>
      </tr>
    
    </tbody>
    <?php
            $i++;
        }
      }
    }

    ?>
  </table>
  <div style = "    font-weight: bold;
    color: #780000;
    font-size: larger;
    float: right;">
    <th>Tổng số tiền: <?php tongtien()?> VND</th>
  </div>
  
</div>
<?php include 'footer.php'; ?>