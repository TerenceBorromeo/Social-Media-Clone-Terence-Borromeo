	<div id="post" style="background-color: #222; height:80px;  border: 1px solid white;">
		<div>
		
			<?php 

				$image = "images/user_male.jpg";
				if($ROW_USER['gender'] == "Female")
				{
					$image = "images/user_female.jpg";
				}

				if(file_exists($ROW_USER['profile_image']))
				{
					$image = $image_class->get_thumb_profile($ROW_USER['profile_image']);
				}
  
			?>

			<img src="<?php echo $image ?>" style="width: 75px;margin-right: 10px;margin-left: 10px;margin-top: 3px;border-radius: 50%; border: 1px solid red;">
		</div>
		<div style="width: 100%;">
			<div style="margin-top: 5px;">
				<?php 
					echo "<a href='profile.php?id=$COMMENT[userid]' style='text-decoration: none;'>";
					echo "<span style='color:red; font-size: 20px; font-weight: normal;'>" . htmlspecialchars($ROW_USER['username']) . "</span>" . " " . "<span style='color:#ccc; font-size: 13px; font-weight: normal;'>" .  "@" . htmlspecialchars($ROW_USER['tag_name']); 
					echo "</a>";
				?>
			</div>
			
			<?php echo check_tags($COMMENT['post']) ?>

			<br><br>

			<?php 

				if(file_exists($COMMENT['image']))
				{

					$post_image = $image_class->get_thumb_post($COMMENT['image']);

					echo "<img src='$post_image' style='width:80%;' />";
				}
				
			?>

		<br><br>
		<span style="color: #999;float:right;margin-top: -35px;">
			
			<?php 

				$post = new Post();

				if($post->i_own_post($COMMENT['postid'],$_SESSION['mybook_userid'])){

					echo "
					<a href='edit.php?id=$COMMENT[postid]' style='text-decoration: none; color: red; font-size:20px;'>
						<i class='fas fa-edit'></i>
					</a>&nbsp;";

					 
				}

				if(i_own_content($COMMENT)){

					echo "<a href='delete.php?id=$COMMENT[postid]' style='text-decoration: none; color: red; font-size:20px;'>
						<i class='fas fa-trash'></i>
					</a>";
				}
 
			 ?>
			 

		</span>

		<span style="color: #999;float:right;margin-top: -30px;">
			
			<?php echo $COMMENT['date'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

		</span>

			<?php 

				$i_liked = false;

				if(isset($_SESSION['mybook_userid'])){

					$DB = new Database();

					$sql = "select likes from likes where type='post' && contentid = '$COMMENT[postid]' limit 1";
					$result = $DB->read($sql);
					if(is_array($result)){

						$likes = json_decode($result[0]['likes'],true);

						$user_ids = array_column($likes, "userid");
		 
						if(in_array($_SESSION['mybook_userid'], $user_ids)){
							$i_liked = true;
						}
					}

				}

			 	if($COMMENT['likes'] > 0){

			 		echo "<br/>";
			 		echo "<a href='likes.php?type=post&id=$COMMENT[postid]'>";

			 		if($COMMENT['likes'] == 1){

			 			if($i_liked){
			 				echo "<div style='text-align:left;'>You liked this comment </div>";
			 			}else{
			 				echo "<div style='text-align:left;'> 1 person liked this comment </div>";
			 			}
			 		}else{

			 			if($i_liked){

			 				$text = "others";
			 				if($COMMENT['likes'] - 1 == 1){
			 					$text = "other";
			 				}
			 				echo "<div style='text-align:left;'> You and " . ($COMMENT['likes'] - 1) . " $text liked this comment </div>";
			 			}else{
			 				echo "<div style='text-align:left;'>" . $COMMENT['likes'] . " other liked this comment </div>";
			 			}
			 		}

			 		echo "</a>";

			 	}
			?>
		</div>
	</div>