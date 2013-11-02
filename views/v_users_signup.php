<div class="Signupdiv">
	<h1> Create a new account</h1>
    <form  id="SignupForm" action="/users/p_signup" method="POST" >
        <div id="FirstNameDiv">
        	<label  id="FirstNameLabel" class="SignupLabel">First Name:</label>
        	<input class="SignupValue" type="text" name="first_name" value="" max="30" size="30" onblur="ValidateText(this, 'FNErrorDiv');"/>
        	<div id="FNErrorDiv" class="ErrorDiv"></div>
        	<br /> 
        </div>
        <div id="LastNameDiv"> 
        	<label id="LastNameLabel" class="SignupLabel"> Last Name: </label>
        	<input class="SignupValue" type="text" name="last_name" value="" max="40" size="40" onblur="ValidateText(this, 'LNErrorDiv');"/> 
        	<div id="LNErrorDiv" class="ErrorDiv"></div>
        	<br /> 
        </div>
        <div id="EmailAddressDiv"> 
        	<label id="EmailAddressLabel" class="SignupLabel"> Email Address: </label>
        	<input class="SignupValue" type="text" name="email" value="" max="50" size="50" onblur="ValidateEmail(this, 'EAErrorDiv');"/> 
        	<div id="EAErrorDiv" class="ErrorDiv"></div>
         	<br /> 
        </div>
        <div id="PasswordDiv"> 
        	<label id="PasswordLabel" class="SignupLabel"> Password: </label>
        	<input class="SignupValue" type="password" name="password" value="" max="20" size="20" onblur="ValidatePassword(this, 'PassErrorDiv');"/> 
        	<div id="PassErrorDiv" class="ErrorDiv"></div>
        	<br /> 
        </div>
        <div id="VerifyPasswordDiv"> 
        	<label id="VerifyPasswordLabel" class="SignupLabel"> Verify Password: </label>
        	<input class="SignupValue" type="password" name="verifypassword" value="" max="20" size="20"  /> 
        	<div id="VPassErrorDiv" class="ErrorDiv"></div>
       	<br />
        </div>
        <br>
		<div id="CreateButtonDiv">
        	<input id="CreateAccountInput" type="submit" value="Create Account" onclick="return validateform(this.form);" />
		</div>
    </form>        
</div>