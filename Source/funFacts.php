<?php include('server.php') ?>
<!DOCTYPE HTML>
<html>

<head>
  <title>black_white - another page</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <link rel="stylesheet" type="text/css" href="styleMainPages/style.css" title="style" />
  <link rel="Tab icon" type="image/png" href="img/icon.png">
  <link rel="stylesheet" type="text/css" href="styleMainPages/weight.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/logInOutMainButtons.js"></script>
  <script src="js/weightCalculation.js"></script>

  <!-- The script where the weight is computed --> 
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
                  <a href="#">Full Package</a>
                  <a href="spaceShipRezerv.php">Space Ship Only</a>
                  <a href="#">Another Tab</a>
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
        <!-- insert your sidebar items here -->
        <h3>Latest News</h3>
        <h4>New Website Launched</h4>
        <h5>July 1st, 2014</h5>
        <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>New Website Launched</h4>
        <h5>July 1st, 2014</h5>
        <p>2014 sees the redesign of our website. Take a look around and let us know what you think.<br /><a href="#">Read more</a></p>
        <h3>Useful Links</h3>
        <ul>
          <li><a href="#">link 1</a></li>
          <li><a href="#">link 2</a></li>
          <li><a href="#">link 3</a></li>
          <li><a href="#">link 4</a></li>
        </ul>
        <h3>Search</h3>
        <form method="post" action="#" id="search_form">
          <p>
            <input class="search" type="text" name="search_field" value="Enter keywords....." />
            <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="styleMainPages/search.png" alt="Search" title="Search" />
          </p>
        </form>
      </div>
      <div id="content">
      
        <!-- insert the page content here -->
        <h1>Ever wonder how much you would weigh on other planets? Find out Below!</h1>
        <form method="post">
          <div id="enterweight" class="fancytype">
            ENTER YOUR WEIGHT HERE → 
            <input type="text" name="wt" size="5">
            <input type="button" value="Calculate" onclick="compute_weight(this.form)">
          </div>
          <hr>
          <h2 class="fancytype">
            The Planets
          </h2>
          <p>
          <div class="milkyway">
            <span class="planet">
              <h4>
                MERCURY 
              </h4>
              <a href="http://www.nineplanets.org/mercury.html"><img src="./weight_files/mercury.gif" width="100" height="100" alt="Mercury"></a><br>
              Your&nbsp;weight&nbsp;is<br>
              <input type="text" name="outputmrc" size="6">
            </span>
            <span class="planet">
              <h4>
                VENUS 
              </h4>
              <a href="http://www.nineplanets.org/venus.html"><img src="./weight_files/venus.gif" width="100" height="100" alt="Venus"></a><br>
              Your weight is<br>
              <input type="text" name="outputvn" size="6">
            </span>

            <span class="planet">
              <h4>
                THE MOON 
              </h4>
              <a href="http://www.nineplanets.org/luna.html"><img src="./weight_files/moon.gif" width="100" height="100" alt="The Moon"></a><br>
              Your weight is<br>
              <input type="text" name="outputmoon" size="6">
            </span>
            <span class="planet">
              <h4>
                MARS 
              </h4>
              <a href="http://www.nineplanets.org/mars.html"><img src="./weight_files/mars.gif" width="100" height="100" alt="Mars"></a><br>
              Your weight is<br>
              <input type="text" name="outputmars" size="6">
            </span>
            <span class="planet">
              <h4>
                JUPITER 
              </h4>
              <a href="http://www.nineplanets.org/jupiter.html"><img src="./weight_files/jupiter.gif" width="100" height="100" alt="Jupiter"></a><br>
              Your weight is<br>
              <input type="text" name="outputjp" size="6">
            </span>
            <span class="planet">
              <h4>
                SATURN 
              </h4>
              <a href="http://www.nineplanets.org/saturn.html"><img src="./weight_files/saturn.gif" width="100" height="100" alt="Saturn"></a><br>
              Your weight is<br>
              <input type="text" name="outputsat" size="6">
            </span>
            <span class="planet">
              <h4>
                URANUS 
              </h4>
              <a href="http://www.nineplanets.org/uranus.html"><img src="./weight_files/uranus.gif" width="100" height="100" alt="Uranus"></a><br>
              Your weight is<br>
              <input type="text" name="outputur" size="6">
            </span>
            <span class="planet">
              <h4>
                NEPTUNE 
              </h4>
              <a href="http://www.nineplanets.org/neptune.html"><img src="./weight_files/neptune.gif" width="100" height="100" alt="Neptune"></a><br>
              Your weight is<br>
              <input type="text" name="outputnpt" size="6">
            </span>
            <span class="planet">
              <h4>
                PLUTO 
              </h4>
              <a href="http://www.nineplanets.org/pluto.html"><img src="./weight_files/pluto.gif" width="100" height="100" alt="Pluto"></a><br>
              Your weight is<br>
              <input type="text" name="outputplt" size="6">
            </span>
          </div>
        </p>
        <p></p>
      </div>
    </div> 
  </div>

</body>
</html>
