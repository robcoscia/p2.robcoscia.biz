function validateform(profileForm) {
	var returnValue = true;
	
	returnValue &= ValidateText(profileForm.first_name, "FNErrorDiv");
	returnValue &= ValidateText(profileForm.last_name, "LNErrorDiv");
	returnValue &= ValidateEmail(profileForm.email, "EmlErrorDiv");
			
	return returnValue == 1;
}