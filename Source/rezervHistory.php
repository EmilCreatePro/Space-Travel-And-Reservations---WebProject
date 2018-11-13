<?php

	$clients = array();

	if(isset($_POST['all']))
	{
		$queryCl = "SELECT * FROM client";
		$resultCl = mysqli_query($db, $queryCl);

		if(mysqli_num_rows($resultCl) > 0)
		{
			while($rowCl = mysqli_fetch_assoc($resultCl))
			{
				$output = $rowCl['name'] . " - " . $rowCl['cnp'] . " - " . $rowCl['email'] . " - " . $rowCl['phone'];

				$queryTrip = "SELECT * FROM calatorie WHERE id = $rowCl[idcalatorie]";
				$resultTrip = mysqli_query($db, $queryTrip);
				$rowTrip = mysqli_fetch_assoc($resultTrip);
				$output .= "<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - " . $rowTrip['departure'] . " > " . $rowTrip['arrival'] . " at " . $rowTrip['orad'];

				$queryRzv = "SELECT * FROM rezervaricalatorie WHERE idclient=$rowCl[id] AND idcalatorie=$rowCl[idcalatorie]";
				$resultRzv = mysqli_query($db, $queryRzv);
				$rowRzv = mysqli_fetch_assoc($resultRzv);
				$output .= " on " . $rowRzv['data'] . " for " . $rowRzv['locurirezerv'] . " persons";

				if($rowCl['idcamera'] != 0)
				{
					$queryHotel = "SELECT * FROM hoteluri WHERE id = $rowCl[idcamera]";
					$resultHotel = mysqli_query($db, $queryHotel);
					$rowHotel = mysqli_fetch_assoc($resultHotel);
					$output .= "<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - at hotel " . $rowHotel['nume'];

					$queryRzvH = "SELECT * FROM rezervarihotel WHERE idclient=$rowCl[id] AND idhotel=$rowCl[idcamera]";
					$resultRzvH = mysqli_query($db, $queryRzvH);
					$rowRzvH = mysqli_fetch_assoc($resultRzvH);
					$output .= " until " . $rowRzvH['dataout'] . "<br>";
				}

				array_push($clients, $output);
			}
		}

		if(count($clients) < 1)
			array_push($clients, "There is no rezervation at the moment");
	}

	if(isset($_POST['clName']))
	{
		$clientName = mysqli_real_escape_string($db, $_POST['clientName']);

		$queryCl = "SELECT * FROM client WHERE name='$clientName'";
		$resultCl = mysqli_query($db, $queryCl);

		if(empty($clientName))
            array_push($clients, "Please fill the client name field!");

        if(count($clients) == 0)
        {
			if(mysqli_num_rows($resultCl) > 0)
			{
				while($rowCl = mysqli_fetch_assoc($resultCl))
				{
					$output = $rowCl['name'] . " - " . $rowCl['cnp'] . " - " . $rowCl['email'] . " - " . $rowCl['phone'];

					$queryTrip = "SELECT * FROM calatorie WHERE id = $rowCl[idcalatorie]";
					$resultTrip = mysqli_query($db, $queryTrip);
					$rowTrip = mysqli_fetch_assoc($resultTrip);
					$output .= "<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - " . $rowTrip['departure'] . " > " . $rowTrip['arrival'] . " at " . $rowTrip['orad'];

					$queryRzv = "SELECT * FROM rezervaricalatorie WHERE idclient=$rowCl[id] AND idcalatorie=$rowCl[idcalatorie]";
					$resultRzv = mysqli_query($db, $queryRzv);
					$rowRzv = mysqli_fetch_assoc($resultRzv);
					$output .= " on " . $rowRzv['data'] . " for " . $rowRzv['locurirezerv'] . " persons";

					if($rowCl['idcamera'] != 0)
					{
						$queryHotel = "SELECT * FROM hoteluri WHERE id = $rowCl[idcamera]";
						$resultHotel = mysqli_query($db, $queryHotel);
						$rowHotel = mysqli_fetch_assoc($resultHotel);
						$output .= "<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - at hotel " . $rowHotel['nume'];

						$queryRzvH = "SELECT * FROM rezervarihotel WHERE idclient=$rowCl[id] AND idhotel=$rowCl[idcamera]";
						$resultRzvH = mysqli_query($db, $queryRzvH);
						$rowRzvH = mysqli_fetch_assoc($resultRzvH);
						$output .= " until " . $rowRzvH['dataout'] . "<br>";
					}

					array_push($clients, $output);
				}
			}

			if(count($clients) < 1)
				array_push($clients, "No rezervation found for that name");
        }
	}

	if(isset($_POST['exit']))
	{
		header('location: enterPage.php');
	}




?>