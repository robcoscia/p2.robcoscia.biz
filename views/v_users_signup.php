<div class="Signupdiv">
	<h1> Create a new account</h1>
    <form  class="SignupForm" action="/users/p_signup" method="POST" onsubmit="return validateform(this);">
        <div class="FirstNameDiv">
        	<label  class="FirstNameLabel"> First Name: </label>
        	<input type="text" name="first_name" value="" max="30" size="30" />
        	<div class="FNErrorDiv"></div>
        	<br /> 
        </div>
        <div class="LastNameDiv"> 
        	<label class="LastNameLabel"> Last Name: </label>
        	<input type="text" name="last_name" value="" max="40" size="40" /> 
        	<div class="LNErrorDiv"></div>
        	<br /> 
        </div>
        <div class="EmailAddressDiv"> 
        	<label class="EmailAddressLabel"> Email Address: </label>
        	<input type="text" name="email" value="" max="50" size="50" /> 
        	<div class="EAErrorDiv"></div>
         	<br /> 
        </div>
        <div class="PasswordDiv"> 
        	<label class="PasswordLabel"> Password: </label>
        	<input type="password" name="password" value="" max="20" size="20" /> 
        	<div class="PassErrorDiv"></div>
        	<br /> 
        </div>
        <div class="VerifyPasswordDiv"> 
        	<label class="VerifyPasswordLabel"> Verify Password: </label>
        	<input type="password" name="verifypassword" value="" max="20" size="20"  /> 
        	<div class="VPassErrorDiv"></div>
       	<br />
        </div>
        <input class="CreateAccountInput" type="submit" value="Create Account" onclick="return validateform(this.form);" />
    </form>        
</div>