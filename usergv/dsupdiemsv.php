<?php include('headergv.php');
$layid = isset($_GET['malop']) ? $_GET['malop'] : '';
$layidm = isset($_GET['mamonhoc']) ? $_GET['mamonhoc'] : '';
$sql = "SELECT dsgiaovien.MaGV , dsmonhoc.MaMonHoc, dslop.*, dangkymonhoc.*,dskhoahoc.*,dssinhvien.*,quyen.*,dsdiem.* FROM dsmonhoc
INNER JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
INNER JOIN dslop ON dslop.MaLop = dsmonhoc.MaLop
INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
INNER JOIN dskhoahoc on dskhoahoc.MaKhoaHoc = dslop.MaKhoaHoc
INNER JOIN dssinhvien on dssinhvien.MaSV = dangkymonhoc.MaSV
INNER JOIN quyen on dssinhvien.idloaitk = quyen.idloaitk
INNER JOIN dsdiem on dsdiem.MaMonHoc = dsmonhoc.MaMonHoc
WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."' AND dslop.MaLop = '".$layid."'";
$kq = mysqli_query($conn, $sql);

?>
<div class="container-fluid">
    <div class="row" style = "margin-top: 10px;">
        <div class="col col-md">
            <?php
            $lop = "SELECT dsgiaovien.*, dslop.*, dsmonhoc.* FROM dsmonhoc
            INNER JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
            INNER JOIN dslop ON dslop.MaLop = dsmonhoc.MaLop
            WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."' AND dslop.MaLop = '".$layid."'";
            $kq1 = mysqli_query($conn, $lop);
            if($data1 = mysqli_fetch_array($kq1))
            {
            ?>
            <h4>Danh sách sinh viên của lớp '<?php echo $data1['TenLop'];?>' </h4>
            <?php
            }   
            else
                {
                    echo'<script type="text/javascript">alert("lỗi ") </script> ';
                }
            ?>
        
        </div>
        <div style="margin-right:40px;">
            <!-- <a href="http://">Nhập điểm</a> -->
            <button type="" class="btn btn-primary" data-toggle="modal" data-target="#nhapDiem">Nhập điểm</button>
        </div>
        <!-- The Modal -->
            <div class="modal fade" id="nhapDiem">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style = "">Nhập điểm sinh viên</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <form action="xulydiem.php?malop=<?php echo $layid?>&mamonhoc=<?php echo $layidm?>" method = "POST">
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group">
                            <label>Mã sinh viên - Tên sinh viên</label>
                                <select id="inputState" class="form-control" name ="masv">
                                    <option value="" disabled selected>---Chọn---</option>
                                    <?php
                                    $listsv = "SELECT dsgiaovien.MaGV , dsmonhoc.MaMonHoc, dslop.*, dangkymonhoc.*,dssinhvien.*,quyen.*FROM dsmonhoc
                                    INNER JOIN dsgiaovien ON dsgiaovien.MaMonHoc = dsmonhoc.MaMonHoc
                                    INNER JOIN dslop ON dslop.MaLop = dsmonhoc.MaLop
                                    INNER JOIN dangkymonhoc ON dsmonhoc.MaMonHoc = dangkymonhoc.MaMonHoc
                                    INNER JOIN dssinhvien on dssinhvien.MaSV = dangkymonhoc.MaSV
                                    INNER JOIN quyen on dssinhvien.idloaitk = quyen.idloaitk
                                    WHERE dsgiaovien.MaGV = '".$_SESSION['profilegv']['MaGV']."' AND dslop.MaLop = '".$layid."'";
                                    $kqlistsv = mysqli_query($conn, $listsv);
                                    while ($datasv = mysqli_fetch_array($kqlistsv))
                                    {
                                        $i=1;
                                    ?>
                                    <option value= "<?php echo $datasv['MaSV']?>"><?php echo $datasv['matk'];?><?php $s = sprintf('%04d', $datasv['MaSV']); echo $s;?>-<?php echo $datasv['HoTen']?></option>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </select>
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Điểm chuyên cần</label>
                                <input type="text" class="form-control" placeholder="VD:10.00, 9.75, 9.50, ..." name ="diemcc" id = "diemcc" step="any" min="0" max="10">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Điểm giữa kì</label>
                                <input type="text" class="form-control" placeholder="VD:10.00, 9.75, 9.50, ..." name ="diemgk" id = "diemgk" step="any" min="0" max="10">
                            </div> <!-- form-group end.// -->
                            <div class="form-group">
                                <label>Điểm thi</label>
                                <input type="text" class="form-control" placeholder="VD:10.00, 9.75, 9.50, ..." name ="diemthi" id = "diemthi" step="any" min="0" max="10">
                            </div> <!-- form-group end.// -->
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name = "  ">Save</button>
                        </div>
                    </form>
                    
                </div>
                </div>
            </div>
            
            </div>
    </div>

	<div class="row" style = "margin-top: 10px;">
		<div class="col">
			<table id="example" class="display" width="100%" data-page-length="25" data-order="[[ 0, &quot;asc&quot; ]]">
		        <thead>
		            <tr style="background-color: #3b89d6;">
                        <th>Mã Sinh Viên</th>
                        <th>Họ Tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Lớp</th>
                        <th>Khóa</th>
                        <th>Điểm C.Cần</th>
                        <th>Điểm G.Kì</th>
                        <th>Điểm Thi</th>
                        <th>Điểm TB môn</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
		            </tr>
		        </thead>
		        <tbody>
                <?php
                    while ($data = mysqli_fetch_array($kq))
                    {
                        $i=1;
                ?>
		            <tr>
                        <th><?php echo $data['matk']?><?php $s = sprintf('%04d', $data['MaSV']); echo $s; ?></th>
                        <th><?php echo $data['HoTen']?></th>
                        <th><?php echo $data['NgaySinh']?></th>
                        <th><?php echo $data['GioiTinh']?></th>
                        <th><?php echo $data['TenLop']?></th>
                        <th><?php echo $data['TenKhoaHoc']?></th>
                        <th><?php echo $data['DiemCC']?></th>
                        <th><?php echo $data['DiemGK']?></th>
                        <th><?php echo $data['DiemThi']?></th>
                        <th><?php echo $data['DiemTBMon']?></th>
                        <th><a href="gveditdiem.php"><i class="fas fa-user-edit"></i></th>
                        <th><a href="gvdeletediem.php"><i class="fas fa-trash-alt"></i></th>
                    </tr>
                    <?php
                        $i++;
                    }
                    ?>
		        </tbody>
		    </table>
		</div>
	</div>

	<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
    
</div>
<?php include('../footer.php');?>