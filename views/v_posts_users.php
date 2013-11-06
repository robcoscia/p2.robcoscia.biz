<div class="UsersDiv">
	<?php foreach($users as $user): ?>
		<br>
		<div id="UserDiv">
			 
			<?php if(isset($user['avatar']) && strlen($user['avatar']) !== 0): ?>
				<a href="/users/bio/<?= $user['user_id']?>">
					<img class="AvatarThumbnail" src="/uploads/avatars/<?php echo $user['avatar']?>" />
				</a>
			<?php else: ?>
				<a href="/users/bio/<?= $user['user_id']?>">
					<img class="AvatarThumbnail" src="/images/generic_user.png" />
				</a>
			<?php endif; ?>	 
			
			<br>
			<br>
			
			<h2><?=$user['first_name']?> <?=$user['last_name']?></h2>
		
			<div id="ConnectionDiv">
			    <?php if(isset($connections[$user['user_id']])): ?>
			        <a href='/posts/unfollow/<?=$user['user_id']?>'>Unfollow</a>
			
			    <!-- Otherwise, show the follow link -->
			    <?php else: ?>
			        <a href='/posts/follow/<?=$user['user_id']?>'>Follow</a>
			    <?php endif; ?>
			</div>
		</div>
	    <br><br><br>
		<div id="UserSeperatorDiv"> </div>
	
	<?php endforeach; ?>
</div>