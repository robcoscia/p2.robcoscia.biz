<div id="ProfileDiv">
	<form id="ProfileForm" action="/users/p_profile" method="post" enctype="multipart/form-data">
		<div id="FirstNmDiv">
			<label class="ProfileLabel" for="first_name">First Name:</label>
			<input class="ProfileVaues" id="first_name" type="text" name="first_name" value="<?php echo $user->first_name ?>"  onblur="ValidateText(this, 'FNErrorDiv');" />
			<div id="FNErrorDiv" class="ErrorDiv"></div>
		</div>
		<br>
		<div id="LastNmDiv">
			<label class="ProfileLabel" for="last_name">Last Name:</label>
			<input class="ProfileVaues" id="last_name" type="text" name="last_name" value="<?php echo $user->last_name ?>" onblur="ValidateText(this, 'LNErrorDiv');" />
			<div id="LNErrorDiv" class="ErrorDiv"></div>
		</div>
		<br>
		<div id="EmailDiv">
			<label class="ProfileLabel" for="email">Email:</label>
			<input class="ProfileValues" id="email" type="text" name="email" value="<?php echo $user->email ?>" onblur="ValidateEmail(this, 'EmlErrorDiv');" />
			<div id="EmlErrorDiv" class="ErrorDiv"></div>
		</div>
		<br>
		<br>
		<div id="LocationDiv">
			<label class="ProfileLabel" for="location">Location:</label>
			<input class="ProfileValues" id="location" type="text" name="location" value="<?php echo $user->location ?>" />
			<div id="locErrorDiv" class="ErrorDiv"></div>
		</div>
		<br>
		<br>
		<div id="AvatarDiv">
			<label class="ProfileLabel">Profile Picture:</label>
			<?php if(isset($user->avatar)): ?>
				<img id ="AvatarImage" src="<?php echo $user->avatar ?>" />
			<?php endif; ?>
			<input class="ProfileVaues" id="avatar_file" type="file" name="avatar_file" />
			<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div id="BiographyDiv">
			<label class="ProfileLabel"> Biography:</label>
			<textarea id="BiographyTextArea" class="ProfileValues" name="biography" ><?php echo $user->biography ?></textarea>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<div id="ErrorMsgDiv">
			<?php if(isset($error)): ?>
				<p>Unable to complete update.</p>
			<?php endif; ?>
		</div>
		<br>
		<br>
		<div id="UpdateButtonDiv">
			<input id="UpdateButton" type="submit" value="Update" onclick="return validateform(this.form);"/>
		</div>
	</form>
</div>