
function verifypassword(password){
 	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
 	return re.test(password);
}

function verifyEmail(email){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
} 

function SetErrorText(form, classNm, msg)
{
        elements = form.getElementsByClassName(classNm);
        elements[0].innerHTML = msg;
    
}

function validateform(signUpForm){
	returnValue = true;
	if(signUpForm.first_name.value.length === 0)
	{
            SetErrorText(signUpForm, "FNErrorDiv", "* First Name is required");
            returnValue = false;
	}
        else
        {
            SetErrorText(signUpForm, "FNErrorDiv", "");
        }
	if(signUpForm.last_name.value.length === 0)
	{
            SetErrorText(signUpForm, "LNErrorDiv", "* Last Name is required");
            returnValue = false;
	}
        else
        {
            SetErrorText(signUpForm, "LNErrorDiv", "");
        }
 	if(signUpForm.email.value.length === 0)
	{
            SetErrorText(signUpForm, "EAErrorDiv", "* Email is required");
            returnValue = false;
	}
        else
        {
            if(!verifyEmail(signUpForm.email.value))
            {
                SetErrorText(signUpForm, "EAErrorDiv", "* Email is invalid and required");
                returnValue = false;               
            }
            SetErrorText(signUpForm,"EAErrorDiv", "");            
        }
	if(signUpForm.password.value.length === 0)
	{
            SetErrorText(signUpForm, "PassErrorDiv", "* Password is required");            
            returnValue = false;
	}
        else
        {
            if(!verifypassword(signUpForm.password.value))
            {
                SetErrorText(signUpForm, "PassErrorDiv", "* Password must contain at least one upper case letter, one lower case letter and one number");            
                returnValue = false;
            } 
            else
            {
                SetErrorText(signUpForm, "PassErrorDiv", "");            
            }
        }
	if(signUpForm.verifypassword.value.length === 0)
	{
                SetErrorText(signUpForm, "VPassErrorDiv", "* Verify Password is required");            
                returnValue = false;
	}
        else
        {
            if(signUpForm.password.value !== signUpForm.verifypassword.value)
            {
                SetErrorText(signUpForm, "PassErrorDiv", "* Passwords do not match");            
                returnValue = false;
            }
            else
            {
                SetErrorText(signUpForm, "VPassErrorDiv", "");                        
            }
        }
	return returnValue;
}
    