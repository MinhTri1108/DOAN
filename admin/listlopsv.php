<?php include_once 'headeradmin.php';
$malop = $_GET['malop'];
$sql = "SELECT quyen.*, dssinhvien.*, dslop.*, dskhoahoc.*, dskhoa.*,hedaotao.* FROM dssinhvien INNER JOIN dslop ON dssinhvien.MaLop = dslop.MaLop INNER JOIN dskhoahoc ON dslop.MaKhoaHoc = dskhoahoc.MaKhoaHoc INNER JOIN hedaotao ON dslop.MaHeDT = hedaotao.MaHeDT INNER JOIN quyen ON dssinhvien.idloaitk = quyen.idloaitk INNER JOIN dskhoa ON dslop.MaKhoa = dskhoa.MaKhoa WHERE dssinhvien.MaLop ='".$malop."'";
$kq = mysqli_query($conn, $sql);
function tong()
{
    include ('../config/connect.php');
    $malop = $_GET['malop'];
    $tong = "SELECT COUNT(*) AS tong FROM dssinhvien WHERE dssinhvien.MaLop ='".$malop."'";
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
function tongnam()
{
    include ('../config/connect.php');
    $malop = $_GET['malop'];
    $tongnam = "SELECT COUNT(*) AS tongnam FROM dssinhvien WHERE GioiTinh = 'Nam' AND MaLop = '".$malop."'";
    $kq2 = mysqli_query($conn, $tongnam);
    if($data2 = mysqli_fetch_array($kq2))
    {
        echo $data2['tongnam'];
    }
    else
        {
            echo'<script type="text/javascript">alert("lỗi ") </script> ';
        }
}
function tongnu()
{
    include ('../config/connect.php');
    $malop = $_GET['malop'];
    $tongnu = "SELECT COUNT(*) AS tongnu FROM dssinhvien WHERE GioiTinh = 'Nữ' AND MaLop = '".$malop."'";
    $kq3 = mysqli_query($conn, $tongnu);
    if($data3 = mysqli_fetch_array($kq3))
    {
        echo $data3['tongnu'];
    }
    else
            {
                echo'<script type="text/javascript">alert("lỗi ") </script> ';
            }
    }
?>
<link rel="stylesheet" type="text/css" href="../css/.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script>
    $(document).ready(function() {
     
     // Cấu hình các nhãn phân trang
     $('#example').dataTable( {
         "language": {
         "sProcessing":   "Đang xử lý...",
         "sLengthMenu":   "Xem _MENU_ mục",
         "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
         "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
         "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
         "sInfoFiltered": "(được lọc từ _MAX_ mục)",
         "sInfoPostFix":  "",
         "sSearch":       "Tìm:",
         "sUrl":          "",
         "oPaginate": {
             "sFirst":    "Đầu",
             "sPrevious": "Trước",
             "sNext":     "Tiếp",
             "sLast":     "Cuối"
             }
         }
     } );
          
} );
</script> 
<div class="container1">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md-5">
            <h4>Danh sách sinh viên</h4>
            
        
        </div>
        <div class="col col-md-4">
        <h4>Tìm kiếm sinh viên</h4>

        </div>
        <div class="col col-md-3" style="text-align:center;">
            <h6><a href="adminadd.php"><i class="fas fa-user-plus"></i> Thêm Tài Khoản</a></h6>
        </div>
    </div>
    <div style ="display:flex;">
        <p>Tổng số sinh viên: <?php tong();?></p>
        <p style = "margin-left: 20px"> Tổng số sinh viên nam: <?php tongnam();?></p>
        <p style = "margin-left: 20px"> Tổng số sinh viên nữ: <?php tongnu();?></p>
    </div>
    <div style = " width:auto; height:auto;">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <tr style="background-color: #3b89d6;">
            <th>Mã sinh viên: </th>
            <th>Password</th>
            <th>Họ và tên</th>
            <th>Ngày sinh</th>
            <th>CCCD/CMND</th>
            <th>Giới Tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Khóa học</th>
            <th>Hệ đào tạo</th>
            <th>Khoa</th>
            <th>Lớp</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
			while ($data = mysqli_fetch_array($kq))
			{
				$i=1;
		?>
            <tr>
                <th><?php echo $data['matk']?><?php echo $data['MaSV']?></th>
                <th><?php echo $data['Password']?></th>
                <th><?php echo $data['HoTen']?></th>
                <th><?php echo $data['NgaySinh']?></th>
                <th><?php echo $data['CMND']?></th>
                <th><?php echo $data['GioiTinh']?></th>
                <th><?php echo $data['DiaChi']?></th>
                <th><?php echo $data['SDT']?></th>
                <th><?php echo $data['Email']?></th>
                <th><?php echo $data['TenKhoaHoc']?></th>
                <th><?php echo $data['TenHDT']?></th>
                <th><?php echo $data['TenKhoa']?></th>
                <th><?php echo $data['TenLop']?></th>
                <th><a href="adminedit.php?matk=<?php echo $data['matk']?><?php echo $data['MaSV']?>"><i class="fas fa-user-edit"></i></th>
                <th><a href="admindelete.php?matk=<?php echo $data['matk']?><?php echo $data['MaSV']?>"><i class="fas fa-trash-alt"></i></th>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
    </div>
    
</div>
<?php include '../footer.php'; ?>