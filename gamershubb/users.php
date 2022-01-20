<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: msglogin.php");
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

  .users header .logout{
    background-color: red;
  }

  .users .search button{
  position: relative;
  z-index: 1;
  width: 47px;
  height: 42px;
  font-size: 17px;
  cursor: pointer;
  border: none;
  background: red;
  color: white;
  outline: none;
  border-radius: 0 5px 5px 0;
  transition: all 0.2s ease;
}

.users .search button.active{
  background: white;
  color: red;
}

</style>

<body>
<?php include("header2.php");?>
  <div class="wrapper" style="background-color: #1a1a1a;">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
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
          <img src="php/images/<?php echo $row['img']; ?>"  style="border: 2px solid red;"alt="">
          <div class="details">
          <span style="color: white; font-size: 25px;"><?php echo $row['uname']?></span><span style="color: #999;  font-size: 17px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php echo $row['game']?></span> <span> <img style="border-radius: 0px; width:15px; height:15px;" src="<?php echo $image ?>"></span>
          <p style="color: green;"><i class="fas fa-globe"></i> <?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </header>
      <div class="search">
      <span class="text" style="color: white;">Start inviting users to play!</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
