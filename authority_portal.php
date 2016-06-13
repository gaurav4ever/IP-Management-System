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
	<style type="text/css">
		#submit{
			cursor: pointer;
			background-color: #ffffff;
			color: #3333FF;
			width: 720px;
			text-align: center;
			font-family: 'Comfortaa', cursive;
			font-size: 20px;
			padding: 10px;
			margin-left: 35px;
			border-radius: 50px;
		    border: 1px solid #3333FF;
		}
	</style>
	</style>
</head>
<body>
<img src="img/nic.png" style="width:100%">
<div class="container">
	<h1 style="font-family: 'Comfortaa', cursive;">NIC Authority Portal</h1><br/>
	<ul class="tabs">
		<li><a href="">Home</a></li>
		<li><a href="">Profile</a></li>
		<li><a href="request_page.php">Pending requests</a></li>
		<li><a href="database_view.php">View Database</a></li>
		<li><a href="">Mail</a></li>
	</ul>
	<center>
		<form action="logout_authority.php" method="post">
			<input type="submit" name="logout" value="Logout">
		</form>
	</center>
</div>
	
</body>
</html>