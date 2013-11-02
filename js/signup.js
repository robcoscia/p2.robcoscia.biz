
function validateform(signUpForm) {
	var returnValue = true;
	
	returnValue &= ValidateText(signUpForm.first_name, "FNErrorDiv");
	returnValue &= ValidateText(signUpForm.last_name, "LNErrorDiv");
	returnValue &= ValidateEmail(signUpForm.email, "EAErrorDiv");
	returnValue &= ValidatePassword(signUpForm.password, "PassErrorDiv");
	returnValue &= ValidatePassword(signUpForm.verifypassword, "VPassErrorDiv");
	if (signUpForm.password.value !== signUpForm.verifypassword.value) {
		SetErrMsg(signUpForm.verifypassword, "PassErrorDiv", "* Passwords do not match");
		returnValue &= false;
	}
			
	return returnValue == 1;
}