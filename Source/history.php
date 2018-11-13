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
  	</head>

  	<body>
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
  				<?php foreach($clients as $client): ?>
  					<p ><?php echo $client; ?></p>
  				<?php endforeach ?>
  			</div>
  		<?php endif ?>




  	</body>




</html>