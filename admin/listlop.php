<?php include_once 'headeradmin.php';
$makhoa = $_GET['makhoa'];
$sql = "SELECT dslop.*, dskhoa.*, dskhoahoc.*, hedaotao.* FROM dslop INNER JOIN dskhoahoc ON dslop.MaKhoaHoc = dskhoahoc.MaKhoaHoc INNER JOIN hedaotao ON dslop.MaHeDT = hedaotao.MaHeDT INNER JOIN dskhoa ON dslop.MaKhoa = dskhoa.MaKhoa WHERE dslop.MaKhoa = '".$makhoa."'";
$kq = mysqli_query($conn, $sql);
function tong()
{
    include ('../config/connect.php');
    $tong = "SELECT COUNT(*) AS tong FROM dslop";
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
            <h4>Danh sách Lớp</h4>
            
        
        </div>
        <div class="col col-md-4">
        <h4></h4>

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="adminadd.php"><i class="fas fa-user-plus"></i> Thêm Lớp</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số Lớp: <?php tong()?></p>
    </div>
<div style = " width:auto; height:auto;">
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
        <tr style="background-color: #3b89d6;">
            <th>Hệ Đào Tạo</th>
            <th>Tên Khoa</th>
            <th>Tên Khóa Học</th>
            <th>Tên Lớp</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
			while ($data = mysqli_fetch_array($kq))
			{
				$i=1;
		?>
            <tr>
                <th><?php echo $data['TenHDT']?></th>
                <th><?php echo $data['TenKhoa']?></th>
                <th><?php echo $data['TenKhoaHoc']?></th>
                <th><a href="listlopsv.php?malop=<?php echo $data['MaLop']?>"><?php echo $data['TenLop']?></th>
                <th><a href="edit.php?malop=<?php echo $data['MaLop']?>"><i class="fas fa-user-edit"></i></th>
                <th><a href="delete.php?malop=<?php echo $data['MaLop']?>"><i class="fas fa-trash-alt"></i></th>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    </div>
</div>
<?php include '../footer.php'; ?>