<?php

    session_start();

    $username = " ";
    $password = " ";
    $errors = array();

    $db = mysqli_connect('localhost', 'root', '', 'SpaceExplorer');

    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($db, $_POST['userid']);
        $password = mysqli_real_escape_string($db, $_POST['pswrd']);

        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        if(empty($username))
            array_push($errors, "Empty username");
        if(empty($password))
            array_push($errors, "Empty password");
        if(count($errors) == 0)
        {
            if(mysqli_num_rows($result) == 1)
            {
                $_SESSION['username'] = $username;
                $_SESSION['succes'] = "You are now logged in";
                header('location: index.html');
            }
            else
            {
                //mesaj de eroare
                header('location: login.php');
            }
        }
    }

    if(isset($_POST['exit']))
    {
        header('location: enterPage.html');
    }
?>