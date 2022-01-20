<style>
	#text {
		height: 40px;
		width: 200px;
		border-radius: 4px;
		border:solid 1px #ccc;
		padding: 4px;
		font-size: 14px;
	}

	#bar-txt {
		color: white; 
		text-align: left; 
		margin-left: 5px; 
		font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	}

	input, textarea {
  		background-color: #1a1a1a;
		color: white;
	}

	#select {

		height: 40px;
		width: 200px;
		border-radius: 4px;
		border:solid 1px #ccc;
		padding: 4px;
		font-size: 14px;
	}

</style>

<br><br><br>
<div style="min-height: 400px; width:100%; background-color: #1a1a1a;"><br>
	<h1 style="text-align: center; color: white;">Settings</h1>
	<form method="post" enctype="multipart/form-data">
		<div style="padding: 10px; margin-left: 187px;">
			<?php
		 
				$settings_class = new Settings();

				$settings = $settings_class->get_settings($_SESSION['mybook_userid']);
				
			?>
			
			<div id="bar-txt">First name&nbsp;<span style="color: red; margin-right: 115px;">*</span>Last name&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
			<input value="<?php echo htmlspecialchars($settings['first_name']) ?>" name="first_name" type="text" id="text" placeholder="First name">
			<input value="<?php echo htmlspecialchars($settings['last_name']) ?>" name="last_name" type="text" id="text" placeholder="Last name">
			<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Change your first name.
				<span style="margin-left: 88px;">Change your last name.</span>
			</p>

			<div id="bar-txt">Url adress&nbsp;<span style="color: red; margin-right: 119px;">*</span>Tag name&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
			<input value="<?php echo htmlspecialchars($settings['url_address']) ?>" name="url_address" type="text" id="text" placeholder="Url Address">
			<input value="<?php echo htmlspecialchars($settings['tag_name']) ?>" name="tag_name" type="text" id="text" placeholder="Tag name">
			<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Change your tag name.
				<span style="margin-left: 88px;">Change your last name.</span>
			</p>

			<div id="bar-txt">Username&nbsp;<span style="color: red; margin-right: 119px;">*</span>Email&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
			<input value="<?php echo htmlspecialchars($settings['username']) ?>" name="username" type="text" id="text" placeholder="Username">
			<input value="<?php echo htmlspecialchars($settings['email']) ?>" name="email" type="text" id="text" placeholder="Email">
			<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Change your username.
				<span style="margin-left: 88px;">Change your email.</span>
			</p>

			<div id="bar-txt">Gender&nbsp;<span style="color: red; margin-right: 138px;">*</span>Game&nbsp;<span style="color: red; margin-right: 109px;">*</span></div>
				<select id="select" name="gender">					
					<option><?php echo htmlspecialchars($settings['gender']) ?></option>
					<option>Male</option>
					<option>Female</option>
				</select>
				<select id="select" name="game">					
					<option><?php echo htmlspecialchars($settings['game']) ?></option>
					<option>Valorant</option>
					<option>Dota 2</option>
					<option>League of Legends</option>
					<option>CSGO</option>
					<option>Mobile Legends</option>
					<option>Axie Infinity</option>
				</select>

			<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Change your gender.
				<span style="margin-left: 110px;">Change your game.</span>
			</p>

			<div id="bar-txt">Password&nbsp;<span style="color: red; margin-right: 125px;">*</span>Retype password&nbsp;<span style="color: red;">*</span></div>
			<input value="<?php echo htmlspecialchars($settings['password'])?>" name="password" type="password" id="text" placeholder="Password">
			<input value="<?php echo htmlspecialchars($settings['password'])?>" name="password2" type="password" id="text" placeholder="Retype Password">
			<p id="bar-txt" style="color: #999; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size: 11px;">Change your password.
				<span style="margin-left: 96px;">Please retype your password.</span>
			</p>

			<input id="post_button" type="submit" value="Save">
		
		</div><br><br>	
	</form>
</div>
<br><br><br>