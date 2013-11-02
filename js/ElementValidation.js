function VerifyPassword(password) {
	var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
	return re.test(password);
}

function VerifyEmail(email) {
	var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	return re.test(email);
}

function SetErrMsg(inElement, id, msg) {
	var element = inElement.parentNode.childNodes[id];
	element.innerHTML = msg;
}

function ValidateText(inputElement, errorDiv) {
	if (inputElement.value.length === 0) {
		SetErrMsg(inputElement, errorDiv, "*" + inputElement.name + " is required");
		return false;
	} else {
		SetErrMsg(inputElement, errorDiv, "");
	}
	return true;
}

function ValidateEmail(inputElement, errorDiv) {
	if (inputElement.value.length === 0) {
		SetErrMsg(inputElement, errorDiv, "*" + inputElement.name + " is required");
		return false;
	} else {
		if (VerifyEmail(inputElement.value)) {
			SetErrMsg(inputElement, errorDiv, "");
		} else {
			SetErrMsg(inputElement, errorDiv, "* Email is invalid and required");
			return false;
		}
	}
	return true;
}

function ValidatePassword(inputElement, errorDiv) {
	if (inputElement.value.length === 0) {
		SetErrMsg(inputElement, errorDiv, "*" + inputElement.name + " is required");
		return false;
	} else {
		if (VerifyPassword(inputElement.value)) {
			SetErrMsg(inputElement, errorDiv, "");
		} else {
			SetErrMsg(inputElement, errorDiv, "* Password must contain at least one upper case letter, one lower case letter and one number");
			return false;
		}
	}
	return true;
}
