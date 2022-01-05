<?php include_once('headergv.php');date_default_timezone_set('Asia/Ho_Chi_Minh');
// $timestamp = date();
// $thoigian = date ("Y-m-d", $timestamp);
// $futureDate = mktime(0, 0, 0, date("m")+30, date("d"), date("Y"));
// $thoigian= date("Y-m-d", $futureDate);
$thoigian = date("Y-m-d");
?>
<link rel="stylesheet" type="text/css" href="../css/date.css">
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-2">
    <div class="calendar">
  <div class="header">
    <a data-action="prev-month" href="javascript:void(0)" title="Previous Month"><i></i></a>
    <div class="text" data-render="month-year"></div>
    <a data-action="next-month" href="javascript:void(0)" title="Next Month"><i></i></a>
  </div>
  <div class="months" data-flow="left">
    <div class="month month-a">
      <div class="render render-a"></div>
    </div>
    <div class="month month-b">
      <div class="render render-b"></div>
    </div>
  </div>
</div>
    </div>
    <div class="col-12 col-md-1">
    </div>
    <div class="col-12 col-md-8">
      <h5>Lịch hôm nay</h5>
    <table class="table" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">Nội dung</th>
      <th scope="col">Địa điểm</th>
      <th scope="col">Ngày</th>
      <th scope="col">Giờ</th>
      <th scope="col">Ghi chú</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $sqlgv = "SELECT * FROM lichlamviec WHERE Ngay = '".$thoigian."' AND DoiTuong = '12021'";
    $kqgv = mysqli_query($conn, $sqlgv) or die("loi");
    while($datagv = mysqli_fetch_array($kqgv))
    {
      $i=1;
    
    ?>
    
    <tr>
      <td><?php echo $datagv['NoiDung']?></td>
      <td><?php echo $datagv['DiaDiem']?></td>
      <td><?php echo $datagv['Ngay']?></td>
      <td><?php echo $datagv['Gio']?></td>
      <td><?php echo $datagv['GhiChu']?></td>
    </tr>
    <?php
      $i++;
    }
  ?>
  </tbody>
</table>
    </div>
  </div>
</div>

<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous">
	</script>
	<script src="../js/date.js"></script>
<?php include('../footer.php');?>