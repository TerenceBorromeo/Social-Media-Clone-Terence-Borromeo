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

  #select{
  height: 40px;
  width: 200px;
  border-radius: 4px;
  border:solid 1px #ccc;
  padding: 4px;
  font-size: 14px;
}
</style>
<body>
<?php include("header1.php");?>
  <div class="wrapper" style="background-color: #1a1a1a;">
    <section class="form signup">
    <center>
      <img src="images/ghlogo.png" width="65px" height="65px" style="margin-top: 2px; margin-left: 5px;"/>
      <header style="color: white;"><i class="fas fa-comments"></i> Messenger</header>
    </center>
    
      
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label style="color: white; font-weight: bold;">First Name<span style="color: red;"> *</span></label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
          <label style="color: white; font-weight: bold;">Last Name<span style="color: red;"> *</span></label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
        <label style="color: white; font-weight: bold;">Email<span style="color: red;"> *</span></label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="name-details">
          <div class="field input">
          <label style="color: white; font-weight: bold;">Game<span style="color: red;"> *</span></label>
              <select id="select" name="game">		
						    <option value="" disabled selected hidden>Game</option>			
						    <option>Valorant</option>
						    <option>Dota 2</option>
						    <option>League of Legends</option>
						    <option>CSGO</option>
						    <option>Mobile Legends</option>
						    <option>Axie Infinity</option>
				      </select>
          </div>
          <div class="field input">
          <label style="color: white; font-weight: bold;">Username<span style="color: red;"> *</span></label>
              <input type="text" name="uname" placeholder="Username" required>
          </div>
        </div>
        <div class="field input">
        <label style="color: white; font-weight: bold;">Password<span style="color: red;"> *</span></label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
        <label style="color: white; font-weight: bold;">Upload your image<span style="color: red;"> *</span></label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Sign Up" style="color: white; background-color: red;">
        </div>
      </form>
      <div class="link" style="color: white;">Have an account?<br> <a href="msglogin.php" style="color: red; text-decoration: none;">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
