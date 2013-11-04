<div class="AddPostDiv">
	<form id="AddPostForm" method="POST" action="/posts/p_add">
		<br>
		<div id="ContentDiv">
		    <label id="ContentLabel" for="content" >New Shout:</label>
		    <textarea id="content" name='content' ></textarea>
		</div>
	    <br><br>
	    <div id="AddButtonDiv">
	    	<input id="ShoutButton" type="submit" value="Shout Out">
	    </div>
	</form>


	<div class="ShoutDiv">
		<br>
		<div class="ShoutSeperatorDiv"> </div>
		<br>
		<?php foreach($posts as $post): ?>

			<article class="ShoutArticle">
				<?php if(isset($post['avatar'])): ?>
					<img class="AvatarThumbnail" src="/uploads/avatars/<?php echo $post['avatar'] ?>"
					<br>
				<?php endif ?>
				<div class="ArticleContentDiv">
				    <h1><?php echo $post['first_name']?> <?php echo $post['last_name']?> posted:</h1>
					<br>

				    <p id="ArticleContent"><?php echo $post['content']?></p>

				    <time datetime="<?php echo Time::display($post['created'],'Y-m-d G:i')?>">
				        <?php echo Time::display($post['created'])?>
				    </time>
				</div>
				<br>
				<?php if($post['post_user_id'] == $user->user_id): ?>
					<a href="/posts/delete/<?php echo $post['post_id']?>" onclick="return ConfirmDelete();">
						<img id="DeleteImg" src="/images/delete.png" />
					</a>
				<?php endif; ?>
			</article>
			<br>
			<div class="ShoutSeperatorDiv"> </div>
			<br>
		<?php endforeach; ?>
	</div>



</div>