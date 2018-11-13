<?php

    session_start();

    // login variables
    $username = " ";
    $password = " ";

    // spaceship rezervation variables
    $departure = " ";
    $arrival = " ";
    $date = " ";
    $nrSeats = " ";

    // errors variable
    $errors = array();

    // ne conectam la baza de date
    $db = mysqli_connect('localhost', 'root', '', 'SpaceExplorer');

    //-------------------------- LOGIN CHECK -----------------------------------------------------

    if(isset($_POST['login']))
    {
        // daca s-o apasat butonu de login

        // luam useru si parola introduse
        $username = mysqli_real_escape_string($db, $_POST['userid']);
        $password = mysqli_real_escape_string($db, $_POST['pswrd']);

        // il cautam in baza de date
        $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        // verificam de erori
        if(empty($username))
            array_push($errors, "Empty username");
        if(empty($password))
            array_push($errors, "Empty password");
        if(count($errors) == 0)
        {
            if(mysqli_num_rows($result) == 1)
            {
                // daca gasim exact o intrare pt datele alea in baza de date
                // tinem minte useru si ca ne-am logat
                $_SESSION['username'] = $username;
                $_SESSION['succesLogin'] = "You are now logged in";
                header('location: index.html');
            }
            else
            {
                array_push($errors, "Password/Username dont match");
            }
        }
    }

    //-------------------------- LOGOUT CHECK -----------------------------------------------------

    if(isset($_POST['logoutButton']))
    {
        // daca s-o apasat butonu de logout nu mai tinem minte ca suntem logati
	    unset($_SESSION['username']);
	    unset($_SESSION['succesLogin']);
        header('location: index.html');
    }

    //-------------------------- EXIT FROM LOGIN PAGE CHECK -----------------------------------------------------

    if(isset($_POST['exit']))
    {
        // daca apasam exit la pagina de login ne scoate inapoi la pagina principala
	    header('location: enterPage.php');
    }
?>