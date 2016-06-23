<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: authority_login.php');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Authority Portal</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	
</head>
<body>
<img src="img/nic.png" style="width:100%">
<div class="container">
	<h1 style="font-family: 'Comfortaa', cursive;">NIC Authority Portal</h1><br/>
	<ul class="tabs">
		<a href="request_page.php"><li>Pending requests</li></a>
		<a href="database_view.php"><li>View Database</li></a>
		<a href="issued.php"><li>Issued</li></a>
		<a href="addIP.php"><li>Add Ip</li></a>
		<a href="relIP.php"><li>Release Ip</li></a>
		<a href="updateIP.php"><li>Update Ip</li></a>
	</ul>
	<div class="options">
		<form action="change_pass_authority.php" method="post" class="option_form">
			<input type="submit" id="submit2" name="change_pass" value="Change Password">
		</form>
		<form action="logout_authority.php" method="post" class="option_form">
			<input type="submit" id="submit1" name="logout" value="Logout">
		</form>
	</div>
	
</div>
	
</body>
</html>