function check(form)
{
	sessionStorage.lastname = "loggedOut";
	if((form.userid.value == "EmilChirila" && form.pswrd.value == "12345") || (form.userid.value == "OvidiuCodila" && form.pswrd.value == "12345"))
	{
		sessionStorage.lastname = form.userid.value;//we pass on the user input given
		window.location.href = 'index.html';//we go back to the main page
	}
	else
	{
		alert("Incorrect UserName or Password!")
		sessionStorage.lastname = "loggedOut";
	}
}

function exitLogIn(form)
{
	window.history.back();
}