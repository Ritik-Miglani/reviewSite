function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}
function validate()
{
	var femail = document.getElementById('femail');
	var femailErr =true;
	if(femail.value=="")
	{
		printError("femailErr","Please enter Email");
	}
	else
	{
		var regex = /^\S+@\S+\.\S+$/;
		if(regex.test(femail.value) === false) 
		{
			printError("femailErr", "Please enter a valid email address");
		} 
		else
		{
			printError("femailErr", "");
			emailErr = false;
		}
	}
	if(femailErr==true)
	{
		return false;
	}
		
};