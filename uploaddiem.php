<?php include('headergv.php');
$sql = "SELECT dsgiaovien.* , dsmonhoc.*, dslop.*, dangkymonhoc.*,dskhoahoc.*,dskhoa.* FROM dsmonhoc
INNER JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
INNER JOIN dslop ON dslop.MaLop = dsmonhoc.MaLop
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
INNER JOIN dskhoahoc on dskhoahoc.MaKhoaHoc = dslop.MaKhoaHoc
INNER JOIN dskhoa on dskhoa.MaKhoa = dslop.MaKhoa
WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."'";
$kq = mysqli_query($conn, $sql);


// function tong()
// {
//     include ('config/connect.php');
//     $tong = "SELECT COUNT(*) AS tong FROM dslop";
//     $kq1 = mysqli_query($conn, $tong);
//     if($data1 = mysqli_fetch_array($kq1))
//     {
//         echo $data1['tong'];
//     }
//     else
//         {
//             echo'<script type="text/javascript">alert("lỗi ") </script> ';
//         }
// }
?>

<div class="container1">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách Lớp Học</h4>
            
        
        </div>
    </div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr>
            <th>Tên Khoa</th>
            <th>Tên Lớp</th>
            <th>Khóa học</th>
            <th>Tên Môn Học</th>
        </tr>
        <?php
			while ($data = mysqli_fetch_array($kq))
			{
				$i=1;
		?>
            <tr>
                <th><?php echo $data['TenKhoa']?></th>
                <th><a href="dsupdiemsv.php?malop=<?php echo $data['MaLop']?>&mamonhoc=<?php echo $data['MaMonHoc']?>"><?php echo $data['TenLop']?></i></th>
                <th><?php echo $data['TenKhoaHoc']?></th>
                <th><?php echo $data['TenMonHoc']?></th>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    
</div>
<?php include('footer.php');?>