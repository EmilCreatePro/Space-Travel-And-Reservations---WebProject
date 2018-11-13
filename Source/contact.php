

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
          <!--<li class="sendMail"><a href="testMail.php">Send Mail</a></li> -->
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
        <div class="someText">
        <h1>Contact Us</h1>
        <h3>For rezervations you can: </h3>
        <p> - email: space.explorer@gmail.com </p>
        <p> - phone: +40771820435 </p>
        <a href="fullPackRezerv.php"> - or do it yourself online </a>

        <h3>For complaints and other messages: </h3>
        <p> - email: space.complaints@gmail.com </p>
        <p> - phone: +40744448751 </p>

        <h3> Thankyou for Choosing us! </h4>
        </div>
        <?php
          //code that will most likely be used

          // Please specify your Mail Server - Example: mail.yourdomain.com.
          ini_set("SMTP","mail.YourDomain.com");

          // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
          ini_set("smtp_port","25");

          if(isset($_POST['your_name']) && isset($_POST['your_email']) && isset($_POST['your_enquiry']))
          {
            $name = $_POST['your_name'];
            $email = $_POST['your_email'];
            $to1 = 'emilchirila97@gmail.com';
            $to2 = 'ovidiu.codila@gmail.com';
            $subject = "Feedback from Client";
            $body = $_POST['your_enquiry'];

            //headers -> nush exact de ce am nevoie de astea dar cica sunt importante
            
            $headers = "From: ".$name." <".$email.">\r\n";
            $headers .= "Reply-To: ".$email."\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset-utf-8";
            
            /*
            $headers =  'MIME-Version: 1.0' . "\r\n"; 
            $headers .= 'From: Your name <info@address.com>' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            */
            //amu sa trimitem mailul

            $send = mail($to1, $subject, $body, $headers);//trimite la 'emilchirila97@gmail.com'

            if($send)
            {
              echo "Thank you for your input! We will respond to your feedback as soon as posible!";
            }
            else
            echo "Error when sending mail!";
            /*
            $send = mail($to2, $subject, $body, $headers);//trimite la 'ovidiu.codila@gmail.com'

            if($send)
            {
            //echo "Thank you for your input! We will respond to your feedback as soon as posible!"; -> nu mai zicem asta inca o data
            }
            else
              echo "Error when sending mail!";
              */
          }
          else
          {
            //aici ar trebui sa fie ceva mesaj in care sa spuna ca trebuie completate campurile...
          }

?>
      </div>
    </div>
  </div>
  
</body>
</html>
