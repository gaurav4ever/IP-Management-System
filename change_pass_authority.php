<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style/style_portal.css">
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
	<style type="text/css">
 		#box{
 			width: 173px;
 			height: 21px;
 		}
 	</style>
</head>
<body>

	<?php 

		session_start();
		$username=$_SESSION['username'];
		if(isset($_POST['button'])){
			$old_pass=$_POST['old_pass'];
			$new_pass=$_POST['new_pass'];
			$confirm_new_pass=$_POST['confirm_new_pass'];
			if($new_pass==$confirm_new_pass){
				include 'connect.php';
				echo "hello";
				//matching old password with database password
				mysql_select_db('nic database');
				$sql="SELECT `password` FROM `authority_info` WHERE username='$username'";
				$retval=mysql_query($sql);
				if(!$retval){
					die("Connection Error");
				}
				print_r($mquery);
				if($mquery['password']==md5($old_pass)){
					$ne_pass=md5($new_pass);
					$sql_new="UPDATE `authority_info` SET `password`='$ne_pass' WHERE username='$username'";
					$retval_new=mysql_query($sql_new);
					if(!$retval_new)die("Connection error!");
					echo "Password changed successfully.";
					$text='<meta http-equiv="refresh" content="0.5;url=authority_login.php" />';
					echo $text;
				}
				else{
					echo "Old password did not match. Try again!";
					$text='<meta http-equiv="refresh" content="0.5;url=change_pass_authority.php" />';
					echo $text;
				}
			}
			else{
				echo "Confirmation password does not match. Try again!";
				$text='<meta http-equiv="refresh" content="0.5;url=change_pass_authority.php" />';
					echo $text;
			}
		}
		else{

	 ?>
	 <img src="img/nic.png" style="width:100%">
		<div class="banner">
		<center>
			<a href="logout_worker.php"><p>Logout</p></a>
		</center>
		</div>
		<button style="height:25px;width:60px;"><a href="authority_portal.php" style="color:#000000;">Back</a></button>
		<center>
		<form method="post" action="change_pass_authority.php">
			<input type="password" name="old_pass" placeholder="Old Password"><br><br>
			<input type="password" name="new_pass" placeholder="new Password"><br><br>
			<input type="password" name="confirm_new_pass" placeholder="Confirm new Password"><br><br>
			<button type="submit" name="button">Change Password</button>
		</form>
		</center>
		<?php
	}
	?>
</body>
</html>