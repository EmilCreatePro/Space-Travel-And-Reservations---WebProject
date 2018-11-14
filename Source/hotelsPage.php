<?php include('server.php') ?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Space Explorer</title>
  		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  		<link rel="stylesheet" type="text/css" href="styleMainPages/hotelStyle.css" title="style" />
  		<link rel="Tab icon" type="image/png" href="img/icon.png">
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  		<?php
  			$hotelsName = array();
			$hotelsPlanet = array();
			$hotelsStars = array();
			$hotelsRooms = array();
			$hotelsImg = array();

			$query = "SELECT * FROM hoteluri";
			$result = mysqli_query($db, $query);

			if(mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					array_push($hotelsName, $row['nume']);
					array_push($hotelsPlanet, $row['planeta']);
					array_push($hotelsStars, $row['nrStele']);
					array_push($hotelsRooms, $row['nrCamere']);
					$location = "./img/" . $row['img'];
					array_push($hotelsImg, $location);
				}
			}
			else array_push($errors, "Nu avem hoteluri");
  		?>
  	</head>

  	<body>
	  
  		<div class="main-content" >
  			<?php if(count($hotelsName) > 0)
  					{ for($x=0; $x<count($hotelsName); $x++) 
	  					{ ?>
  						<div class="hotel" id="white_bck">
  							<img src="<?php echo $hotelsImg[$x]; ?>" height="200" width="200" />
                <ul>
  							 <li><?php echo "Name: " . $hotelsName[$x]; ?></li><br>
  							 <li><?php echo "Stars: " . $hotelsStars[$x]; ?></li><br>
  							 <li><?php echo "Rooms: " . $hotelsRooms[$x]; ?></li><br>
                </ul>
  						</div>
  				<?php 	}
  					}
  			?>
  		</div>
	
  	</body>




</html>