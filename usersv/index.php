<?php include_once 'header.php';

?>
<link rel="stylesheet" type="text/css" href="../css/date.css">
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
<script
		src="https://code.jquery.com/jquery-3.6.0.js"
		integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
		crossorigin="anonymous">
	</script>
	<script src="../js/date.js"></script>
<?php include('../footer.php');?>