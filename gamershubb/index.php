<?php 

	include("classes/autoload.php");
 

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
 
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

		$post = new Post();
		$id = $_SESSION['mybook_userid'];
		$result = $post->create_post($id, $_POST,$_FILES);
		
		if($result == "")
		{
			header("Location: index.php");
			die;
		}else
		{

			echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;'>";
			echo "<br>The following errors occured:<br><br>";
			echo $result;
			echo "</div>";
		}
	}

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>GamersHub | Timeline</title>
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
			height: 33px;
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

			width: 40px;
			border-radius: 50%;
			border:solid 2px red;
		}

		#friends_img{

			width: 75px;
			float: left;
			margin:8px;

		}

		#friends_img_left{
			width: 40px;
			float: left;
			margin:8px;
		}

		.friends_bar{

			background-color: #1a1a1a;
			width: 210px;
			min-height: 500px;
			margin-top: 20px;
			color: #aaa;
			padding: 8px;
			border-radius: 10px;
			text-align: center;
			position: fixed;
		}

		#friends{

		 	clear: both;
		 	font-size: 12px;
		 	font-weight: bold;
		}

		textarea{

			width: 100%;
			border:none;
			font-size: 14px;
			height: 60px;
			background-color: #1a1a1a;
			color: white;

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
			margin-top: -80px;
			margin-left: 290px;
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
			height: 20px;
			display: inline-block;
			border-bottom: 1px solid gray;
			margin-left: 25px;
		}

		#separator1 {
			width: 150px;
			height: 5px;
			display: inline-block;
			border-bottom: 1px solid gray;
			margin-left: 0px;
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
			margin-left: 220px;
			margin-top: -20px;
		}

		.grid-container-name {
    		display: grid;
    		grid-template-columns: 1fr 2fr;
    		grid-gap: 5px;
			background-color: #0e0e0e;
			border-radius: 20px;
			height: 55px;
		}

		.username_top_right {
			border: 0px solid white; 
			float: center; 
			margin-top: -8px;
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}

		.friends_bar.active3 {
			position: inherit;

		}

		.friendshover a{
			color: white;
			text-align: left; 
			border-radius: 10px; 
			height: 20px;
			width: 150px;
			padding:10px;
			text-decoration: none;
			transition: .8s;
		}

		.friendshover a:hover{
			color: red;
		}


	</style>

	<body>
		<?php include("header.php"); ?><br><br>
		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
			<!--below cover area-->
			<div style="display: flex;">	
				<!--friends area-->			
				<div  style="min-height: 400px;flex:1;">
					
					<div class="friends_bar" id="friendsbar">
						
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
						<div class="grid-container-name">
							<div style="float: right; margin-top: 5px;">							
								<img id="profile_pic" src="<?php echo $image ?>">								
							</div>


							<div  style="margin-top: 13px; margin-left: -70px;">
								<a href="profile.php" style="text-decoration: none; color:red;">
									<?php echo  "<span style='font-size: 25px; color: red;'>" . $user_data['username'] . "</span>" . " <span style='color:#ccc'>@" . $user_data['tag_name'] . "</span>" ?>
								</a>
							</div>
							

						</div>
							<br>
						<div style="text-align: left; margin-left: 17px;">
							<span class="friendshover">
								<a href="profile.php?section=following&id=<?php echo $user_data['userid'] ?>">
									<i class="fas fa-users" aria-hidden="true" style="font-size: 25px;color:white;"></i><span style="font-size: 25px;"> Buddies</span>
								</a>
							</span>
						</div>
							<br>
						<div style="text-align: left; margin-left: 17px;">
							<span class="friendshover">
								<a href="profile.php?section=photos&id=<?php echo $user_data['userid'] ?>">
									<i class="fas fa-images" aria-hidden="true" style="font-size: 25px;color:white;"></i><span style="font-size: 25px;"> Photos</span></span>
								</a>
						</div>
							<br>
						<div style="text-align: left; margin-left: 17px;">
							<span class="friendshover">
								<a href="msglogin.php">
									<i class="fas fa-comments" aria-hidden="true" style="font-size: 25px;color:white;"></i><span style="font-size: 25px;"> Messenger</span></span>
								</a>
						</div>
							<br>
						<div style="text-align: left; margin-left: 17px;">
							<span class="friendshover">
							<a href="profile.php?section=settings&id=<?php echo $user_data['userid'] ?>">		
								<i class="fas fa-cog" aria-hidden="true" style="font-size: 25px;color:white;"></i><span style="font-size: 25px;"> Settings</span></span>
							</a>
						</div><br><br>
						Quick Access
						<div id="separator1"></div>
						<div>
						<?php
 
 						$image_class = new Image();
 						$post_class = new Post();
 						$user_class = new User();

 						$following = $user_class->get_following($user_data['userid'],"user");

 						if(is_array($following)){

	 					foreach ($following as $follower) {
						 # code...
		 				$FRIEND_ROW = $user_class->get_user($follower['userid']);
		 					include("buddiesIndex1.php");
	 					}

 						}else{
 						}
					?>
						</div>



					</div>

				</div>

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="border:solid thin #aaa; padding: 10px;background-color: #1a1a1a;">

 						<form method="post" enctype="multipart/form-data">

	 						<textarea name="post" placeholder="Whats on your mind?"></textarea>
	 						<input type="file" name="file">
	 						<input id="post_button" type="submit" value="Post">
	 						<br>
 						</form>
 					</div>
 
	 				<!--posts-->
	 				<div id="post_bar">
 					
 						<?php 

 							$page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  							$page_number = ($page_number < 1) ? 1 : $page_number;

 							
 							$limit = 10;
 							$offset = ($page_number - 1) * $limit;

  							$DB = new Database();
 							$user_class = new User();
 							$image_class = new Image();

 							$followers = $user_class->get_following($_SESSION['mybook_userid'],"user");

 							$follower_ids = false;
 							if(is_array($followers)){

 								$follower_ids = array_column($followers, "userid");
 								$follower_ids = implode("','", $follower_ids);

 							}

 							if($follower_ids){
 								$myuserid = $_SESSION['mybook_userid'];
 								$sql = "select * from posts where parent = 0 and (userid = '$myuserid' || userid in('" .$follower_ids. "')) order by id desc limit $limit offset $offset";
 								$posts = $DB->read($sql);
 							}

 	 					 	if(isset($posts) && $posts)
 	 					 	{

 	 					 		foreach ($posts as $ROW) {
 	 					 			# code...

 	 					 			$user = new User();
 	 					 			$ROW_USER = $user->get_user($ROW['userid']);

 	 					 			include("post.php");
 	 					 		}
 	 					 	}
 	 			 
 	 					 	//get current url
 							$pg = pagination_link();
 
	 					 ?>

	 				</div>

 				</div>
			</div>

		</div>

	</body>

	<script type="text/javascript">

	function toggleNotif(){

		document.getElementById("notif").classList.toggle("active");
		document.getElementById("friendsbar").classList.toggle("active3");
		
	}


</script>
</html>