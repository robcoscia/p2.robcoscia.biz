	
<?php if(!$user): ?>

	<div class="indexDiv">
		<h1> Welcome to Shout Out </h1>
		<h2> A place where you can shout out to your friends </h2>
		<a href="/users/login">Login</a> Not a member ? <a href="/users/signup"> Sign up</a>
	</div>

<?php else: ?>

	<center >Welcome <?php $user->first_name; ?> </center>
	
<?php endif; ?>