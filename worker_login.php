<?php
session_start();
if(isset($_SESSION['username']))
	header('Location: worker_portal.php');
if(isset($_POST['login']))
{
	if((isset($_POST['username']))&& (isset($_POST['password'])))
	{
		include 'connect.php';
		mysql_select_db('nic database');
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		
		$query="SELECT * From `user_info` WHERE username='$username'";
		$query_run=mysql_query($query);
		if($query_run){
			$mquery=mysql_fetch_array($query_run);
			if(!(md5($password)==$mquery['password'])){
				echo 'Invalid username or password<br>';
			}
			else{
				$_SESSION['username']=$username;
				header("Location: worker_portal.php");
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	
	<link href="style/style.css" type="text/css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	
</head>
<body>
<img src="img/nic.png" style="width:100%;">

<div class="wrapper_main">
		<div class="container">
			<form action="worker_login.php" method="post">
			<center><h3 class="user_text">User Login</h3>
			<input type="text" name="username" id="username" placeholder="Username" autocomplete="off"><br/>
			<input type="password" name="password" id="password" placeholder="Password"><br/>
			<button type="submit" name="login" id="submit">Submit</button>
			</form>
			</center>
		</div>
</div>

</body>
</html>