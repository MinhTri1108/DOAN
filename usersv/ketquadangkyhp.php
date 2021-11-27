<?php include_once 'header.php';
$sql1= "SELECT dsmonhoc.*, dsdiem.*, dangkymonhoc.*, COUNT(DISTINCT HocKi) AS tong FROM dsmonhoc
INNER JOIN dsdiem ON dsmonhoc.MaMonHoc = dsdiem.MaMonHoc
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."'";
$kq1 = mysqli_query($conn, $sql1);
?>
<div class="container">
    <h2>Kết quả đăng ký học phần</h2> 
    <table class="table table-bordered">  
    <thead>
      <tr>
        <th >Mã Môn Học</th>
        <th>Tên Môn Học</th>
        <th>Số tín chỉ</th>
        <th>Thời gian học</th>
        <th>Giảng Viên</th>
        <th>Ngày đăng ký</th>
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
            WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."' AND HocKi = '".$x."'";
            $kq2 = mysqli_query($conn, $tongtc);
                if($data2 = mysqli_fetch_array($kq2))
                {

?>
 
    <td colspan="7">Học kì: <?php echo $x;?> (<?php echo $data2['tongtc'];?> tín chỉ)</td>
    
    <?php
    }
    $sql = "SELECT dsmonhoc.* , lichhoc.*, dstiethoc.*, thungay.*, dsphonghoc.*, dsgiaovien.*,dangkymonhoc.* FROM lichhoc 
    INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc 
    INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc =dangkymonhoc.MaMonHoc
    INNER JOIN dsgiaovien ON dsmonhoc.MaMonHoc = dsgiaovien.MaMonHoc 
    INNER JOIN dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc 
    INNER JOIN thungay ON lichhoc.idthu = thungay.idthu 
    INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong WHERE dsmonhoc.HocKi = '".$x."' AND dsmonhoc.MaLop = '".$_SESSION['profile']['MaLop']."' AND dangkymonhoc.MaSV ='".$_SESSION['profile']['MaSV']."'";
    $kq = mysqli_query($conn, $sql);
    while ($data = mysqli_fetch_array($kq))
    {
        $i=1;

    ?>
    <tbody>
    <tr>
        <th><?php echo $data['MaMonHoc']?></th>
        <th><?php echo $data['TenMonHoc']?></th>
        <th><?php echo $data['SoTinChi']?></th>
        <th>
            <?php echo $data['thumay']?>
            <br>
            <?php echo $data['TietHoc']?>
            <br>
            Bắt đầu: <?php echo $data['GioHocBD']?>
            <br>
            Kết thúc: <?php echo $data['GioHocKT']?>
            <br>
            Phòng: <?php echo $data['SoPhong']?>
        </th>
        <th><?php echo $data['HoTen']?></th>
        <th><?php echo $data['NgayDangKy']?></th>
    </tr>
    
    </tbody>
    <?php
            $i++;
        }
      }
      
    }

    ?>
  </table>
  <span style = "font-weight:bold;">- Ghi chú: LT : Lý thuyết; TH: Thực hành; TT : Thực tập, thực tế ...</span>
</div>
<?php include '../footer.php'; ?>