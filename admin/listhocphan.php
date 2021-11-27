<?php include_once 'headeradmin.php';
$sql = "SELECT dsmonhoc.* , lichhoc.*, dstiethoc.*, thungay.*, dsphonghoc.*, dsgiaovien.* FROM lichhoc INNER JOIN dsmonhoc ON lichhoc.MaMonHoc = dsmonhoc.MaMonHoc INNER JOIN dsgiaovien ON dsmonhoc.MaMonHoc = dsgiaovien.MaMonHoc INNER JOIN dstiethoc ON lichhoc.idtiethoc = dstiethoc.idtiethoc INNER JOIN thungay ON lichhoc.idthu = thungay.idthu INNER JOIN dsphonghoc ON lichhoc.idphong = dsphonghoc.idphong";
$kq = mysqli_query($conn, $sql);
function tong()
{
    include ('../config/connect.php');
    $tong = "SELECT COUNT(*) AS tong FROM lichhoc";
    $kq1 = mysqli_query($conn, $tong);
    if($data1 = mysqli_fetch_array($kq1))
    {
        echo $data1['tong'];
    }
    else
        {
            echo'<script type="text/javascript">alert("lỗi ") </script> ';
        }
}
?>
<div class="container1">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách Môn học</h4>
            
        
        </div>
        <div class="col col-md-4">
        <h4></h4>

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="addhocphan.php"><i class="fas fa-user-plus"></i> Thêm Học Phần</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số học phần: <?php tong();?></p>    
    </div>
    <div style = " width:auto; height:auto;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
        <div>
            <th>Học Kì</th>
            <th>Môn học </th>
            <th>Lịch học</th>
            <th>Phòng học</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </div>
        </tr>
        <?php
			while ($data = mysqli_fetch_array($kq))
			{
				$i=1;
		?>
            <tr>
                <th><?php echo $data['HocKi']?></th>
                <th><?php echo $data['TenMonHoc']?></th>
                <th>
                    <i class="fas fa-calendar-alt"></i> <?php echo $data['thumay']?><br>
                    <i class="fas fa-book-reader"></i> <?php echo $data['TietHoc']?><br>
                    <i class="fas fa-clock"></i> Bắt đầu: <?php echo $data['GioHocBD']?><br>
                    <i class="fas fa-stopwatch"></i> Kết thúc: <?php echo $data['GioHocKT']?>
                </th>
                <th><?php echo $data['SoPhong']?></th>
                <th><a href="edithocphan.php?mahp=<?php echo $data['idlichhoc']?>"><i class="fas fa-user-edit"></i></th>
                <th><a href="deletehocphan.php?mahp=<?php echo $data['idlichhoc']?>"><i class="fas fa-trash-alt"></i></th>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    </div>
    
</div>
<?php include '../footer.php'; ?>