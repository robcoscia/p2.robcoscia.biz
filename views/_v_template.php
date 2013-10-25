<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<header>
		<div class="BrandDiv">
			<img class="BrandImg" src="/images/Woman_calling_sml.jpg" >
				<span class="CaptionSpan">Shout Out</span>
		</div>
		<div class='MenuDiv'>
	
	        <a href='/'>Home</a>
	
	        <!-- Menu for users who are logged in -->
	        <?php if($user): ?>
	
	            <a href='/users/logout'>Logout</a>
	            <a href='/users/profile'>Profile</a>
	
	        <!-- Menu options for users who are not logged in -->
	        <?php else: ?>
	
	            <a href='/users/signup'>Sign up</a>
	            <a href='/users/login'>Log in</a>
	
	        <?php endif; ?>
		    </div>
			<div class="MainSeperatorDiv" />	
	</header>
	
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	<br>
</body>
</html>