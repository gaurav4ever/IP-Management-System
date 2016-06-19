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
			background-color: #3333FF;
			color: #ffffff;
			width: 720px;
			text-align: center;
			font-family: 'Comfortaa', cursive;
			font-size: 20px;
			padding: 10px;
			margin-left: 35px;
			border-radius: 50px;
		    border: 1px solid #3333FF;
		}
		#submit:hover{
			cursor: pointer;
			background-color: #FFFFFF;
			color: #3333ff;
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
		<a href="request_page.php"><li>Pending requests</li></a>
		<a href="database_view.php"><li>View Database</li></a>
		<a href="issued.php"><li>Issued</li></a>
		<a href="addIP.php"><li>Add Ip</li></a>
		<a href="relIP.php"><li>Release Ip</li></a>
		<a href="updateIP.php"><li>Update Ip</li></a>
	</ul>
	<center>
		<form action="logout_authority.php" method="post">
			<input type="submit" id="submit" name="logout" value="Logout">
		</form>
	</center>
</div>
	
</body>
</html>