<div id="BioDiv">
	<h1><?php echo $users[0]['first_name']?> <?php echo $users[0]['last_name'] ?></h1>
	<br>
	<?php if(isset($users[0]['avatar'])): ?>
		<img id="BioAvatarImg" src="/uploads/avatars/<?php echo $users[0]['avatar'] ?>" />
	<?php else: ?>
		<img id="BioAvatarImg" src="/images/generic_user.png" />
	<?php endif; ?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<p><b>Location:</b> <?php echo $users[0]['location'] ?> </p>
	<br>
	<br>
	<br>
	<br>
	<p><b>Biography:</b>
	<div id="BioContentDiv">
		<?php if(isset($users[0]['biography'])): ?>
			<p><?php echo $users[0]['biography'] ?></p>
		<?php else: ?>
			<p> Ask me for my bio. </p>
		<?php endif; ?>
		
	</div>
			
</div>