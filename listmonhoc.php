<?php include_once 'headeradmin.php';
$malop = $_GET['malop'];
$sql = "SELECT dslop.*, dsmonhoc.*, hocphi.* FROM dsmonhoc INNER JOIN dslop ON dsmonhoc.MaLop = dslop.MaLop INNER JOIN hocphi ON dsmonhoc.SoTinChi = hocphi.SoTinChi WHERE dsmonhoc.MaLop ='".$malop."' ORDER BY HocKi ASC";
$kq = mysqli_query($conn, $sql);

function tong()
{
    include ('config/connect.php');
    $malop = $_GET['malop'];
    $tong = "SELECT COUNT(*) AS tong FROM dsmonhoc WHERE MaLop = '".$malop."'";
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
function tongtc()
{
    include ('config/connect.php');
    $malop = $_GET['malop'];
    $tongtc = "SELECT SUM(SoTinChi) AS tongtc FROM dsmonhoc WHERE MaLop = '".$malop."'";
    $kq2 = mysqli_query($conn, $tongtc);
    if($data2 = mysqli_fetch_array($kq2))
    {
        echo $data2['tongtc'];
    }
    else
        {
            echo'<script type="text/javascript">alert("lỗi ") </script> ';
        }
}
?>
<div class="container-fluid">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách Môn học</h4>
            
        
        </div>
        <div class="col col-md-4">
        <h4></h4>

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="addmonhoc.php"><i class="fas fa-user-plus"></i> Thêm Môn học</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số môn học: <?php tong();?></p>
        <p style = "margin-left: 20px"> Tổng số "Tín Chỉ": <?php tongtc()?></p>
    </div>
    
	<div class="row">
		<div class="col">
			<table id="example" class="display" width="100%" data-page-length="25" data-order="[[ 0, &quot;asc&quot; ]]">
		        <thead>
		            <tr>
                        <th>Học Kì</th>
                        <th>Môn học </th>
                        <th>Tín chỉ</th>
                        <th>Phải đóng</th>
                        <th data-orderable="false">Sửa</th>
                        <th data-orderable="false">Xóa</th>
		            </tr>
		        </thead>
		        <!-- <tfoot>
		            <tr>
                        <th>Học Kì</th>
                        <th>Môn học </th>
                        <th>Tín chỉ</th>
                        <th>Phải đóng</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </tfoot> -->
		        <tbody>
                <?php
                    while ($data = mysqli_fetch_array($kq))
                    {
                        $i=1;
                ?>
		            <tr>
                        <th><?php echo ($data['HocKi'])?></th>
                        <th><?php echo $data['TenMonHoc']?></th>
                        <th><?php echo $data['SoTinChi']?></th>
                        <th><?php echo $data['GiaTien']?></th>
                        <th><a href="editmonhoc.php?mamh=<?php echo $data['MaMonHoc']?>"><i class="fas fa-user-edit"></i></th>
                        <th><a href="deletemonhoc.php?mamh=<?php echo $data['MaMonHoc']?>"><i class="fas fa-trash-alt"></i></th>
                    </tr>
                    <?php
                        $i++;
                    }
                    ?>
		        </tbody>
		    </table>
		</div>
	</div>

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
    
</div>
<?php include 'footer.php'; ?>