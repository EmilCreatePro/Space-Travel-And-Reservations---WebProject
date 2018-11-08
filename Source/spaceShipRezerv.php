<?php include('server.php') ?>
<!DOCTYPE HTML>
<html>

  <head>
    <title>Rezerve Flight</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- <meta name="author" content="colorlib.com"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>

  <body>
    <?php

      // in text retinem datele despre variantele de calatorie gasite pentru cautarea curenta
      $text1 = $_SESSION['var1'];
      $text2 = $_SESSION['var2'];
      
      if(isset($_SESSION['searchSucces']) && $_SESSION['searchSucces'] > 0)
      {
        // daca am gasit macar o varianta afisam formu de rezervare si tinem in checkboxuri id-urile calatoriilor
        echo '<style type="text/css">
            .rezervOpt {
              display: inline-block;
            }
            </style>';
        $idCalatorie1 = $_SESSION['idC1'];
        $idCalatorie2 = $_SESSION['idC2'];
      }
      else
      {
        // daca nu, nu afisam formu
        echo '<style type="text/css">
            .rezervOpt {
              display: none;
            }
            </style>';
      }

      if(empty($text1))
      {
        //daca prima optiune e goala nu afisam niciun checkbox pt ca inseamna ca nu exista nico varianta
        echo '<style type="text/css">
            .rezervOpt input[type=checkbox] {
              display: none;
              }
              </style>';
      }

      if(empty($text2))
      {
        // daca a 2a e goala nu afisam a 2lea check box ca inseamna ca exista doar o singura varianta
        echo '<style type="text/css">
            #myCheck2 {
              display: none;
              }
              </style>';
      }
    ?>

    <div class="s002">
      <form action="spaceShipRezerv.php" method="post">
        <fieldset>
          <legend>SEARCH HOTEL</legend>
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
            <input class="datepicker" id="return" type="text" placeholder="Choose Date" name="date"/>
          </div>
          <div class="input-field fouth-wrap">
            <div class="icon-wrap">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
              </svg>
            </div>
            <select data-trigger="" name="choices-single-defaul">
              <option placeholder="">1 Seat</option>
              <option>2 Seats</option>
              <option>3 Seats</option>
              <option>4 Seats</option>
            </select>
          </div>
          <div class="input-field fifth-wrap">
            <button class="btn-search" type="submit" name="searchBtn" value="SearchBtn">SEARCH</button>
          </div>
        </div>

        <?php include('errors.php'); ?>

        <div class="rezervOpt">
        <form>
          <br><br>
          <input type="checkbox" name="option1" id="myCheck1" onclick="checkboxFct(1)" value="<?php echo $idCalatorie1 ?>"> <?php echo $text1 ?> <br><br>
          <input type="checkbox" name="option2" id="myCheck2" onclick="checkboxFct(2)" value="<?php echo $idCalatorie2 ?>"> <?php echo $text2 ?> <br>

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

          <input type="submit" value="rezerv" name="rezervBtn">

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
        function checkboxFct(x)
        {
          var checkBox1 = document.getElementById("myCheck1");
          var checkBox2 = document.getElementById("myCheck2");

          if(x == 1)
            checkBox2.checked = false;
          if(x == 2)
            checkBox1.checked = false;
        }
    </script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
