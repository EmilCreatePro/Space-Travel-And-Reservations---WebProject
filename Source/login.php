<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styleMainPages/logInStyle.css"/>
  <script src="js/logInPageButtons.js"></script>

</head>

<body oncontextmenu="return false">
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Are you an <span>Admin</span>?</div>
		</div>
		<br>
		<form name="login" action="login.php" method="post">
			<div class="login">
					<input type="text" placeholder="User" name="userid"><br>
					<input type="password" placeholder="Password" name="pswrd"><br>
					<input type="submit" value="Login" name="login"/><br>
					<input type="submit" value="Exit" name="exit"/>
			</div>
		</form>

	<div id="notes">
	</div>

</body>
</html>