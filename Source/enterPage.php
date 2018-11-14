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

<body> <!-- onload="checkLogIn()" -->
  <!-- <button class="logOutButton" onclick="logOut()" >Log Out</button>  -->
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
          <li class="logOut"><a href="history.php">History</a></li>
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
        <h1>Ever wanted to explore the space?!</h1>
        <img src = "./img/spaceSpace.jpg" height = "200" width = "450"> </img>
        <h1>To make it up to new hights?!</h1>
        <img> </img>
        <h1>To see whats there beyond our plane?!</h1>
        <img src = "./img/beyondEarth.jpg" height = "200" width = "450"> </img>
        <h1>Well then <strong>Space Explorer</strong> is the place for you!</h1>
        <br>
        <h3>We've got everything you could desire!</h3>
        <h3>Luxurious hotels, Spectacular landscapes! Activities for every age!</h3>
        <h1> Come now while you can!</h5>
        <img src = "./img/hotelShowcase.jpg" height = "200" width = "450"> </img>
      </div>
    </div> 
  </div>

<script src="js/main.js"></script>

</body>
</html>
