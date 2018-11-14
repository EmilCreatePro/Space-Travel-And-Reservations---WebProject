<?php include('server.php') ?>
<?php include('rezervHistory.php') ?>

<!DOCTYPE HTML>
<html>

	<head>
		<title>Space Explorer</title>
  		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  		<link rel="stylesheet" type="text/css" href="styleMainPages/historyStyle.css" title="style" />
  		<link rel="Tab icon" type="image/png" href="img/icon.png">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<style>
			table {
    				position: absolute;
    				top: 60px;
    				left: 0px;
					border: 3px solid #73AD21;
					border-collapse: collapse;
					width: 100%;
					color: #588c7e;
					font-family: monospace;
					font-size: 15px;
					text-align = left;		
					}
				th{
					background-color: #588c7e;
					color: white;
					border: 2px solid;
				}

				td
				{
					border: 2px solid;
				}

				tr:nth-child(even) {background-color: #f2f2f2}
				tr:nth-child(odd) {background-color: #d5fdd1}
		</style>  
  	</head>

  	<body>
		<div class="backImg" >
  		<div class="main-history">
  			<form name="showRzvr" action="history.php" method="post">
  				<input type="submit" name="all" id="myBtn" value="Show All">
  				<input type="submit" name="clName" id="myBtn" value="Show by Name">
  				<input type="text" placeholder="Client Name" name="clientName">
  				<input type="submit" name="exit" id="myBtn" value="Exit">
  			</form>
  		</div>

  		<?php if(count($clients) > 0): ?>
  			<div class="main-content">
				  <?php 
				  		$result = "<table>";
						$result .= "<tr><th>Name Client</th>";
						$result .= "<th>CNP</th>";
						$result .= "<th>Email</th>";
						$result .= "<th>Phone</th>";
						$result .= "<th>Departure</th>";
						$result .= "<th>Arrival</th>";
						$result .= "<th>Departure Time</th>";
						$result .= "<th>Day of Departure</th>";
						$result .= "<th>Seats</th>";
						$result .= "<th>Hotel</th>";
						$result .= "<th>Leaving Date</th></tr>";

						  foreach($clients as $client): ?>
						  
						<!--<p > </p> -->
							<?php //echo $client; 
								{
									$result .= "<tr>";
									$result .= $client;
									$result .= "</tr>";
								}
							?>
						
						<?php endforeach; 
					  $result .= "</table>";
					  echo $result;
					?>
  			</div>
  		<?php endif ?>



	</div>
  	</body>




</html>