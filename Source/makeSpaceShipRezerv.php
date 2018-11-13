<?php

	// spaceship rezervation variables
    $departure = " ";
    $arrival = " ";
    $date = " ";
    $nrSeats = " ";

    
	//-------------------------- SEARCH SPACE SHIP CHECK -----------------------------------------------------

    if(isset($_POST['searchTripBtn']))
    {
        // daca se apasa butonu de login

        // verificam ca un admin sa nu poata face rezervare adica sa nu fie logat cand incearca asta
        if(isset($_SESSION['username']))
            array_push($errors, "Admins cant make rezervations!");
        else
        {
            // daca nu e logat, retinem datele introduse pentru search
            $departure = mysqli_real_escape_string($db, $_POST['depart']);
            $arrival = mysqli_real_escape_string($db, $_POST['arrive']);
            $date = mysqli_real_escape_string($db, $_POST['date']);
            $nrSeats = mysqli_real_escape_string($db, $_POST['choices-single-defaul']);

            // cautam in tabela de calatorii
            $query1 = "SELECT * FROM calatorie WHERE departure='$departure' AND arrival='$arrival'";
            $result1 = mysqli_query($db, $query1);

            //verificam de erori
            if(empty($departure) || empty($arrival) || empty($date) || empty($nrSeats))
                array_push($errors, "All fields must be filled in!");
            if($date < date("Y-m-d") && !empty($date))
                array_push($errors, "Can't select a date that has already passed!");

            //-----------------------
            $checkSucces = -1;
            $output1 = $output2 = "";
            $idCalatorie1 = $idCalatorie2 = 0;
            if(count($errors) == 0)
            {
                // daca nu avem erori
                if(mysqli_num_rows($result1) > 0)
                {
                    // si am gasit calatorii care satisfac datele introduse
                    $checkSucces = 0;
                    while($row = mysqli_fetch_assoc($result1))
                    {
                        $sum = 0;
                        // luam pe rand in $row fiecare intrare gasita din tabel care corespunde
                        // si o cautam dupa id si data in tabelu de rezervar calatorii
                        $query2 = "SELECT * FROM rezervaricalatorie WHERE idcalatorie=$row[id] AND data='$date'";
                        $result2 = mysqli_query($db, $query2);
                        // calculam cate locuri is ocupate la data respectiva pt calatoria aceea
                        while($row2 = mysqli_fetch_assoc($result2))
                            $sum += $row2["locurirezerv"];
                        // verificam daca mai sunt cate locuri cauta persoana respectiva
                        if(($sum+(int)$nrSeats) <= $row["nrLocuri"])
                        {
                            // retinem optiunile gasite...1 sau 2
                            $checkSucces += 1;

                            $time = $row['orad'];
                            $length = $row['length'];
                            if($checkSucces == 1)
                            {
                                $output1 = $departure . " - " . $arrival . " - " . $time . " - length: " . $length . " hours";
                                $idCalatorie1 = $row['id'];
                            }
                            else
                            {
                                $output2 = $departure . " - " . $arrival . " - " . $time . " - length: " . $length . " hours";
                                $idCalatorie2 = $row['id'];
                            }
                        }
                    }
                }
                else
                { 
                    array_push($errors, "No trip between the 2 points you introduced!"); 
                }

                // retinem ca am avut succes la cautare si cate optiuni am gasit
                $_SESSION['searchSucces'] = $checkSucces;
                if($checkSucces > 0)
                {
                    // retinem cele 2 optiuni cu tot cu id-urile lor
                    $_SESSION['var2'] = $output2;
                    $_SESSION['var1'] = $output1;
                    $_SESSION['idC1'] = $idCalatorie1;
                    $_SESSION['idC2'] = $idCalatorie2;

                    //retinem si data si nr de locuri pentru cand se va face rezervarea
                    $_SESSION['date'] = $date;
                    $_SESSION['seatsT'] = $nrSeats;
                }
                else if($checkSucces == 0) array_push($errors, "No more seats for that date!");
            }
        }
    }

    //-------------------------- REZERVE SPACE SHIP CHECK -----------------------------------------------------

    if(isset($_POST['rezervTripBtn']))
    {
        // daca se apasa butonu de rezervare
        // retinem datele clientului
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $cardNr = mysqli_real_escape_string($db, $_POST['cardnr']);
        $cnp = mysqli_real_escape_string($db, $_POST['cnp']);

        // reitnem id-u calatoriei alese...acesta fiind obtinut de la checkboxu selectat
        if(!empty($_POST['option1']))
            $checkbox = $_POST['option1'];
        if(!empty($_POST['option2']))
            $checkbox = $_POST['option2'];

        // verificam sa nu avem date empty
        if(empty($fullname) || empty($email) || empty($phone) || empty($cardNr) || empty($cnp) || empty($checkbox))
            array_push($errors, "All fields must be filled in!");

        if(count($errors) == 0)
        {
            // daca nu avem erori
            // verificam cate intrari avem in tabela de clienti
            $query3 = "SELECT * FROM client";
            $result3 = mysqli_query($db, $query3);
            $rowCount1 = mysqli_num_rows($result3);
            $rowCount1 += 1;

            // luam in niste variabile datele alea de mai sus introduse la cautarea calatoriei
            $rezervDate = $_SESSION['date'];
            $rezervSeat = $_SESSION['seatsT'];

            // introeduce in tabela clientu
            $sql1 = "INSERT INTO client (id, name, email, phone, cardnr, cnp, idcalatorie, idcamera) VALUES ('$rowCount1', '$fullname', '$email', '$phone', '$cardNr', '$cnp', '$checkbox', '0')";
            // introduce si calatoria in tabela de rezervari calatorii
            $sql2 = "INSERT INTO rezervaricalatorie (idcalatorie, idclient, data, locurirezerv) VALUES ('$checkbox', '$rowCount1', '$rezervDate', '$rezervSeat')";

            // verificam sa nu dea eroare nicio introducere
            if ($db->query($sql1) === FALSE)
                array_push($errors, "Something went wrong with client add! Sorry!");
            else if ($db->query($sql2) === FALSE)
                array_push($errors, "Something went wrong with trip add! Sorry!");
                    else
                    {
                        unset($_SESSION['searchSucces']);
                        unset($_SESSION['date']);
                        unset($_SESSION['seatsT']);
                        header('location: enterPage.php');
                    }
        }
    }


?>