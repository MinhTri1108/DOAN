<?php include_once 'header.php';
$sql = "SELECT tailieu.*, dsgiaovien.*, dsmonhoc.*,dangkymonhoc.* FROM tailieu
INNER JOIN dsgiaovien ON dsgiaovien.MaGV = tailieu.MaGV
INNER JOIN dsmonhoc ON dsmonhoc.MaMonHoc =dsgiaovien.MaMonHoc
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
WHERE dangkymonhoc.MaSV = '".$_SESSION['profile']['MaSV']."'";
$kq= mysqli_query($conn, $sql);
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
    <h2>Danh sách tài liệu</h2> 
    <table class="table table-bordered">  
    <thead>
      <tr>
        <th>Người gửi</th>
        <th>Tên Môn Học</th>
        <th>Mô tả</th>
        <th>Tải xuống</th>
      </tr>
    </thead>  
    <?php
    while ($data = mysqli_fetch_array($kq))
    {
        $i=1;

    ?>
    <tbody>
    <tr>
        <th><?php echo $data['HoTen']?></th>
        <th><?php echo $data['TenMonHoc']?></th>
        <th><?php echo $data['MoTa']?></th>
        <th><a download="<?php echo $data['File'];?>" href="downloads/<?php echo $data['File'];?>"><i class="fas fa-file-download"></i> Download</a></th>
    </tr>
    
    </tbody>
    <?php
            $i++;
        }

    ?>
  </table>
</div>
<?php include 'footer.php'; ?>