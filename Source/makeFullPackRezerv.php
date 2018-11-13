<?php

    $trips = array();
    $hotels = array();
	$hotelsID = array();
	$tripsID = array();

	if(isset($_POST['searchFullBtn']))
	{
		if(isset($_SESSION['username']))
            array_push($errors, "Admins cant make rezervations!");
        else
        {
        	$departure = mysqli_real_escape_string($db, $_POST['depart']);
            $arrival = mysqli_real_escape_string($db, $_POST['arrive']);
            $dateArr = mysqli_real_escape_string($db, $_POST['dateA']);
            $dateLv = mysqli_real_escape_string($db, $_POST['dateL']);
            $nrSeats = mysqli_real_escape_string($db, $_POST['choices-single-defaul']);

            $queryH = "SELECT * FROM hoteluri WHERE planeta='$arrival'";
            $resultH = mysqli_query($db, $queryH);

            if(empty($departure) || empty($arrival) || empty($dateArr) || empty($dateLv) ||empty($nrSeats))
                array_push($errors, "All fields must be filled in!");
            else if($dateArr < date("Y-m-d") || $dateLv < date("Y-m-d"))
                array_push($errors, "Can't select a date that has already passed!");
            else if($dateLv < $dateArr || $dateLv == $dateArr)
            	array_push($errors, "Leaving date should be bigger than arriving date!");

            if(count($errors) == 0)
            {
            	if(mysqli_num_rows($resultH) > 0)
            	{
            		while($rowH = mysqli_fetch_assoc($resultH))
            		{
            			$busyRooms = 0;
            			$freeRooms = $rowH['nrCamere'];
            			$queryRzvH = "SELECT * FROM rezervarihotel WHERE idhotel=$rowH[id]";
            			$resultRzvH = mysqli_query($db, $queryRzvH);

            			if(mysqli_num_rows($resultRzvH) > 0)
            				while($rowRzvH = mysqli_fetch_assoc($resultRzvH))
            					if(($dateLv > $rowRzvH['datain'] && $dateArr < $rowRzvH['datain']) || ($dateArr < $rowRzvH['dataout'] && $dateLv > $rowRzvH['dataout']))
            						$busyRooms += 1;
            			
            			if(($freeRooms-$busyRooms) > 0)
            			{
	            			$output = $arrival . " - " . $rowH['nume'] . " - " . $rowH['nrStele'] . " stars - " . ($freeRooms-$busyRooms) . " camere libere";
            				array_push($hotels, $output);
            				array_push($hotelsID, $rowH['id']);
            			}
            		}

            		if(count($hotels) == 0)
            			array_push($errors, "No hotels found on " . $arrival . " for this interval of time");
            		else
            		{
            			$queryC = "SELECT * FROM calatorie WHERE departure='$departure' AND arrival='$arrival'";
            			$resultC = mysqli_query($db, $queryC);

            			if(mysqli_num_rows($resultC) > 0)
            			{
            				while($rowC = mysqli_fetch_assoc($resultC))
            				{
	            				$queryRzvC = "SELECT * FROM rezervaricalatorie WHERE idcalatorie=$rowC[id] AND data='$dateArr'";
            					$resultRzvC = mysqli_query($db, $queryRzvC);

            					$sum = 0;
            					while($rowRzvC = mysqli_fetch_assoc($resultRzvC))
                            		$sum += $rowRzvC["locurirezerv"];

                            	if(($sum+(int)$nrSeats) <= $rowC["nrLocuri"])
                            	{
	                            	$output = $departure . " - " . $arrival . " - " . $rowC['orad'] . " - length: " . $rowC['length'] . " hours";
	                            	array_push($trips, $output);
	                            	array_push($tripsID, $rowC['id']);
	                            }
            				}

            				if(count($trips) == 0)
            					array_push($errors, "No more free spaces for trips on this date");
            			}
            			else array_push($errors, "No trip found for the options selected");
            		}


            	}
            	else array_push($errors, "No planet found for the arrivel option");
            }

            if(count($errors) == 0)
	        {
                $_SESSION['fullPackSucces'] = "Found";
                $_SESSION['dateArr'] = $dateArr;
                $_SESSION['dateLv'] = $dateLv;
                $_SESSION['seatsF'] = $nrSeats;

                $_SESSION['hotels'] = count($hotels);
                $_SESSION['trips'] = count($trips);
            }
        }
	}

	if(isset($_POST['rezervFullBtn']))
	{
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $cardNr = mysqli_real_escape_string($db, $_POST['cardnr']);
        $cnp = mysqli_real_escape_string($db, $_POST['cnp']);

        // reitnem id-u calatoriei alese...acesta fiind obtinut de la checkboxu selectat
        $hotelBox = $tripBox = "";
        $n1 = $_SESSION['hotels'];
        $n2 = $_SESSION['trips'];
        for($x = 1; $x <= $n1; $x++)
        {
            $var1 = $_POST["hotel".$x];
            if(!empty($var1))
                $hotelBox = $var1;
        }
        for($y = ($n1+1); $y <= ($n1+$n2); $y++)
        {
            $var2 = $_POST["trip".$y];
            if(!empty($var2))
                $tripBox = $var2;
        }
 
        // verificam sa nu avem date empty
        if(empty($fullname) || empty($email) || empty($phone) || empty($cardNr) || empty($cnp) || empty($hotelBox) || empty($tripBox))
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
            $startDate = $_SESSION['dateArr'];
            $stopDate = $_SESSION['dateLv'];
            $seats = $_SESSION['seatsF'];

            // introeduce in tabela clientu
            $sql1 = "INSERT INTO client (id, name, email, phone, cardnr, cnp, idcalatorie, idcamera) VALUES ('$rowCount1', '$fullname', '$email', '$phone', '$cardNr', '$cnp', '$tripBox', '$hotelBox')";
            // introduce si calatoria in tabela de rezervari calatorii
            $sql2 = "INSERT INTO rezervarihotel (idclient, idhotel, datain, dataout, nrlocuri) VALUES ('$rowCount1', '$hotelBox', '$startDate', '$stopDate', '$seats')";
            $sql3 = "INSERT INTO rezervaricalatorie (idcalatorie, idclient, data, locurirezerv) VALUES ('$tripBox', '$rowCount1', '$startDate', '$seats')";

            // verificam sa nu dea eroare nicio introducere
            if ($db->query($sql1) === FALSE)
                array_push($errors, "Something went wrong with client add! Sorry!");
            else if ($db->query($sql2) === FALSE)
                array_push($errors, "Something went wrong with hotel add! Sorry!");
                    else if($db->query($sql3) === FALSE)
                        array_push($errors, "Something went wrong with trip add! Sorry!");
                            else
                            {
                                unset($_SESSION['fullPackSucces']);
                                unset($_SESSION['dateArr']);
                                unset($_SESSION['dateLv']);
                                unset($_SESSION['seatsF']);
                                header('location: enterPage.php');
                            }
        }
	}




?>