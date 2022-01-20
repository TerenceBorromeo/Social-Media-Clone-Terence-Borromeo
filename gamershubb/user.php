
<div id="friends" style="display: inline-block; width: 200px; text-align: left; background-color: #0e0e0e; padding: 5px; border-radius: 10px;">
	<?php 
		$image = "images/user_male.jpg";
		if($FRIEND_ROW['gender'] == "Female")
		{
			$image = "images/user_female.jpg";
		}

		if(file_exists($FRIEND_ROW['profile_image']))
		{
			$image = $image_class->get_thumb_profile($FRIEND_ROW['profile_image']);
		}
 

	?>

	<a href="profile.php?id=<?php echo $FRIEND_ROW['userid']; ?>" style="color: red; text-decoration: none;">
 		<img id="friends_img" src="<?php echo $image ?>" style="border-radius: 50px; border: 1px solid red;">
		<br>
		
		<?php echo $FRIEND_ROW['username']?><br><br>

		<?php
		
		$online = "Unknown";
		if($FRIEND_ROW['online'] > 0){
			$online = $FRIEND_ROW['online'];

			$current_time = time();
			$threshold = 10;

			if(($current_time - $online) < $threshold){
				$online = "<span style='color: grey; font-size: 12px; font-weight: normal;'>Currently: <br></span><span style='color: green; font-size: 12px; font-weight: normal;'><i class='fas fa-globe'></i> Online</span>";
			}else{
				$online = "<span style='color: grey; font-size: 12px; font-weight: normal;'>Currently: <br></span><span style='color: grey; font-size: 12px; font-weight: normal;'><i class='fas fa-globe'></i> Offline</span>";
			}



		}

		?>

		<span><?php echo $online ?></span>
 	</a>
</div>