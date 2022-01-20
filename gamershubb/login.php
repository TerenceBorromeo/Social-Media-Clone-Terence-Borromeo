<?php 

session_start();

	include("classes/connect.php");
	include("classes/login.php");
 
	$email = "";
	$password = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$login = new Login();
		$result = $login->evaluate($_POST);
		
		if($result != "")
		{
			echo "<div style='text-align:center;font-size:12px;color:red;background-color: #ea9999; border-style: solid;border-width: 1px; border-color: red;'>";
			echo "<br>An Error Occured:<br><br>";
			echo $result;
			echo "</div><br>";
		}else
		{

			header("Location: profile.php");
			die;
		}
 
		$email = $_POST['email'];
		$password = $_POST['password'];
		

	}


	

?>

<html> 

	<head>
		
		<title>GamersHub | Log in</title>
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

		#bar2{

			background-color: #1a1a1a;
			width:650px;
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

		input, textarea {
  			background-color: #1a1a1a;
			color:white;
		}

		#text{

			height: 40px;
			width: 300px;
			border-radius: 4px;
			border:solid 1px #ccc;
			padding: 4px;
			font-size: 14px;
		}

		#separator {

			width: 100px;
    		height: 47px;
			display: inline-block;
    		border-bottom: 1px solid #ccc;
			margin: auto;
		}

		#button{

			width: 300px;
			height: 40px;
			border-radius: 4px;
			font-weight: bold;
			border:none;
			background-color: rgb(255,0,0);
			color: white;
		}

		#signup-txt {
			text-decoration: none;
			color: red;
		}

		#bar-txt {
			color: white; 
			text-align: left; 
			margin-left: 80px; 
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
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
			
			<form method="post">
				<span style="color: white; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 35px;">Log in</span><br><br><br>

				<div id="bar-txt">Username&nbsp;<span style="color: red;">*</span></div>
				<input name="email" value="<?php echo $email ?>" background-color="#1c1c1d" type="text" id="text" placeholder="Email">
				<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Enter your username.</p><br>
				
				<div id="bar-txt">Password&nbsp;<span style="color: red;">*</span></div>
				<input name="password" value="<?php echo $password ?>" type="password" id="text" placeholder="Password">
				<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Enter your password.</p><br>
				
				<input type="submit" id="button" value="Log in">
				<br><br>
			
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
					Join us!
						<a id="signup-txt" href="signup.php">
							Create <br> an account.
						</a>		
				</div>
				
				
				

			</form>
			
		</div>
	</div>
	</body>


</html>