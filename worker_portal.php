<?php 

	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: worker_login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>user Portal</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
<img src="img/nic.png" style="width:100%">
<div class="container">
	<h1 style="font-family: 'Comfortaa', cursive;">NIC User Portal</h1><br/>
	<ul class="tabs">
		<a href="#"><li>Home</li></a>
		<a href="#"><li>Profile</li></a>
		<a href="#"><li>Mail</li></a>
		<a href="worker_info.php"><li>Send Request for IP</li></a>
	</ul>

	<div class="options">
		<form action="change_pass_user.php" method="post" class="option_form">
				<input type="submit" id="submit2" name="change_pass" value="Change Password">
		</form>
		<form action="logout_worker.php" method="post" class="option_form">
			<input type="submit" id="submit1" name="logout" value="Logout">
		</form>
	</div>
		

</div>
	
</body>
</html>