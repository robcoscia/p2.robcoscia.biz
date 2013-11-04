<div id="LoginDiv">
	<form class="LoginForm" action="/users/p_login" method="post"  >
		<div id="EmailDiv">
			<label id="EmailLabel" class="LoginLabel" for="EmailInput">Email:</label>
			<input type="text" name="email" value="" maxlength="50" />
			<div id="EmlErrorDiv" class="ErrorDiv"></div>
		</div>
		<div id="PwdDiv">
			<label id="PwdLabel" class="LoginLabel" for="PwdInput">Password:</label>
			<input type="password" name="password" value="" maxlength="20" />
        	<div id="PassErrorDiv" class="ErrorDiv"></div>
		</div>
		<div id="LoginErrorDiv">
		<?php if(isset($error)): ?>
			<?php if($error == 1):?>
				<p>Login failed. Please double check your email and password.</p>
			<?php elseif($error == 2): ?>
				<p>An account with that email exists. Please Login</p>
			<?php else: ?>
				<p>Internal Error: Please try again</p>
			<?php endif; ?>
			<br>
		<?php endif; ?>
		</div>
		<div id="LoginButtonDiv">
			<input id="LoginInput" type="submit" value="Login" onclick="return validateform(this.form);"/>
		</div>
    </form>
</div>