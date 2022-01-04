<?php include_once 'headeradmin.php';
// include ('config/connect.php');
// $layid = $_GET['id'];
// $idtk = substr($layid, 0, 5);
// $check = "SELECT * FROM quyen WHERE matk='".$idtk."'";
// $query = mysqli_query($conn,$check);
//     if($tk = mysqli_fetch_array($query))
//     {
//         $_SESSION['matk']= $tk;

//     }
//     else
//     {
//         echo '<script type="text/javascript">alert("Tài khoản của bạn chưa login. Xin mời bạn login") </script> ';
//         header('Location: login.php');
//     }
    
// 


?>
<link rel="stylesheet" type="text/css" href="../css/date.css">
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-md-4">
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
    <div class="col-12 col-md-4">
    <table class="table" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    </div>
    <div class="col-12 col-md-4">
    <table class="table" style="margin-top:50px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
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