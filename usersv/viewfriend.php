<?php include_once "header.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
  <div class="wrapper">
    <section class="users">
    
      <!-- <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM dssinhvien WHERE MaSV = {$_SESSION['profile']['MaSV']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="../images/avt.png" alt="">
          <div class="details">
            <span><?php echo $row['HoTen']?></span>
            <p><?php echo $row['Status']; ?></p>
          </div>
        </div>
      </header> -->
      <div class="search">
        <span class="text">Tìm kiếm bạn bè</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="../js/user.js"></script>
  <?php include_once "../footer.php"; ?>
