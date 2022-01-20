<?php 

	include("classes/connect.php");
	include("classes/signup.php");

	$first_name = "";
	$last_name = "";
	$username = "";
	$email = "";
	$gender = "";
	$game = "";
	

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$signup = new Signup();
		$result = $signup->evaluate($_POST);
		
		if($result != "")
		{
			echo "<div style='text-align:center;font-size:12px;color:red;background-color: #ea9999; border-style: solid;border-width: 1px; border-color: red;'>";
			echo "<br>An Error Occured:<br><br>";
			echo $result;
			echo "</div><br>";
		}else
		{

			header("Location: login.php");
			die;
		}
 

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$game = $_POST['game'];
		

	}


	

?>

<html> 

	<head>
		
		<title>GamersHub | Signup</title>
	</head>

	<style>
		body {
			background-image: url('images/blackbg1.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
		}


		#bar{
			height:100px;
			margin: auto;
			background-color:#000000;
			color: white;
			padding: 4px;
		}

		#signup_button{

			background-color: #42b72a;
			width: 70px;
			text-align: center;
			padding:4px;
			border-radius: 4px;
			float:right;
		}

		#bar2{

			background-color: #1a1a1a;
			width: 650px;
			height: 600px;
			margin-right: 95px ;
			margin-top: 30px;
			padding:10px;
			padding-top: 50px;
			text-align: center;
			font-weight: bold;
			border-radius: 20px;
			box-shadow: 0 0 128px 0 rgba(189, 195, 199, 0.1),
  				0 32px 64px -48px rgba(189, 195, 199,0.8);
		}

		#text{

			height: 40px;
			width: 200px;
			border-radius: 4px;
			border:solid 1px #ccc;
			padding: 4px;
			font-size: 14px;
		}

		#select{

			height: 40px;
			width: 200px;
			border-radius: 4px;
			border:solid 1px #ccc;
			padding: 4px;
			font-size: 14px;
		}

		#button{

			width: 300px;
			height: 40px;
			border-radius: 4px;
			font-weight: bold;
			border:none;
			background-color: red;
			color: white;
		}

		#bar-txt {
			color: white; 
			text-align: left; 
			margin-left: 27px; 
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}

		input, textarea {
  			background-color: #1a1a1a;
			color: white;
		}

		#separator {

			width: 100px;
			height: 47px;
			display: inline-block;
			border-bottom: 1px solid #ccc;
			margin: auto;
		}

		#signup-txt {
			text-decoration: none;
			color: red;
		}

	</style>

	<body>
		
		<div id="bar">
			<div style="display: flex; margin-top: 25px;">
				&nbsp;&nbsp;<img src="images/ghlogo.png" width="50px" height="50px">&nbsp;&nbsp;
				<div style="font-size: 40px;">GamersHub</div>
			</div>	
		</div>


		<div style="display: flex;">
			<div style="margin-left: 0px;">
				<img src="images/gifghlogo1.gif" width="90%" height="100%">
			</div>
		
			<div id="bar2">			
			<span style="color: white; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 35px;">Sign up</span><br><br>

				<form method="post" action="">

					<div id="bar-txt">First name&nbsp;<span style="color: red; margin-right: 115px;">*</span>Last name&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
					<input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First name">
					<input value="<?php echo $last_name ?>" name="last_name" type="text" id="text" placeholder="Last name">
					<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Enter your first name.
						<span style="margin-left: 88px;">Enter your last name.</span>
					</p>

					<div id="bar-txt">Username&nbsp;<span style="color: red; margin-right: 119px;">*</span>Email&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
					<input value="<?php echo $username ?>" name="username" type="text" id="text" placeholder="Username">
					<input value="<?php echo $email ?>" name="email" type="text" id="text" placeholder="Email">
					<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Enter your username.
						<span style="margin-left: 88px;">Enter your email.</span>
					</p>

					<div id="bar-txt">Gender&nbsp;<span style="color: red; margin-right: 138px;">*</span>Game&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
					<select id="select" name="gender">
						<option value="" disabled selected hidden>Gender</option>

						<option>Male</option>
						<option>Female</option>
					</select>
					<select id="select" name="game">		
						<option value="" disabled selected hidden>Game</option>			
						<option>Valorant</option>
						<option>Dota 2</option>
						<option>League of Legends</option>
						<option>CSGO</option>
						<option>Mobile Legends</option>
						<option>Axie Infinity</option>
					</select>

					<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Pick your gender.
						<span style="margin-left: 110px;">Choose your game.</span>
					</p>

					<div id="bar-txt">Password&nbsp;<span style="color: red; margin-right: 125px;">*</span>Retype password&nbsp;<span style="color: red;">*</span></div>
					<input name="password" type="password" id="text" placeholder="Password">
					<input name="password2" type="password" id="text" placeholder="Retype Password">
					<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Type your password.
						<span style="margin-left: 96px;">Please retype your password.</span>
					</p>


					<input type="submit" id="button" value="Sign up">
					<br>
					<span>
						<div id="separator"></div>
					</span>&nbsp 
					<span style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">
						OR
					</span> &nbsp
					<span>
						<div id="separator"></div>
					</span><br><br>

				<div style="color: white; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
					Have an account? <br>
						<a id="signup-txt" href="login.php">
							Login now.
						</a>		
				</div>
				</form>

			</div>
		</div>
	</body>


</html>