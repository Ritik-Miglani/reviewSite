function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}
	function validate() {
		// Make quick references to our fields.
		var fname = document.getElementById('fname');
		var lname = document.getElementById('lname');
		var age = document.getElementById('age');
		var sex = document.getElementById('sex');
		var location = document.getElementById('loc');
		var email = document.getElementById('email');
		var feedback = document.getElementById('feed');
		// To check empty form fields.
		var nameErr = ageErr = lnameErr = sexErr = locErr = feedErr = emailErr = true;

		
		if(fname.value == "") {
			printError("nameErr", "Please enter your name");
		}
		else {
			var regex = /^[a-zA-Z\s]+$/;                
			if(regex.test(fname.value) === false) {
				printError("nameErr", "Please enter a valid name");
			} else {
				printError("nameErr", "");
				nameErr = false;
			}
		}
		
		if(lname.value == "") {
			printError("lnameErr", "Please enter your last name");
		}
		else {
			var regex = /^[a-zA-Z\s]+$/;                
			if(regex.test(lname.value) === false) {
				printError("lnameErr", "Please enter a valid name");
			} else {
				printError("lnameErr", "");
				lnameErr = false;
			}
		}
		
		if(age.value=='')
		{
			printError("ageErr", "Please enter age");
		}
		else
		{
			printError("ageErr", "");
			ageErr = false;
		}
		if(sex.value == "")
		{
			printError("sexErr", "Please enter sex");
		}
		else
		{
			if(sex.value=="male"||sex.value=="MALE"||sex.value=="female"||sex.value=="FEMALE")
			{
				printError("sexErr", "");
				sexErr = false;
			}
			else
			{
				printError("sexErr", "Enter correctly");
			}
		}
		if(location.value == "")
		{
			printError("locErr","Please enter location");
		}
		else
		{
			printError("locErr","");
			locErr=false;
		}
		
		if(email.value == "")
		{
			printError("emailErr","Please enter Email ");
		}
		else
		{
			var regex = /^\S+@\S+\.\S+$/;
			if(regex.test(email.value) === false) 
			{
				printError("emailErr", "Please enter a valid email address");
			} 
			else
			{
				printError("emailErr", "");
				emailErr = false;
			}
		}
		
		if(feedback.value=="")
		{
			printError("feedErr","Enter feedback");
		}
		else
		{
			printError("feedErr","");
			feedErr=false;
			
		}
		
		if((nameErr || sexErr || emailErr || ageErr || locErr || feedErr || lnameErr) == true) 
		{
			return false;
		}
		
};