<!DOCTYPE html>
<html>
<body>
 
<p>Chọn tên xe từ danh sách dưới đây.</p>
 
<form action="test.php" method="get"></form>
<select name = "check">
<option value="Audi">Audi
<option value="BMW">BMW
<option value="Mercedes">Mercedes
<option value="Volvo">Volvo
</select>
<?php
 if(isset($_GET['check']))
 {
   $lay = $_GET['check'];
   echo $lay;
 }
?>
 
<!-- <p>Khi bạn chuyển sang một xe mới, một hàm sẽ được kích hoạt để hiển thị giá trị ra ngoài.</p>
 
<p id="demo" name = "demo"></p>
 
<script>
function myFunction() {
var x = document.getElementById("mySelect").value;
document.getElementById("demo").innerHTML = "Bạn đã chọn xe: " + x;
}
</script> -->
</body>
</html>