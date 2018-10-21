function create()
{
if(typeof(Storage)!=="undefined" && ((localStorage.lastname==="EmilChirila") || ((localStorage.lastname==="OvidiuCodila")))  )
		  {
        //alert("LogOut button is being created!");
        var btn = document.createElement("BUTTON");
        var t = document.createTextNode("Log Out2");
        btn.appendChild(t);
        document.body.appendChild(btn);
        btn.className = "logOutButton";
        btn.onclick = function() {
          if (confirm("You will be Logged Out? Press OK if you want to continue")) 
          {
            localStorage.lastname="loggedOut";
            window.location.href = 'index.html';
          } 
          else 
          {
            //do nothing if Cancel is pressed
          }
          //alert("Welcome " + localStorage.lastname + "!");
        }

        //alert("LogOut button created!");
      }
}