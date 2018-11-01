function logout()
{
        if(typeof(Storage)!=="undefined" && ((sessionStorage.lastname==="EmilChirila") || ((sessionStorage.lastname==="OvidiuCodila")))  )
        {
          	sessionStorage.lastname="loggedOut";
        	window.location.href='index.html';
        }
}

function isLoggedIn()
{
	var btn1 = document.getElementsByClassName("logIn");
        var btn2 = document.getElementsByClassName("logOut");

        btn1[0].style.display = "none";
        btn2[0].style.display = "block";

        alert("SUNT LOGAT");
}

function isLoggedOut()
{
        var btn1 = document.getElementsByClassName("logIn");
        var btn2 = document.getElementsByClassName("logOut");

        btn1[0].style.display = "block";
        btn2[0].style.display = "none";

        alert("NU SUNT LOGAT");
}