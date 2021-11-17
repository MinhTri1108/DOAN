<!DOCTYPE html>
<html>
<body>

<p>Chọn tên xe từ danh sách dưới đây.</p>

<select id="mySelect" onchange="myFunction()">
<option value="1">Audi
<option value="2">BMW
<option value="3">Mercedes
<option value="4">Volvo
</select>

<p>Khi bạn chuyển sang một xe mới, một hàm sẽ được kích hoạt để hiển thị giá trị ra ngoài.</p>
 

<?php

$kq =  '<p id="demo" name = "demo"></p>';

echo $kq;
?>
 
<script>
function myFunction() {
var x = document.getElementById("mySelect").value;
document.getElementById("demo").innerHTML = x;
}
</script> 

</body>
</html>
<!-- <h4>Học kì</h4>
                <select id="mySelect" class="form-control" name = "hocki">
                <option value="" disabled selected>---Chọn---</option>
                <?php
                $listmh = "SELECT DISTINCT HocKi FROM dsmonhoc";
                $kqlistmh = mysqli_query($conn, $listmh);
                while ($data = mysqli_fetch_array($kqlistmh))
                {
                    $i=1;
                ?>
                <option value= "<?php echo $data['HocKi']?>">Học kì: <?php echo $data['HocKi']?></option>
                <?php
                    $i++;
                }
                
                ?>
                <script>
                function myFunction() {
                var x = document.getElementById("mySelect").value;
                document.getElementById("demo").innerHTML = x;
                }
                </script>
                </select>
                <button type="submit" class="btn btn-primary btn-block" name ="loc">Xem</button> -->