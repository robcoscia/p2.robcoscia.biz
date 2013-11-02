	
<?php if(!$user): ?>

	<div class="indexDiv">
		<h1> Welcome to Shout Out </h1>
		<h2> A forum to shout out to your friends </h2>
		<a class="LoginAnchor" href="/users/login">Login</a> Not a member? <a class="SignUpAnchor" href="/users/signup"> Sign up</a>
	</div>

<?php else: ?>

<center> Welcome <?php  echo $user->first_name  ?> </center>
	
<?php endif; ?>
