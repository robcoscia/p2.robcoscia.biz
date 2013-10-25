function SetErrorText(form, classNm, msg)
{
        elements = form.getElementsByClassName(classNm);
        elements[0].innerHTML = msg;
    
}

function validateform(loginForm){
 	if(loginForm.email.value.length === 0)
	{
            SetErrorText(loginForm, "LoginErrorDiv", "Login failed. Please double check your email and password.");
            return false;
	}
	if(loginForm.password.value.length === 0)
	{
            SetErrorText(loginForm, "PwdInput", "Login failed. Please double check your email and password.");            
            return false;
	}
	return true;
}