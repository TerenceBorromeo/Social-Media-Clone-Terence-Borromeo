<!--top bar-->
<?php 

	$corner_image = "images/user_male.jpg";
	if(isset($USER)){
		
		if(file_exists($USER['profile_image']))
		{
			$image_class = new Image();
			$corner_image = $image_class->get_thumb_profile($USER['profile_image']);
		}else{

			if($USER['gender'] == "Female"){

				$corner_image = "images/user_female.jpg";
			}
		}
	}
?>

<div id="blue_bar">
	<form method="get" action="search.php">
	<div class="one">
		<a href="index.php">
			<img src="images/ghlogo.png" width="45px" height="45px" style="margin-top: 2px; margin-left: 5px;"/>
		</a>		
	</div>
	<div class="two">	
		<input type="text" id="search_box" name="find" placeholder="Search for people" style="margin-top: 4px;"/>
	</div>

	<div class="three">	
		<div class="dropdown">
		<div class="dropbtn"><i class="fa fa-caret-down" style="margin-left: 11px; margin-top: 6px;font-size: 30px;color:white"></i></div>
				<div class="dropdown-content">
				<a href="profile.php?section=settings&id=<?php echo $user_data['userid'] ?>"><i class="fas fa-cog"></i></i>&nbsp;Settings</a>
					<a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
				</div>
		</div>
		
	</div>
	<div class="home">
		<a href="index.php">
			<div class="navbtn" id="btn"><i class="fas fa-home" aria-hidden="true" style="margin-left: 23px; margin-top: 7px;font-size: 30px;color:white;"></i></div>
		</a>		
	</div>
	<div class="info">
		<a href="profile.php?section=about&id=<?php echo $user_data['userid'] ?>">
			<div class="navbtn"><i class="fas fa-info" aria-hidden="true" style="margin-left: 35px; margin-top: 8px;font-size: 25px;color:white;"></i></div>
		</a>
	</div>
	<div class="followers">
		<a href="profile.php?section=followers&id=<?php echo $user_data['userid'] ?>">
			<div class="navbtn"><i class="fas fa-users" aria-hidden="true" style="margin-left: 25px; margin-top: 8px;font-size: 25px;color:white;"></i></div>
		</a>
	</div>
	<div class="following">
		<a href="profile.php?section=following&id=<?php echo $user_data['userid'] ?>">
			<div class="navbtn"><i class="fas fa-user-plus" aria-hidden="true" style="margin-left: 27px; margin-top: 8px;font-size: 25px;color:white;"></i></div>
		</a>
	</div>
	<div class="photos">
		<a href="profile.php?section=photos&id=<?php echo $user_data['userid'] ?>">
			<div class="navbtn"><i class="fas fa-images" aria-hidden="true" style="margin-left: 27px; margin-top: 8px;font-size: 25px;color:white;"></i></div>
		</a>
	</div>

	<div class="settings">
		<a href="profile.php?section=settings&id=<?php echo $user_data['userid'] ?>">
			<div class="navbtn"><i class="fas fa-cog" aria-hidden="true" style="margin-left: 27px; margin-top: 8px;font-size: 25px;color:white;"></i></div>
		</a>
	</div>
<!--notif-->
	<div class="four" id="notif">
		<div class="overlay"><div style="font-size:35px ;text-align:center; margin-top: 110px;">Notifications</div>
			<div class="content" style="box-shadow: 0px 8px 16px 0px rgba(255,255,255,0.3);">
				<div class="close-btn" onclick="toggleNotif()">&times;</div>
					<?php include("notifications.php"); ?>
				</div>
			</div>
			<img src="images/bell.png" onclick="toggleNotif()"style="width:25px;float:right;margin-top: 15px; cursor: pointer;">
			<span style="float: right;">
						<?php 
						$notif = check_notifications();
						?>
						<?php if($notif > 0): ?>
						<div style="background-color: red;color: white;position: absolute;right:55px; top: 5.5px;
						width:11px;height: 11px;border-radius: 50%;padding: 3px;text-align:center;font-size: 9px;">
							<?= $notif ?>
						</div>
						<?php endif; ?>
			</span>
	</div>
<!--notif end-->
	<div class="five">
		<div style="border: 0px solid white; float: left; margin-top: 5.5px;">
			<?php if(isset($USER)): ?>
				<a href="profile.php" style=" text-decoration: white; margin-left: 10px;" id="top_icon">
					<img src="<?php echo $corner_image ?>" style="width: 25px; border-radius: 50px; margin-top: 1px; margin-left: -5px; border: 1px solid red;">
			</div>

			<div class="username_top_right">
					<span style="color: white; "><?php echo $USER['username']?></span>
				</a>
						<?php else: ?>
					<a href="login.php">
						<span style="font-size:13px;float: right;margin:10px;color:white;">Login</span>
						<?php endif; ?>
					</a>
			</div>
			
		</div>
	</div>
	
	
</form>
</div>