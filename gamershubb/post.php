<style>
	#like {
		font-size: 30px;
	}

	a {
		text-decoration: none; 
		font-size: 15px; 
		color: #ccc;
	}

	a:hover {
		color: red;
		transition: .8s;
	}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Syncopate&display=swap" rel="stylesheet">	
	<div id="post">
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

			<img src="<?php echo $image ?>" style="width: 75px;margin-right: 4px;border-radius: 50%; border: 1px solid red;">
		</div>
		<div style="width: 100%;">
			<div style="width: 100%;">
				<?php 
					echo "<a href='profile.php?id=$ROW[userid]' style='text-decoration: none; color: red; font-size: 25px;'>";
					echo ($ROW_USER['username']);
					echo "</a>";
					echo "<span style='color: #ccc;'>";
					echo "&nbsp; @" . htmlspecialchars($ROW_USER['tag_name'])."&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "</span>";
					echo "<span style='float:right;color: #ccc; font-size: 15px;'>";
					echo "<img src='$game_image' style='width:15px; height:15px;'>" . "&nbsp;&nbsp;".($ROW_USER['game']);
					echo "</span>";
				?>

			</div>
			
			<?php echo check_tags($ROW['post']) ?>

			<br><br>

			<?php 

				if(file_exists($ROW['image']))
				{

					$post_image = $image_class->get_thumb_post($ROW['image']);

					echo '<a href="single_post.php?id=' . $ROW['postid'] .'">';
					echo "<img src='$post_image' style='width:80%; border: 1px solid red;' />";
					echo '</a>';
				}
				
			?>

		<br><br>
		<?php 
			$likes = "";

			$likes = ($ROW['likes'] > 0) ? " [" .$ROW['likes']. "]" : "" ;

		?>
		<a onclick="like_post(event)" href="like.php?type=post&id=<?php echo $ROW['postid'] ?>"><i class="far fa-heart" style="font-size: 20px;"></i> LIKE <?php echo $likes ?></a>&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;

		<?php 
			$comments = "";

			if($ROW['comments'] > 0){

				$comments = "[" . $ROW['comments'] . "]";
			}

		?>

		<a href="single_post.php?id=<?php echo $ROW['postid'] ?>"><i class="fas fa-comment-dots" style="font-size: 20px;"></i> Comment&nbsp;&nbsp;&nbsp;<?php echo $comments ?></a> | 
		
		<span style="float:right; font-size: 20px;">
			
			<?php 

				$post = new Post();

				if($post->i_own_post($ROW['postid'],$_SESSION['mybook_userid'])){

					echo "
					<a href='edit.php?id=$ROW[postid]' style='text-decoration: none;font-size: 20px;'>
						<i class='fas fa-edit'></i>
					</a>&nbsp;

					<a href='delete.php?id=$ROW[postid]' style='text-decoration: none;font-size: 20px;'>
						<i class='fas fa-trash'></i>
					</a><br>";
				}
 
			?>

		</span>
		<span style="color: #999; float:right; margin-top: 5px;">
			
		

			<?php echo ($ROW['date']) ?>&nbsp;&nbsp;&nbsp;&nbsp;

		</span>			
		</div>
	</div>

	<span>
		<div id="separator"></div><br><br>
	</span>

<script type="text/javascript">
	

	function ajax_send(data,element){

		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function(){

			if(ajax.readyState == 4 && ajax.status == 200){

				response(ajax.responseText,element);
			}
			
		});

  		data = JSON.stringify(data);

		ajax.open("post","ajax.php",true);
		ajax.send(data);

	}

	function response(result,element){
		if(result != ""){

			var obj = JSON.parse(result);
			if(typeof obj.action != 'undefined'){

				if(obj.action == 'like_post'){

					var likes = "";

					if(typeof obj.likes != 'undefined'){
						likes = (parseInt(obj.likes) > 0) ? "<i class='fas fa-heart' style='color: red; font-size: 20px;'></i> [" +obj.likes+ "] LIKE" : "<i class='far fa-heart' style='font-size: 20px;'></i> LIKE" ;
						element.innerHTML = likes;
					}

					if(typeof obj.info != 'undefined'){
						var info_element = document.getElementById(obj.id);
						info_element.innerHTML = obj.info;
					}
				}
			}
		}
	}

	function like_post(e){

		e.preventDefault();
		var link = e.target.href;

		var data = {};
		data.link = link;
		data.action = "like_post";
		ajax_send(data,e.target);
	}

</script>
