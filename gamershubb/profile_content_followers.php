<br><br><br>
<div style="min-height: 400px;width:100%;background-color: #1a1a1a;text-align: center;"><br>
<h1 style="text-align: center; color: white;">Buddied <?php echo ($user_data['username'])?></h1>
	<div style="padding: 20px;">
	<?php
 
		$image_class = new Image();
		$post_class = new Post();
		$user_class = new User();

		$followers = $post_class->get_likes($user_data['userid'],"user");

		if(is_array($followers)){

			foreach ($followers as $follower) {
				# code...
				$FRIEND_ROW = $user_class->get_user($follower['userid']);
				include("user.php");
			}

		}else{

			echo "No followers were found!";
		}


	?>

	</div>
</div>