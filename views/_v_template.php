<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />	
					
	<!-- Controller Specific JS/CSS -->
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
	
</head>

<body>	
	<header>
			<?php if(isset($user->first_name)): ?>
				<div id="WelcomeDiv"> Welcome <?php  echo $user->first_name  ?> </div>
				<br>
			<?php endif; ?>
		<div id="BrandDiv">
			<img id="BrandImg" src="/images/Woman_calling_sml.jpg" >
			<span id="CaptionSpan">Shout Out</span>
		</div>
		<div id='MenuDiv'>
	
	        <a href='/'>Home</a>
	
	        <!-- Menu for users who are logged in -->
	        <?php if($user): ?>
				<a class="MenuItems" href='/posts/Add'>ShoutOut</a>
				<a class="MenuItems" href='/posts/users'>Shouters</a>
	            <a class="MenuItems" href='/users/profile'>Profile</a>
	            <a class="MenuItems" href='/users/logout'>Logout</a>
	
	        <!-- Menu options for users who are not logged in -->
	        <?php else: ?>
	
	            <a class="MenuItems" href='/users/signup'>Sign up</a>
	            <a class="MenuItems" href='/users/login'>Log in</a>
	
	        <?php endif; ?>
		    </div>
			<div id="MainSeperatorDiv" />	
	</header>
	
	<?php if(isset($content)) echo $content; ?>

	<?php if(isset($client_files_body)) echo $client_files_body; ?>
	<br>
	<div id="BottomSeperatorDiv" />
</body>
</html>