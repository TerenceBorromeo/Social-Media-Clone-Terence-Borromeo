<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "msgheader.php"; ?>
<style>
	body {
		background-image: url('images/blackbg1.jpg');
		background-repeat: no-repeat, repeat;
    background-attachment: fixed;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
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
<?php include("header1.php");?>
  <div class="wrapper"  style="background-color: #1a1a1a;">
    <section class="form login">
    <center>
      <img src="images/ghlogo.png" width="65px" height="65px" style="margin-top: 2px; margin-left: 5px;"/>
      <header style="color: white;"><i class="fas fa-comments"></i> Messenger</header>
    </center>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
        <label style="color: white; font-weight: bold;">Email<span style="color: red;"> *</span></label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
        <label style="color: white; font-weight: bold;">Password<span style="color: red;"> *</span></label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Log in" style="color: white; background-color: red;">
        </div>
      </form>
      <div class="link" style="color: white;">Join us! <a href="msgindex.php" style="color: red; text-decoration: none;">Create<br> an account</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
