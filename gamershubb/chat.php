<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "msgheader.php"; ?>
<style>
	body {
		background-image: url('images/blackbg1.jpg');
		background-repeat: no-repeat, repeat;
    background-attachment: fixed;
	}

  #blue_bar{
		width: 99.1%;
		height: 50px;
		background-color: #000000;
		color: white;
		position: fixed;
		margin-top: -910px;
    display: flex;
	}
  </style>
<body>
<?php include("header2.php");?>
  <div class="wrapper" style="background-color: #1a1a1a;">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
          if($row['game'] == "Valorant")
          {
            $image = "images/valorant.jpg";
          }
          if($row['game'] == "Dota 2")
          {
            $image = "images/dota2.png";
          }
          if($row['game'] == "League of Legends")
          {
            $image = "images/lol.png";
          }
          if($row['game'] == "CSGO")
          {
            $image = "images/csgo.png";
          }
          if($row['game'] == "Mobile Legends")
          {
            $image = "images/ml.png";
          }
          if($row['game'] == "Axie Infinity")
          {
            $image = "images/axie.png";
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-angle-double-left" style="color: white;"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
        <span style="color: white; font-size: 25px;"><?php echo $row['uname']?></span><span style="color: #999;  font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $row['game']?></span><span><img style="border-radius: 0px; width:15px; height:15px;" src="<?php echo $image ?>"></span>  
        <p><?php
              if($row['status']== "Active now"){
                echo "<span style='color:green;'>" . "<i class='fas fa-globe'></i> " .$row['status'];
              }else {
                echo "<span style='color:grey;'>" . "<i class='fas fa-globe'></i> " .$row['status'];
              }
             ?>
          </p>
        </div>
      </header>
      <div class="chat-box" style="background-color: #888888;">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fas fa-gamepad"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>

</body>
</html>
