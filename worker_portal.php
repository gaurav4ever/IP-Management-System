<?php 

	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: worker_login.php');
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
	<center>
		<form action="logout_worker.php" method="post">
			<input type="submit" name="logout" value="Logout" id="submit">
		

</div>
	
</body>
</html>