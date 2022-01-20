
	<div id="post">
		<div>
		
			<?php 

				$image = "images/user_male.jpg";
				if($ROW_USER['gender'] == "Female")
				{
					$image = "images/user_female.jpg";
				}

				$image_class = new Image();
				if(file_exists($ROW_USER['profile_image']))
				{
					$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
				}

				if($ROW_USER['game'] == "Valorant")
					{
						$game_image = "images/valorant.jpg";
					}
				if($ROW_USER['game'] == "Dota 2")
					{
						$game_image = "images/dota2.png";
					}
				if($ROW_USER['game'] == "League of Legends")
					{
						$game_image = "images/lol.png";
					}
				if($ROW_USER['game'] == "CSGO")
					{
						$game_image = "images/csgo.png";
					}
				if($ROW_USER['game'] == "Mobile Legends")
					{
						$game_image = "images/ml.png";
					}
				if($ROW_USER['game'] == "Axie Infinity")
					{
						$game_image = "images/axie.png";
					}
  
			?>

			<img src="<?php echo $image ?>" style="width: 75px;margin-right: 4px;border-radius: 50%;">
		</div>
		<div style="width: 100%;">
			<div style="font-weight: bold;color: #405d9b;width: 100%;">
				<?php 

				echo "<a href='profile.php?id=$ROW[userid]' style='text-decoration: none; color: red; font-size: 25px;'>";
				echo ($ROW_USER['username']);
				echo "</a>";
				echo "<span style='color: #999;'>";
				echo "&nbsp; @" . htmlspecialchars($ROW_USER['tag_name'])."&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "</span>";
				echo "<span style='float:right;color: #999; font-size: 15px;'>";
				echo "<img src='$game_image' style='width:15px; height:15px;'>" . "&nbsp;&nbsp;".($ROW_USER['game']);
				echo "</span>";

				?>
			</div>
			
			<?php echo htmlspecialchars($ROW['post']) ?>

			<br><br>

			<?php 

				if(file_exists($ROW['image']))
				{

					$post_image = $image_class->get_thumb_post($ROW['image']);

					echo "<img src='$post_image' style='width:80%;' />";
				}
				
			?>
  		
		</div>
	</div>

	<script type="text/javascript">

function toggleNotif(){

	document.getElementById("notif").classList.toggle("active");
	document.getElementById("friendsbar").classList.toggle("active3");
	
}


</script>