
function validateform(loginForm){
	var returnValue = true;
	returnValue &= ValidateText(loginForm.email, "EmlErrorDiv");
	returnValue &= ValidateText(loginForm.password, "PassErrorDiv");
 	
	return returnValue == 1;
}