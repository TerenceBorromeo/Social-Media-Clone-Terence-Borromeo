<style>

	#hdr-txt {
		color: red; 
		text-align: left; 
		width: 100px;
		font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	}

	#bar-txt {
		color: white; 
		text-align: left;
		width: 250px;
		font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	}

	.grid_container_info {
    	display: grid;
    	grid-template-columns: 1fr 1fr 1fr;
    	grid-gap: 5px;
	}

</style>
<br><br><br>
<div style="min-height: 400px; width:100%; background-color: #1a1a1a; text-align: center;"><br>
<h1 style="text-align: center; color: white;"><?php echo ($user_data['username'])?>'s Information</h1>
	<div style="padding: 20px;max-width:350px;display: inline-block;">
		<form method="post" enctype="multipart/form-data">				
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

			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
				<i class="far fa-user"></i> Full name:
				</div>

				<div class="grid-child" id="bar-txt">
					<?php echo htmlspecialchars($user_data['first_name'])."&nbsp" .htmlspecialchars($user_data['last_name'])?>
				</div>

			</div><br>
			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
				<i class="fas fa-venus-mars"></i> Gender:
				</div>

				<div class="grid-child" id="bar-txt">
					<?php echo htmlspecialchars($user_data['gender'])?>
				</div>

			</div><br>
			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
				<i class="fas fa-envelope"></i> Email:
				</div>

				<div class="grid-child" id="bar-txt">
					<?php echo htmlspecialchars($user_data['email'])?>
				</div>

			</div><br>
			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
					<i class="fas fa-at"></i> Tag name:
				</div>

				<div class="grid-child" id="bar-txt">
					<?php echo "@" .htmlspecialchars($user_data['tag_name'])?>
				</div>

			</div><br>
			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
					<i class="far fa-user"></i> Tag name:
				</div>

				<div class="grid-child" id="bar-txt">
					<?php echo htmlspecialchars($user_data['username'])?>
				</div>

			</div><br>
			<div class="grid_container_info">

				<div class="grid-child" id="hdr-txt">
					<i class="fas fa-gamepad"></i>  Game:
				</div>

				<div class="grid-child" id="bar-txt">
				<img src="<?php echo $image?>" width="15px" height="15px">&nbsp;<?php echo htmlspecialchars($user_data['game'])?>
				</div>

			</div><br>
			
		</form>
	</div>
</div>