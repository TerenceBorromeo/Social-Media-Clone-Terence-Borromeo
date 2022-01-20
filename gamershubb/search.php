<?php 

	include("classes/autoload.php");

	$login = new Login();
	$user_data = $login->check_login($_SESSION['mybook_userid']);
	
	if(isset($_GET['find'])){

		$find = addslashes($_GET['find']);

		$sql = "select * from users where first_name like '%$find%' || last_name like '%$find%' || username like '%$find%' || tag_name like '%$find%' limit 30";
		$DB = new Database();
		$results = $DB->read($sql);


	}

	$image_class = new Image();
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

<!DOCTYPE html>
	<html>
	<head>
		<title>Search Result</title>
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

			width: 150px;
			margin-top: -80px;
			border-radius: 50%;
			margin-left: -550px;
			border:solid 2px red;
		}

		#menu_buttons{

			width: 100px;
			display: inline-block;
			margin-top: 40px;
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
			width: 75px;
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

		#game_prof {
			width: 75px;
			height: 50px;
			text-align: left;
		}

		.username_top_right {
			border: 0px solid white; 
			float: center; 
			margin-top: -8px;
			font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
		}
	</style>

	<body style="font-family: tahoma; background-color: #d0d8e4;">
		<?php include("header.php"); ?><br><br><br>
		

		<!--cover area-->
		<div style="width: 800px;margin:auto;min-height: 400px;">
		
		<h1 style="text-align: center; color: white;">Search Result</h1>
		 
			<!--below cover area-->
			<div style="display: flex;">	

				<!--posts area-->
 				<div style="min-height: 400px;flex:2.5;padding: 20px;padding-right: 0px;">
 					
 					<div style="border:solid thin #aaa; padding: 10px;background-color: #1a1a1a;">

  					 <?php 

  					 		$User = new User();
  					 		$image_class = new Image();

  					 		if(is_array($results)){

  					 			foreach ($results as $row) {
  					 				# code...
  					 				$FRIEND_ROW = $User->get_user($row['userid']);
 									include("user.php");
 					 			}
  					 		}else{

  					 			echo "no results were found";
  					 		}

  					 ?>

  					 <br style="clear: both;">
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