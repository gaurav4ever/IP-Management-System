<!DOCTYPE html>
<html>
<head>
	<title>Update User</title>
	<link href='https://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 

	require 'connect.php';
	mysql_select_db('nic database');

	if(!get_magic_quotes_gpc() )
			{
			    $user_mobile=addslashes($_POST['mobile']);
				$user_email=addslashes($_POST['email']);
				$reportPerson=addslashes($_POST['rp']);

			}
			else{
					$user_mobile=$_POST['mobile'];
					$user_email=$_POST['email'];
					$reportPerson=$_POST['rp'];
			}
	//echo '<br>'.$user_mobile.'<br>'.$user_email.'<br>'.$reportPerson.'<br>';
	$sql="UPDATE `user_info` SET `flag`=0,`mobile number`='$user_mobile',`email`='$user_email',`reporting person`='$reportPerson' WHERE flag=1";
	$retval=mysql_query($sql,$conn);

	if(!$retval){
		die("Connection Error!");
	}
	$mquery=mysql_fetch_array($retval);
	echo '<br>'.$mquery['mobile number'].'<br>hello<br>';
	echo "Successful.";
	header('Location: worker_info.php');

 ?>
</body>
</html>
