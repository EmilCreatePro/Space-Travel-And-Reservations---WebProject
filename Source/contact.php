<?php
//code that will most likely be used

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
  $headers = "Reply-To ".$email."\r\n";
  $headers = "MINE-Version: 1.0\r\n";
  $headers = "Content-type: text/html; charset-utf-8";

  //amu sa trimitem mailul

  $send = mail($to1, $subject, $body, $headers);//trimite la 'emilchirila97@gmail.com'

  if($send)
  {
    echo "Thank you for your input! We will respond to your feedback as soon as posible!";
  }
  else
  echo "Error when sending mail!";
}
else
{
  //aici ar trebui sa fie ceva mesaj in care sa spuna ca trebuie completate campurile...
}

$send = mail($to2, $subject, $body, $headers);//trimite la 'ovidiu.codila@gmail.com'

  if($send)
  {
    //echo "Thank you for your input! We will respond to your feedback as soon as posible!"; -> nu mai zicem asta inca o data
  }
  else
  echo "Error when sending mail!";
}
else
{
  //aici ar trebui sa fie ceva mesaj in care sa spuna ca trebuie completate campurile...
}
?>

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
          <li class="sendMail"><a href="testMail.php">Send Mail</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <!-- here we have our sidebar :) -->
        
        <h3>Here is some text</h3>
        <h4>This will be a sidebar</h4>
        <h5>July 1st, 2014</h5>
        <p>Text for news<br /><a href="#">Read more</a></p>
        <p></p>
        <h4>And here we will have some news</h4>
        <h5>July 1st, 2014</h5>
        <p>Text for news<br /><a href="#">Read more</a></p>
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
        <h1>Contact Us</h1>
        <p>Below is an example of how a contact form might look with this template:</p>
        <form action="#" method="post">
          <div class="form_settings">
            <p><span>Name</span><input class="contact" type="text" name="your_name" value="" /></p>
            <p><span>Email Address</span><input class="contact" type="text" name="your_email" value="" /></p>
            <p><span>Message</span><textarea class="contact textarea" rows="8" cols="50" name="your_enquiry"></textarea></p>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" name="contact_submitted" value="submit" /></p>
          </div>
        </form>
        <p><br /><br />NOTE: A contact form such as this would require some way of emailing the input to an email address.</p>
      </div>
    </div>
  </div>
  
</body>
</html>
