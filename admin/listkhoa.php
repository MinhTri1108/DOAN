<?php include_once 'headeradmin.php';
$sql = "SELECT * FROM dskhoa";
$kq = mysqli_query($conn, $sql);
function tong()
{
    include ('../config/connect.php');
    $tong = "SELECT COUNT(*) AS tong FROM dskhoa";
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
            <h4>Danh sách Khoa</h4>
            
        
        </div>
        <div class="col col-md-4">
        <h4></h4>

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="addkhoa.php"><i class="fas fa-user-plus"></i> Thêm Khoa</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số Khoa: <?php tong()?></p>
    </div>
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr style="background-color: #3b89d6;">
            <th>Tên Khoa</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
			while ($data = mysqli_fetch_array($kq))
			{
				$i=1;
		?>
            <tr>
                <th><a href="listlop.php?makhoa=<?php echo $data['MaKhoa']?>"><?php echo $data['TenKhoa']?></th>
                <th><a href="editkhoa.php?makhoa=<?php echo $data['MaKhoa']?>"><i class="fas fa-user-edit"></i></th>
                <th><a href="eletekhoa.php?makhoa=<?php echo $data['MaKhoa']?>"><i class="fas fa-trash-alt"></i></th>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    
</div>
<?php include '../footer.php'; ?>