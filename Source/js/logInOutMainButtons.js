function logout()
{
        if(typeof(Storage)!=="undefined" && ((sessionStorage.lastname==="EmilChirila") || ((sessionStorage.lastname==="OvidiuCodila")))  )
        {
          	sessionStorage.lastname="loggedOut";
        	window.location.href='index.html';
        }
}

function checkLogIn()
{
	var btn1 = document.getElementsByClassName("logIn");
        var btn2 = document.getElementsByClassName("logOut");
        if(typeof(Storage)!=="undefined" && ((sessionStorage.lastname==="EmilChirila") || ((sessionStorage.lastname==="OvidiuCodila")))  )
        {
          	btn1[0].style.display = "none";
          	btn2[0].style.display = "block";
        }
        else
        {
          	btn1[0].style.display = "block";
          	btn2[0].style.display = "none";
        }
}