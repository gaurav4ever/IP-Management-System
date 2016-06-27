 <!DOCTYPE html>
 <html>
 <head>
 	<title>User Info</title>
 </head>
 <body>
 	<img src="img/nic.png" style="width:100%"><br>
 	<?php 
 	session_start();
 	$username=$_SESSION['username'];
 	require 'connect.php';
 	mysql_select_db("nic database");
 	
	$sql="SELECT * FROM `user_info` WHERE username='$username'";
	$retavl=mysql_query($sql);
	if(!$retavl){
		die("connection_error!");
	}
	else{
		$mquery=mysql_fetch_array($retavl);
		if($mquery['flag']==1){
			echo "please enter the following field before IP request.<br><br>";
			
			$text='<form action="update_user.php" method="post">
					<center>
					<input type="text" name="mobile" placeholder="Mobile Number" required><br><br>
					<input type="text" name="email" placeholder="Email ID" required><br><br>
					<input type="text" name="rp" placeholder="Reporting Person" required><br><br>
					<button type="submit" name="button">Submit</button>
					</center>
				</form>';
			echo $text;
		}
		else{
			header('Location: request_apply.php');
		}
	}

 ?>
 </body>
 </html>