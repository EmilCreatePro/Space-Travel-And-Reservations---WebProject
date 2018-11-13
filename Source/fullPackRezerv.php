<?php include('server.php') ?>
<?php include('makeFullPackRezerv.php') ?>

<!DOCTYPE HTML>
<html>

  <head>
    <title>Rezerve Trip</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="author" content="colorlib.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>

  <body>
    <?php      
      if(isset($_SESSION['fullPackSucces']))
      {
        echo '<style type="text/css">
            .rezervOpt {
              display: inline-block;
            }
            </style>';
      }
      else
      {
        echo '<style type="text/css">
            .rezervOpt {
              display: none;
            }
            </style>';
      }
    ?>

    <div class="s002">
      <form action="fullPackRezerv.php" method="post">
        <fieldset>
          <legend>SEARCH FULL TRIP</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
              </svg>
            </div>
            <input id="searchDep" type="text" placeholder="Departure" name="depart"/>
          </div>
          <div class="input-field first-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"></path>
              </svg>
            </div>
            <input id="searchArv" type="text" placeholder="Arrival" name="arrive"/>
          </div>
          <div class="input-field third-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
              </svg>
            </div>
            <input class="datepicker" id="return" type="text" placeholder="Arrive Date" name="dateA"/>
          </div>
          <div class="input-field third-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"></path>
              </svg>
            </div>
            <input class="datepicker" id="return" type="text" placeholder="Leave Date" name="dateL"/>
          </div>
          <div class="input-field fouth-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
              </svg>
            </div>
            <select data-trigger="" name="choices-single-defaul">
              <option placeholder="">1 Place</option>
              <option>2 Places</option>
              <option>3 Places</option>
              <option>4 Places</option>
            </select>
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="submit" name="searchFullBtn" value="SearchFullBtn">SEARCH</button>
          </div>
        </div>

        <?php include('errors.php'); ?>

        <div class="rezervOpt">
        <form>
          <br><br>
          
          <?php include('options.php'); ?>

          <br><br><br>
      
          <label for="fname">First Name</label>
          <input type="text" id="fname" name="fullname" placeholder="Your full name..">

          <label for="email">Email Address</label>
          <input type="text" id="email" name="email" placeholder="Your email address..">

          <label for="phone">Phone Number</label>
          <input type="text" id="phone" name="phone" placeholder="Your phone number..">

          <label for="nrcard">Card Number</label>
          <input type="password" id="cardnr" name="cardnr" placeholder="Your card number..">

          <label for="cnp">CNP</label>
          <input type="text" id="cnp" name="cnp" placeholder="Your CNP..">

          <input type="submit" value="rezerv" name="rezervFullBtn">

        </form>
      </div>
      </form>

    </div>
    <script src="js/extention/choices.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {});

    </script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>

    <script>
        function hotelBoxFct(id)
        {
          var hotelsOpt = document.getElementsByClassName("hotel");
          for(var i=1; i<= hotelsOpt.length; i++)
            document.getElementById(""+i).checked = false;
          document.getElementById(""+id).checked = true;
        }

        function tripBoxFct(id)
        {
          var hotelsOpt = document.getElementsByClassName("hotel");
          var tripsOpt = document.getElementsByClassName("trip");

          //alert("" + hotelsOpt.length + " " + tripsOpt.length);

          var startPoint = hotelsOpt.length+1;
          var endPoint = tripsOpt.length+hotelsOpt.length;
          for(var i= startPoint; i<= endPoint; i++)
            document.getElementById(""+i).checked = false;
          document.getElementById(""+id).checked = true;
        }
    </script>
  </body>
</html>
