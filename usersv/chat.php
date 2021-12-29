<?php include_once "header.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header class= "nd">
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM dssinhvien WHERE MaSV = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: dsfriend.php");
          }
        ?>
        <a href="dsfriend.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="../images/avt.png" alt="">
        <div class="details">
          <span><?php echo $row['HoTen'] ?></span>
          <p><?php echo $row['Status']; ?></p>
        </div>
      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="../js/chat.js"></script>

</body>
</html>
