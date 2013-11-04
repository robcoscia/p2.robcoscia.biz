<div class="IndexDiv">
	<div class="ShoutDiv">
		<br>
		<br>
		<?php foreach($posts as $post): ?>

			<article class="ShoutArticle">
				<?php if(isset($post['avatar'])): ?>
					<img class="AvatarThumbnail" src="/uploads/avatars/<?php echo $post['avatar'] ?>"
					<br>
				<?php endif ?>
				<div class="ArticleContentDiv">
				    <h2><?php echo $post['first_name']?> <?php echo $post['last_name']?> posted:</h2>
					<br>

				    <p id="ArticleContent"><?php echo $post['content']?></p>

				    <time datetime="<?php echo Time::display($post['created'],'Y-m-d G:i')?>">
				        <?php echo Time::display($post['created'])?>
				    </time>
				</div>
			</article>
			<br>
			<div class="ShoutSeperatorDiv"> </div>
			<br>
		<?php endforeach; ?>
	</div>
</div>