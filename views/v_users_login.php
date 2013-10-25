<div class="LoginDiv>"
	<form class="LoginForm" action="/users/p_login" method="post">
		<div class="EmailDiv">
			<label class="EmailLabel" for="EmailInput">Email:</label>
			<input class="EmailInput" type="text" name="email" value="" maxlength="50" />
		</div>
		<div class="PwdDiv">
			<label class="PwdLabel" for="PwdInput">Password:</label>
			<input class="PwdInput" type="password" name="password" value="" maxlength="20" />
		</div>
		<div class="LoginErrorDiv">
			<?php if(isset($error)): ?>
			Login failed. Please double check your email and password.
			<?php endif; ?>
		</div>
		<input class="LoginInput" type="submit" value="Login" />
	</form>
</div>