<?php include('server.php') ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>Space Explorer</title>

  
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="styleMainPages/style.css" title="style" />
  <link rel="Tab icon" type="image/png" href="img/icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/logInOutMainButtons.js"></script>
</head>

<body>

  <?php
    if(isset($_SESSION['username']))
    {
        echo '<style type="text/css">
            .logIn {
                display: none;
            }
            .logOut {
                display: block;
            }
            .logoutForm {
                display: block;
            }
            </style>';
    }
    else
    {
        echo '<style type="text/css">
            .logIn {
                display: block;
            }
            .logOut {
                display: none;
            }
            .logoutForm {
                display: none;
            }
            </style>';
    }
    ?>
    
  <div id="main">
    <div id="header" >
      <div id="logo" >
      <form name="logoutForm" action="enterPage.php" method="post" class="logoutForm">
          <div class="logoutDiv">
          <input type="submit" value="Logout" name="logoutButton"/>
          </div>
       </form>
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><span class="logo_colour">Space Explorer</span></h1>
          <h2><span class="subtext">EXPLORE IT LIKE NEVER BEFORE!</span></h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li>
            <button class="btn">
              <a href="index.html"><i class="fa fa-home"></i> </a>
            </button></li>
          <li><a href="enterPage.php">Home</a></li>
          <li class="dropdown"><a href="javascript:void(0)" class="dropbtn">Tickets</a>
                <div class="dropdown-content">
                  <a href="fullPackRezerv.php">Full Package</a>
                  <a href="spaceShipRezerv.php">Space Ship Only</a>
                  <a href="hotelsPage.php">Hotels</a>
                </div>
          </li>
          <li><a href="funFacts.php">Fun Facts</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="about.php">About Us</a></li>
          <li class="logIn"><a href="login.php">LogIn</a></li>
          <li class="logOut"><a href="#">History</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- here we have our sidebar :) -->
        
        <h3>News and Articles</h3>
        <div class="news">
          <h4>Tesla reaching new Hights!</h4>
          <img src = "./img/teslaSpace.png" height = "60" width = "120"></img>
          <br>
          <a href="https://www.space.com/42337-spacex-tesla-roadster-starman-beyond-mars.html">Check it out!</a>
        </div>

        <div class="news">
          <h4>New planets in our vecinity!<br />
          <img src = "./img/planetSp.jpg" height = "60" width = "120"></img>
          <br>
          <a href="https://www.independent.co.uk/news/science/exoplanets-latest-new-infant-planets-found-scientists-astronomy-a8397001.html">Check it out!</a>
        </div>

        <div class="news">
          <h4>New hotels soon!<br />
          <img src = "./img/hotelSp.jpg" height = "60" width = "120"></img>
          <br>
          <a href="#">Check it out!</a>
        </div>

        <h3>Useful Links</h3>
        <ul>
          <li><a href="https://www.youtube.com/">Youtube</a></li>
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://9gag.com/">9GAG</a></li>
          <li><a href="https://www.reddit.com/">Reddit</a></li>
        </ul>
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>About us..</h1>

        <h2>Founders</h2>
        <table style="width:100%; border-spacing:0;">
          <tr><th>Name</th><th>Position</th></tr>
          <tr><td>Chirila Emil</td><td>CEO</td></tr>
          <tr><td>Codila Ovidiu</td><td>CEO</td></tr>
        </table>

        <p>Two partners with a small business wanting to go big. And we did. With founds from different organizations and other sources of income we started this project
        with a big desire to explore the space and to let others enjoy it too. We started from the bottom and now we are to the top...literally to the top. And we aint
        going to stop here! </p>
      </div>
    </div>
  </div>
  
</body>
</html>
