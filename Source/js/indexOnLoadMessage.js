function goEnterPage()
{
	window.location.href = 'enterPage.html';
	if(typeof(Storage)!=="undefined" && ((sessionStorage.lastname==="EmilChirila") || ((sessionStorage.lastname==="OvidiuCodila")))  )
	{
		alert("Welcome " + sessionStorage.lastname + "!");
	}
	else
	{
		//do nothing if you are logged out
	}
}