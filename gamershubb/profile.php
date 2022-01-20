<?php

	include("classes/autoload.php");

	$login = new Login();
	$_SESSION['mybook_userid'] = isset($_SESSION['mybook_userid']) ? $_SESSION['mybook_userid'] : 0;
	
	$user_data = $login->check_login($_SESSION['mybook_userid'],false);
 
 	$USER = $user_data;
 	
 	if(isset($_GET['id']) && is_numeric($_GET['id'])){

	 	$profile = new Profile();
	 	$profile_data = $profile->get_profile($_GET['id']);

	 	if(is_array($profile_data)){
	 		$user_data = $profile_data[0];
	 	}

 	}
 	
	//posting starts here
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		include("change_image.php");
		
		if(isset($_POST['first_name'])){

			$settings_class = new Settings();
			$settings_class->save_settings($_POST,$_SESSION['mybook_userid']);

		}else{

			$post = new Post();
			$id = $_SESSION['mybook_userid'];
			$result = $post->create_post($id, $_POST,$_FILES);
			
			if($result == "")
			{
				header("Location: profile.php");
				die;
			}
		}
			
	}

	//collect posts
	$post = new Post();
	$id = $user_data['userid'];
	
	$posts = $post->get_posts($id);

	//collect friends
	$user = new User();
 	
	$friends = $user->get_following($user_data['userid'],"user");

	$image_class = new Image();

	//check if this is from a notification
	if(isset($_GET['notif'])){
		notification_seen($_GET['notif']);
	}

?>
	<html>
	<head>
		<title>GamersHub | Profile</title>
		<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	</head>

	<style type="text/css">

		body {
			background-image: url('images/blackbg1.jpg');
			background-repeat: no-repeat, repeat;
            background-attachment: fixed;
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}
		
		#blue_bar{
			width: 99.1%;
			height: 50px;
			background-color: #000000;
			color: white;
			position: fixed;
			margin-top: -8px;
		}

		.one {
  			width: 60px;
  			height: 50px;
  			float: left;
		}

		.two {
			width: 80%;
			float: left;
  			height: 50px;
			border: 0px solid red;
		}

		.three {
			width: 55px;
			float: right;
  			height: 50px;
		}

		.home {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -932px;
		}

		.info {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -514px;
		}

		.followers {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -830px;
		}

		.following {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -725px;
		}

		.photos {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -618px;
		}

		.settings {
			width: 80px;
			float: left;
  			height: 50px;
			margin-left: -410px;
		}

		.four .overlay {
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100vw;
			height: 100vh;
			background: rgba(0,0,0,0.7);
			z-index: 1;
			display: none;
		}

		.four .content {
			position: absolute;
			margin-top: 275px;
			left: 50%;
			transform: translate(50%,50%) scale(0);
			background-color: #222;
			width: 450px;
			min-height: 500px;
			z-index: 2;
			text-align: center;
			padding: 10px;
		}

		.four .close-btn {
			position:absolute;
			right: 7px;
			margin-top: -3px;
			width: 20px;
			height: 20px;
			background: #222;
			color: #fff;
			font-size: 30px;
			cursor: pointer;
			font-weight: 500;
			line-height: 19px;
			text-align: center;
			border-radius: 50%;
		}

		.four.active .overlay {

			display: block;
		}

		.four.active .content {
			transform: translate(-50%,-50%) scale(1);
		}
		.five {
			width: 110px;
			float: right;
			padding: 1px;
  			height: 38px;
			margin-top: 5px;
			margin-right: 10px;
			border-radius: 50px;
			background-color: #1a1a1a;
		}

		#search_box{
			background-color: #1a1a1a;
			color: white;
			width: 250px;
			height: 40px;
			border-radius: 50px;
			border: none;
			padding: 4px;
			font-size: 14px;
			background-image: url(images/search.png);
			background-repeat: no-repeat;
			background-position: right;
		}

		#textbox{

			width: 100%;
			height: 20px;
			border-radius: 5px;
			border:none;
			padding: 4px;
			font-size: 14px;
			border: solid thin grey;
			margin:10px;
 
		}

		#profile_pic{

			width: 150px;
			margin-top: -80px;
			border-radius: 50%;
			margin-left: -550px;
			border:solid 2px red;
		}

		#friends_img{

			width: 75px;
			float: left;
			margin:8px;

		}

		#friends_bar{

			background-color: #1a1a1a;
			min-height: 400px;
			margin-top: 20px;
			color: #aaa;
			padding: 8px;
			text-align: center;
		}

		#friends{

		 	clear: both;
		 	font-size: 12px;
		 	font-weight: bold;
		 	color: #405d9b;
		}

		textarea{

			width: 100%;
			border:none;
			font-family: tahoma;
			font-size: 14px;
			height: 60px;

		}

		#post_button{
			float: right;
			background-color: red;
			border:none;
			color: white;
			padding: 4px;
			font-size: 14px;
			border-radius: 2px;
			width: 50px;
			min-width: 50px;
			cursor: pointer;
		}

		#follow_button {
			position: inherit;
			background-color: red;
			border:none;
			color: white;
			padding: 6px;
			font-size: 14px;
			border-radius: 2px;
			width: 70px;
			height: 50px;
			cursor: pointer;
			margin-left: 700px;
			
		}

		.msg_btn {
			position: absolute;
			background-color: red;
			border: 2px solid black;
			color: white;
			padding: 2px;
			font-size: 14px;
			border-radius: 50px;
			width: 32px;
			height: 32px;
			cursor: pointer;
			margin-top: -99px;
			margin-left: 40px;
		}

		#button {
			border:none;
			color: white;
			background-color: red;
			cursor: pointer;
		}

 
 		#post_bar{
 			margin-top: 20px;
 			background-color: white;
 			padding: 10px;
			background-color: #1a1a1a;
 		}

 		#post{
			color: white;
 			padding: 4px;
 			font-size: 13px;
 			display: flex;
 			margin-bottom: 20px;
			background-color: #1a1a1a;
 		}

		::placeholder {
  			color: #ccc;
  			opacity: 1;
			font-size: 15px;
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}

		#separator {

			width: 485px;
			height: 47px;
			display: inline-block;
			border-bottom: 1px dashed gray;
			margin-left: 25px;
		}

		.dropbtn {
  			background-color: black;
			width: 40px;
			height: 40px;
			margin-top: 5px;
			margin-left: 5px;
			border-radius: 50px;
  			color: white;
  			border: none;
  			cursor: pointer;
		}

		.dropdown {
 			position: relative;
  			display: inline-block;
		}

		.dropdown-content {
 			display: none;
  			position: absolute;
			left: -100px;
			top: 45px;
  			background-color: #1a1a1a;
  			min-width: 150px;
  			box-shadow: 0px 8px 16px 0px rgba(255,255,255,0.2);
  			z-index: 1;
		}

		.dropdown-content a {
  			color: white;
  			padding: 12px 16px;
  			text-decoration: none;
  			display: block;
		}

		.dropdown-content a:hover {
			background-color: #ccc;
			color: black;
		}

		.dropdown:hover .dropdown-content {
  			display: block;
		}

		.dropdown:hover .dropbtn {
  			background-color: #1a1a1a;
		}

		.uname_and_tagname {
			position: relative;
			left: 220px;
		}

		.uname_and_tagname.active1 {
			display: none;
		}

		.uname_and_tagname.active2 {
			display: static;
		}

		.msg_btn.active3 {
			display: none;
		}

		.change_btn {
			position:absolute;
			margin-left: 560px;
			width: 20px;
			height: 20px;
			background: #1a1a1a;
			color: #fff;
			font-size: 30px;
			cursor: pointer;
			font-weight: 500;
			line-height: 19px;
			text-align: center;
			border-radius: 50%;
		}

		.navbtn {
  			background-color: black;
			width: 80px;
			height: 40px;
			margin-top: 5px;
			margin-left: 5px;
			border-radius: 10px;
  			color: white;
  			border: none;
  			cursor: pointer;
		}

		.home:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.info:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.followers:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.following:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.photos:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.settings:hover .navbtn {
  			background-color: #1a1a1a;
		}

		.grid-container {
    		display: grid;
    		grid-template-columns: 1fr 1fr;
    		grid-gap: 5px;
			margin-left: 215px;
			margin-top: -70px;
		}

		#game_prof {
			width: 75px;
			height: 50px;
			text-align: left;
		}

		.username_top_right {
			float: center; 
			margin-top: 9.5px;
		}
		
		/*messages*/

		.msg_button .overlay5 {
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100vw;
			height: 100vh;
			background: rgba(0,0,0,0.7);
			z-index: 1;
			display: none;
		}

		.msg_btn .content5 {
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(50%,50%) scale(0);
			background: #fff;
			width: 450px;
			height: 220px;
			z-index: 2;
			text-align: center;
			padding: 20px;
			box-sizing: border-box;
		}

		.msg_btn .close-btn5 {
			position:absolute;
			right: 7px;
			margin-top: -3px;
			width: 20px;
			height: 20px;
			background: #222;
			color: #fff;
			font-size: 30px;
			cursor: pointer;
			font-weight: 500;
			line-height: 19px;
			text-align: center;
			border-radius: 50%;
		}

		.msg_btn.active5 .overlay5 {
			display: block;
		}

		.msg_btn.active5 .content5 {
			transform: translate(-50%,-50%) scale(1);
		}


	</style>

	<body>
		<?php include("header.php"); ?>
 
 		<!--change profile image area-->
 		<div id="change_profile_image" style="display:none; position:absolute; width: 99.1%;height: 90%;">
 			<div style="max-width:600px; margin:auto; min-height: 400px; flex:2.5;">
 					
 					<form method="post" action="profile.php?change=profile" enctype="multipart/form-data">


	 					<div style="padding: 10px;background-color: #1a1a1a; box-shadow: 0px 8px 16px 0px rgba(255,255,255,0.4); margin-top: 150px;">
							<div class="change_btn" onclick="hide_change_profile_image()">&times;</div>
								<div style="text-align: center;"><br><br>
									<?php
										echo "<img src='$user_data[profile_image]' style='max-width:500px;' >";
									?>
								</div><br>						
	 						<input type="file" name="file">
	 						<input id="post_button" type="submit" style="width:120px;" value="Change">
	 						<br>
							
	 					</div>
  					</form>

 				</div>
 		</div>
		
		<!--change cover image area-->
 		<div id="change_cover_image" style="display:none; position:absolute; width: 99.1%;height: 90%; ">
 			<div style="max-width:600px; margin:auto; min-height: 400px; flex:2.5;">
 					
 					<form method="post" action="profile.php?change=cover" enctype="multipart/form-data">
	 					<div style="padding: 10px;background-color: #1a1a1a; box-shadow: 0px 8px 16px 0px rgba(255,255,255,0.4); margin-top: 150px;">
							<div class="change_btn" onclick="hide_change_cover_image()">&times;</div>
								<div style="text-align: center;"><br><br>
									<?php
 	 									echo "<img src='$user_data[cover_image]' style='max-width:500px;' >";								 
	 								?>
								</div><br>
	 						<input type="file" name="file">
	 						<input id="post_button" type="submit" style="width:120px;" value="Change">
	 						<br>
	 					</div>
  					</form>

 				</div>
 		</div>

		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
			
			<div style="height: 450px;background-color: #1a1a1a;text-align: center; color: red;">

					<?php 

						$image = "images/cover_image.jpg";
						if(file_exists($user_data['cover_image']))
						{
							$image = $image_class->get_thumb_cover($user_data['cover_image']);
						}
					?>

				<img src="<?php echo $image ?>" style="width:100%;">


				<span style="font-size: 12px;">
					<?php 

						$image = "images/user_male.jpg";
						if($user_data['gender'] == "Female")
						{
							$image = "images/user_female.jpg";
						}
						if(file_exists($user_data['profile_image']))
						{
							$image = $image_class->get_thumb_profile($user_data['profile_image']);
						}
					?>
					
						<img id="profile_pic" src="<?php echo $image ?>"><br>
		
						<?php if(i_own_content($user_data)):?>
								<a onclick="show_change_profile_image(event)"  href="change_profile_image.php?change=profile"><img src="images/dp_change.png" style="margin-top: -50px; margin-right: 420px;"/></a><br>
								<a onclick="show_change_cover_image(event)"  href="change_profile_image.php?change=cover"><img src="images/cover_change.png" style="margin-top: -120px; margin-left: 740px;"/></a>
								<?php else:?>
									<a href="#"><img src="images/dp_change.png" style="margin-top: -50px; margin-right: 420px; cursor: not-allowed;"/></a>
									<a href="#"><img src="images/cover_change.png " style="margin-top: -120px; margin-left: 740px; cursor: not-allowed;"/></a>
						<?php endif; ?>				
				</span>
				<br>
					<span class="uname_and_tagname" id="username_overlay">
							<a href="profile.php?id=<?php echo $user_data['userid'] ?>" style="text-decoration: none;">
									<?php 
										echo "<h1 style='width: 200px; margin-top: -70px;text-align: left; color: red; text-decoration: none;'>";
										echo $user_data['username'];
										echo "</h1>";
										echo "<h4 style='width: 200px; margin-top: -20px; text-align: left; font-size:12px; color: #ccc; '>";
										echo "@" . $user_data['tag_name'];
										echo "</h4>";
									?>										
							</a>			
					</span>

					<span id="follow_button">
					<?php 
							$mylikes = "";
							if($user_data['likes'] > 0){
								$mylikes = "<span style='font-size: 12px; color: #ccc;'>" .$user_data['likes'] . " Followers</span>";
							}
					?>
						<a href="like.php?type=user&id=<?php echo $user_data['userid'] ?>">
							<span><i class="fas fa-user-plus" style="color: white; font-size: 15px;"></i><input id="button" type="button" value="Follow"></span>
						</a>		
					</span><br><br>
					<span style="width: 100px; height: 50px; margin-left: 700px;">
						<?php echo $mylikes ?>
					</span>
					<br>




						<div class="msg_btn" id="message">
							<a href="msglogin.php">
								<i class="fas fa-envelope" style="color: white; font-size: 20px; margin-top: 6px;"></i>
							</a>
						</div>	


						<br>

					
				<br>

				<?php 
					if($user_data['game'] == "Valorant")
					{
						$image = "images/valorant.jpg";
					}
					if($user_data['game'] == "Dota 2")
					{
						$image = "images/dota2.png";
					}
					if($user_data['game'] == "League of Legends")
					{
						$image = "images/lol.png";
					}
					if($user_data['game'] == "CSGO")
					{
						$image = "images/csgo.png";
					}
					if($user_data['game'] == "Mobile Legends")
					{
						$image = "images/ml.png";
					}
					if($user_data['game'] == "Axie Infinity")
					{
						$image = "images/axie.png";
					}
				?>

				<div class="grid-container" id="game_prof">

					<div class="grid-child">
						<img src="<?php echo $image ?>" width="30px" height="30px">
					</div>

					<div class="grid-child" style="font-size: 25px; text-align: left; width:300px; color:#ccc;">
						<?php
						if($user_data['game'] == "CSGO") {

						echo "CS:GO";}
						else {
							echo $user_data['game'];
						}
						?>
					</div>
				</div>
			</div>

			<!--below cover area-->
	 
	 		<?php 

	 			$section = "default";
	 			if(isset($_GET['section'])){

	 				$section = $_GET['section'];
	 			}

	 			if($section == "default"){

	 				include("profile_content_default.php");
	 			 
	 			}elseif($section == "following"){
	 				
	 				include("profile_content_following.php");

	 			}elseif($section == "followers"){

	 				include("profile_content_followers.php");

	 			}elseif($section == "about"){

	 				include("profile_content_about.php");

	 			}elseif($section == "settings"){

	 				include("profile_content_settings.php");

	 			}elseif($section == "photos"){

	 				include("profile_content_photos.php");
	 			}



	 		?>

		</div>

	</body>
</html>

<script type="text/javascript">

	function toggleNotif(){

		document.getElementById("notif").classList.toggle("active");
		document.getElementById("username_overlay").classList.toggle("active1");
		document.getElementById("message").classList.toggle("active3");
		
	}

	function toggleMsg(){
		document.getElementById("message").classList.toggle("active5");
	}
	
	function show_change_profile_image(event){

		event.preventDefault();
		var profile_image = document.getElementById("change_profile_image");
		profile_image.style.display = "block";

		if(profile_image.style.display == "block"){
			document.getElementById("username_overlay").classList.toggle("active1");
		}
	}


	function hide_change_profile_image(){

		var profile_image = document.getElementById("change_profile_image");
		profile_image.style.display = "none";

		if(profile_image.style.display == "none"){
			document.getElementById("username_overlay").classList.toggle("active1");
			uname_and_tagname.active1.display = "block";
		}
	}

	
	function show_change_cover_image(event){

		event.preventDefault();
		var cover_image = document.getElementById("change_cover_image");
		cover_image.style.display = "block";

		if(cover_image.style.display == "block"){
			document.getElementById("username_overlay").classList.toggle("active1");
		}
	}


	function hide_change_cover_image(){

		var cover_image = document.getElementById("change_cover_image");
		cover_image.style.display = "none";

		if(cover_image.style.display == "none"){
			document.getElementById("username_overlay").classList.toggle("active1");
			uname_and_tagname.active1.display = "block";
		}

	}
	
</script>